<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:19 PM
 */

namespace CommerceML;


use CommerceML\Exceptions\CommerceMLLogicException;
use CommerceML\Nodes\CommercialInformation;
use SimpleXMLElement;

abstract class Node implements Tag
{
    const NODES = [
        CommercialInformation::class
    ];


    /**
     * @return SimpleXMLElement CommerceML representation of the tag
     * @throws CommerceMLLogicException
     */
    function toXML (): SimpleXMLElement
    {
        $tag = $this -> commerceMLRepresentation();
        $element = new SimpleXMLElement("<$tag></$tag>");
        if (!$this instanceof AttributeContaining && !$this instanceof CompositeNode)
            throw new CommerceMLLogicException('Child nodes may only be contained in composite nodes and/or arrays');

        $this -> parseAttributes($element);
        $this -> parseComposite($element);

        return $element;
    }

    private function parseAttributes(SimpleXMLElement $element) {
        if ($this instanceof AttributeContaining)
            foreach ($this -> attributes() as $attribute => $russianName)
                if ($value = $this -> $attribute())
                    $element -> addAttribute($russianName, $value);
    }


    private function xmlAdopt(SimpleXMLElement $root, SimpleXMLElement$new) {
        $node = $root->addChild($new -> getName(), (string) $new);
        foreach($new -> attributes() as $attr => $value) {
            $node -> addAttribute($attr, $value);
        }
        foreach($new->children() as $ch) {
            $this -> xmlAdopt($node, $ch);
        }
    }

    /**
     * @param SimpleXMLElement $element
     * @throws CommerceMLLogicException
     */
    private function parseComposite(SimpleXMLElement $element) {
        if ($this instanceof CompositeNode) {
            foreach ($this -> getChildFields() as $method => $russianName) {
                if (method_exists($this, $method)) {
                    $value = $this -> $method();
                    if (is_object($value) && $value instanceof Tag)
                        $this -> xmlAdopt($element, $value -> toXML());
                    elseif(is_array($value)) {
                        foreach ($value as $object)
                            if (is_object($object) && $object instanceof Tag)
                                $this -> xmlAdopt($element, $object -> toXML());
                            elseif (is_string($object))
                                $element -> addChild($russianName, $value);
                    } elseif (is_string($value) || is_int($value))
                        $element -> addChild($russianName, $value);
                    else
                        throw new CommerceMLLogicException('Invalid type: '.gettype($value));
                }
            }
        }
    }


    /**
     * @param SimpleXMLElement $input CommerceML
     * @return static
     */
    static function fromXML (SimpleXMLElement $input): Tag
    {
        if ($input -> attributes() -> count() > 0)
            $attributes = TRUE;
        foreach ($input as $key => $value)
            $key = $value;

    }
}
