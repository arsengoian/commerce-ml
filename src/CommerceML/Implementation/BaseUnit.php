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

class BaseUnit extends \CommerceML\Nodes\BaseUnit implements Implementation
{
    protected $code;
    protected $fullName;
    protected $short;


    use DefaultImplementation;


    function code (): string
    {
        return $this -> code;
    }

    function fullName (): string
    {
        return $this -> fullName;
    }

    function short (): string
    {
        return $this -> short;
    }
}
