<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:13 PM
 */

namespace CommerceML;


class Parser
{
    private $root;
    
    public function __construct (string $root)
    {
        $this -> root = $root;
    }

    public function parse(): Tag
    {
        $simpleXML = simplexml_load_string($this -> root);
        return Node::fromXML($simpleXML);
    }

}
