<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:40 PM
 */

namespace CommerceML;


class Client
{
    public static function toCommerceML(string $commerceML): Tag
    {
        return (new Parser($commerceML)) -> parse();
    }

    public static function toString(Tag $root): string
    {
        return (new Encoder($root)) -> toCommerceML();
    }
}
