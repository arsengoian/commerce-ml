<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 10:40 PM
 */

namespace CommerceML;


use CommerceML\Exceptions\CommerceMLLogicException;
use CommerceML\Exceptions\CommerceMLParserException;
use CommerceML\Node\Node;
use DOMDocument;

class Client
{
    /**
     * @param string $commerceML
     * @param array $implementations
     * @return Tag
     * @throws CommerceMLLogicException
     * @throws CommerceMLParserException
     */
    public static function toCommerceML(string $commerceML, array $implementations = []): Tag
    {
        try {
            if (count($implementations) > 0)
                Node::overrideImplementations($implementations);

            ($dom = new DOMDocument()) -> loadXML($commerceML);
            $dom -> encoding = 'utf-8';
            $commerceML = $dom ->saveXML();

            return (new Parser($commerceML)) -> parse();
        } catch (\ReflectionException $e) {
            throw new CommerceMLLogicException($e -> getMessage(), $e -> getCode(), $e);
        }
    }


    public static function toString(Tag $root): string
    {
        $commerceML = (new Encoder($root)) -> toCommerceML();

        ($dom = new DOMDocument()) -> loadXML($commerceML);
        $dom -> encoding = 'windows-1251';
        $commerceML = $dom -> saveXML();

        return $commerceML;
    }

}
