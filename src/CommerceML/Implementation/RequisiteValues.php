<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 11:01 AM
 */

namespace CommerceML\Implementation;


use CommerceML\DefaultImplementation;
use CommerceML\Implementation;

class RequisiteValues extends \CommerceML\Nodes\RequisiteValues implements Implementation
{
    private $requisiteValues;

    use DefaultImplementation;


    public function requisiteValues (): array
    {
        return $this -> requisiteValues;
    }
}