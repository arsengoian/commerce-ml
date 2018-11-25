<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 11:10 AM
 */

namespace CommerceML\Node;


use CommerceML\Exceptions\CommerceMLLogicException;
use CommerceML\Node\AttributeContaining;
use CommerceML\Node\Composite;
use CommerceML\Tag;
use SimpleXMLElement;

trait ToXML
{
    /**
     * @return SimpleXMLElement CommerceML representation of the tag
     * @throws CommerceMLLogicException
     */
    function toXML (): SimpleXMLElement
    {
        $tag = $this::commerceMLRepresentation();
        $element = new SimpleXMLElement("<$tag></$tag>");
        if (!$this instanceof AttributeContaining && !$this instanceof Composite)
            throw new CommerceMLLogicException('Child nodes may only be contained in composite nodes and/or arrays');

        $this -> encodeAttributes($element);
        $this -> encodeComposite($element);

        return $element;
    }

    private function encodeAttributes(SimpleXMLElement $element) {
        if ($this instanceof AttributeContaining)
            foreach ($this::attributes() as $attribute => $russianName)
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
    private function encodeComposite(SimpleXMLElement $element) {
        if ($this instanceof Composite) {
            foreach ($this::getChildFields() as $method => $russianName) {
                if (method_exists($this, $method)) {
                    $value = $this -> $method();
                    if ($value !== NULL) {
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
    }
}