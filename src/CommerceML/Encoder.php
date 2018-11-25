<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:37 PM
 */

namespace CommerceML;


class Encoder
{
    private $root;

    public function __construct (Tag $root)
    {
        $this -> root = $root;
    }

    public function toCommerceML(): string
    {
        $xml = $this -> root -> toXML();
        return $xml -> asXML();
    }
}
