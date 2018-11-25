<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:13 PM
 */

namespace CommerceML;


use SimpleXMLElement;

interface Tag
{
    /**
     * @return SimpleXMLElement CommerceML representation of the tag
     */
    function toXML(): SimpleXMLElement;

    /**
     * @param SimpleXMLElement $input CommerceML
     * @return static
     */
    static function fromXML(SimpleXMLElement $input): self;

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation(): string;
}
