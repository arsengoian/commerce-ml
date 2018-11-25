<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class RequisiteValues extends \CommerceML\Implementation\RequisiteValues
{
    /**
     * RequisiteValues constructor.
     * @param $requisiteValues
     */
    public function __construct (array $requisiteValues)
    {
        $this->requisiteValues = $requisiteValues;
    }
}