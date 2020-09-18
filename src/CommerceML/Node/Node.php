<?php /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */

/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:19 PM
 */

namespace CommerceML\Node;



use CommerceML\Exceptions\CommerceMLLogicException;
use CommerceML\Tag;

abstract class Node implements Tag
{
    use ToXML;
    use FromXML;

    /**
     * Used for attribute notes if they aren't composite
     * @var string|null
     */
    protected $_tagContents = NULL;

    const IMPLEMENTATIONS = [
        \CommerceML\Implementation\Address::class,
        \CommerceML\Implementation\AddressField::class,
        \CommerceML\Implementation\BaseUnit::class,
        \CommerceML\Implementation\CommercialInformation::class,
        \CommerceML\Implementation\Contact::class,
        \CommerceML\Implementation\Contacts::class,
        \CommerceML\Implementation\Container::class,
        \CommerceML\Implementation\Counterparties::class,
        \CommerceML\Implementation\Counterparty::class,
        \CommerceML\Implementation\Document::class,
        \CommerceML\Implementation\Feature::class,
        \CommerceML\Implementation\Features::class,
        \CommerceML\Implementation\Products::class,
        \CommerceML\Implementation\Product::class,
        \CommerceML\Implementation\Representative::class,
        \CommerceML\Implementation\Representatives::class,
        \CommerceML\Implementation\RequisiteValue::class,
        \CommerceML\Implementation\RequisiteValues::class,
    ];

    private static $overriddenImplementations = [];

    /**
     * Use this to add custom implementations for nodes
     *
     * @param array $customImplementations
     * @return void
     */
    public static function overrideImplementations(array $customImplementations): void {
        self::$overriddenImplementations = $customImplementations;
    }

    /**
     * @param string $tagName
     * @return string
     * @throws CommerceMLLogicException
     */
    protected static function getImplementationByTagName(string $tagName) {
        foreach (self::IMPLEMENTATIONS as $className)
            if ($className::commerceMLRepresentation() == $tagName)
                return $className;
        throw new CommerceMLLogicException("Illegal tag. $tagName");
    }

    /**
     * @param string $nodeClass
     * @return string
     * @throws CommerceMLLogicException
     */
    protected static function getImplementationByNodeClass(string $nodeClass) {
        foreach (self::$overriddenImplementations as $className)
            if (is_subclass_of($className, $nodeClass))
                return $className;
        foreach (self::IMPLEMENTATIONS as $className)
            if (is_subclass_of($className, $nodeClass))
                return $className;
        throw new CommerceMLLogicException("No valid implementation found");
    }
}
