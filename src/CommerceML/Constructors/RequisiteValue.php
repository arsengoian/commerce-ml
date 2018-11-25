<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class RequisiteValue extends \CommerceML\Implementation\RequisiteValue
{
    /**
     * RequisiteValue constructor.
     * @param $name
     * @param $value
     */
    public function __construct (string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}