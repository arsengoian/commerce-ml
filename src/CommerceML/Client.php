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

            return (new Parser($commerceML)) -> parse();
        } catch (\ReflectionException $e) {
            throw new CommerceMLLogicException($e -> getMessage(), $e -> getCode(), $e);
        }
    }


    public static function toString(Tag $root): string
    {
        // TODO encoding
        return (new Encoder($root)) -> toCommerceML();
    }

}
