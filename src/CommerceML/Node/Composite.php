<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 9:40 PM
 */

namespace CommerceML\Node;

use CommerceML\Node\Collection;
use CommerceML\Tag;

interface Composite extends Tag
{
    /**
     * @return array ChildFields [method name => russian name]
     * If a method of this instance returns string, a tag is parsed.
     * If it returns a node, a node is parsed.
     *
     * If it returns an array, the method is checked against getArrayFields.
     * If the child is not present in getArrayFields, it is assumed a string and named by its russian name from this method
     * If a the child is present, its russian name is taken from the getCommerceMLRepresentation()
     *
     * @see Collection
     *
     * If a method doesn't exist, the tag is not added.
     */
    static function getChildFields(): array;
    
}
