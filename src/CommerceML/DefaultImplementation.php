<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 11:35 AM
 */

namespace CommerceML;


trait DefaultImplementation
{
    static function createInstance(array $parameters): Implementation {
        $object = new static();
        if (!is_a(self::class, Implementation::class))
        foreach ($parameters as $method => $value)
            $object -> $method = $value;
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        /**
         *  We assume the class is instance of Implementation
         */
        return $object;
    }

    function tagContents(): ?string
    {
        return $this -> _tagContents;
    }
}