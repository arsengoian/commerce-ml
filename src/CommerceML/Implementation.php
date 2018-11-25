<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 11:35 AM
 */

namespace CommerceML;


interface Implementation extends Tag
{
    static function createInstance(array $parameters): Implementation;
}