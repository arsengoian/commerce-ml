<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:13 PM
 */

namespace CommerceML;


use CommerceML\Node\Node;

class Parser
{
    private $root;
    
    public function __construct (string $root)
    {
        $this -> root = $root;
    }

    /**
     * Use this to parse a string to a CommerceML node
     *
     * @return Tag
     * @throws Exceptions\CommerceMLParserException
     * @throws \ReflectionException
     */
    public function parse(): Tag
    {
        $simpleXML = simplexml_load_string($this -> root);
        return Node::fromXML($simpleXML);
    }

}
