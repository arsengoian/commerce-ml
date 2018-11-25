<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 9:40 PM
 */

namespace CommerceML\Node;

use CommerceML\Tag;

/**
 * @return string
 */
interface AttributeContaining extends Tag
{
    /**
     * @return string Value of the tag if it is not composite.
     * If composite, NULL may be returned
     */
    function tagContents(): ?string;

    /**
     * @return array of valid attributes [method name => russian representation]
     *
     * If a method of this instance returns string, an attribute is added.
     * The value of the attribute is the return value of the function
     * Else nothing happens
     */
    static function attributes(): array;
}
