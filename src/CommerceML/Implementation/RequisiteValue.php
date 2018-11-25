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

class RequisiteValue extends \CommerceML\Nodes\RequisiteValue implements Implementation
{
    protected $name;
    protected $value;


    use DefaultImplementation;


    public function name (): string
    {
        return $this -> name;
    }

    public function value (): string
    {
        return $this -> value;
    }
}