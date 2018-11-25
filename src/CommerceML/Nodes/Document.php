<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 2:16 AM
 */

namespace CommerceML\Nodes;


use CommerceML\CompositeNode;
use CommerceML\Node;

abstract class Document extends Node implements CompositeNode
{

    /**
     * @return string Russian representation of tag name
     */
    function commerceMLRepresentation (): string
    {
        return 'Документ';
    }

    /**
     * @return array ChildFields [method name => russian name]
     * If a method of this instance returns string, a tag is parsed.
     * If it returns a node, a node is parsed.
     *
     * If it returns an array, the method is checked against getArrayFields.
     * If the child is not present in getArrayFields, it is assumed a string and named by its russian name from this method
     * If a the child is present, its russian name is taken from the getCommerceMLRepresentation()
     *
     * @see ArrayNode
     *
     * If a method doesn't exist, the tag is not added.
     */
    function getChildFields (): array
    {
        return [
            'id' => 'Ид',
            'number' => 'Номер'
        ];
    }

    abstract public function id();

    abstract public function number();
}