<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 11:11 AM
 */

namespace CommerceML\Node;


use CommerceML\Exceptions\CommerceMLParserException;
use CommerceML\Implementation;
use CommerceML\Tag;
use ReflectionException;
use ReflectionMethod;
use SimpleXMLElement;

trait FromXML
{

    /**
     * @param SimpleXMLElement $input CommerceML
     * @return Tag
     *
     * @throws CommerceMLParserException
     * @throws ReflectionException
     */
    static function fromXML (SimpleXMLElement $input): Tag
    {
        $tagName = $input -> getName();
        $className = self::getImplementationByTagName($tagName);
        $class = new $className();

        if (!$class instanceof AttributeContaining && !$class instanceof Composite)
            throw new CommerceMLParserException('Must contain attributes or be composite, else must be a field');

        return self::parseXMLToClass($input, $class);
    }


    /**
     * @param SimpleXMLElement $input CommerceML
     * @param Tag $class
     * @return Tag
     *
     * @throws CommerceMLParserException
     * @throws ReflectionException
     */
    private static function parseXMLToClass(SimpleXMLElement $input, Tag $class): Tag {
        if ($class instanceof Implementation) {
            $parameters = [];

            self::parseAttributes($class, $input, $parameters);
            self::parseComposite($class, $input, $parameters);

            $instance = $class::createInstance($parameters);

            if ($instance instanceof  AttributeContaining) {
                if (!$class instanceof Composite && $instance instanceof Node)
                    $instance -> _tagContents = $instance -> tagContents();
            }

            return $instance;

        } else throw new CommerceMLParserException('Implementation not supported');
    }


    private static function parseAttributes(Tag $class, SimpleXMLElement $input, array &$parameters) {
        if ($class instanceof AttributeContaining)
            foreach($class::attributes() as $methodName => $russianName)
                foreach($input -> attributes() as $attribute => $value)
                    if ($attribute == $russianName)
                        $parameters[$methodName] = (string) $value;
    }


    /**
     * @param Tag $class
     * @param SimpleXMLElement $input
     * @param array $parameters
     *
     * @throws CommerceMLParserException
     * @throws ReflectionException
     */
    private static function parseComposite(Tag $class, SimpleXMLElement $input, array &$parameters) {
        if ($class instanceof Composite) {

            foreach($class::getChildFields() as $methodName => $russianName) {
                $reflectionMethod = new ReflectionMethod($class, $methodName);
                $type = $reflectionMethod -> getReturnType();
                if ($type === NULL)
                    throw new CommerceMLParserException("Return type not declared on $class::$methodName");

                switch ($t = $type -> getName()) {
                    case 'string':
                    case 'int':
                        $parameters[$methodName] = (string) $input -> $russianName;
                        break;

                    case 'array':
                        self::parseArray($class, $methodName, $russianName, $input, $parameters);
                        break;

                    default: // Class name
                        self::parseChildClass($t, $input, function(Tag $tag) use ($methodName, &$parameters) {
                            $parameters[$methodName] = $tag;
                        });
                }

            }
        }
    }

    /**
     * @param Tag $class
     * @param string $methodName
     * @param string $russianName
     * @param SimpleXMLElement $input
     * @param array $params
     * @throws CommerceMLParserException
     */
    private static function parseArray(Tag $class, string $methodName, ?string $russianName, SimpleXMLElement $input, array &$params) {
        if (!$class instanceof Collection)
            throw new CommerceMLParserException("Can't have array in $methodName");
        $params[$methodName] = [];

        if (isset($class::getArrayFields()[$methodName])) {
            $childClass = $class::getArrayFields()[$methodName];
            self::parseChildClass($childClass, $input, function(Tag $tag) use ($methodName, &$params) {
                $params[$methodName][] = $tag;
            });
        } else {
            if ($russianName === NULL)
                throw new CommerceMLParserException("Russian name can't be NULL in this context");
            foreach ($input -> children() as $child)
                if ($child -> getName() == $russianName)
                    $params[$methodName][] = (string) $child;
        }
    }

    /**
     * @param string $childClass
     * @param SimpleXMLElement $input
     * @param callable $handler
     * @return void
     * @throws CommerceMLParserException
     */
    private static function parseChildClass(string $childClass, SimpleXMLElement $input, callable $handler): void {

        $implementation = self::getImplementationByNodeClass($childClass);

        if (!class_exists($implementation))
            throw new CommerceMLParserException("Unknown class $implementation");

        $childInstance = new $implementation();

        if ($childInstance instanceof Tag) {
            foreach ($input -> children() as $child)
                if ($child -> getName() == $childInstance::commerceMLRepresentation())
                    $handler($childInstance::fromXML($child));
        } else throw new CommerceMLParserException("Class $implementation not instance of Tag");

    }





}