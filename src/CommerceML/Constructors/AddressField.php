<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class AddressField extends \CommerceML\Implementation\AddressField
{
    /**
     * AddressField constructor.
     * @param $type
     * @param $value
     */
    public function __construct (string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}