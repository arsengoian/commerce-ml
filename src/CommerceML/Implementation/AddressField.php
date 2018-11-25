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

class AddressField extends \CommerceML\Nodes\AddressField implements Implementation
{
    protected $type;
    protected $value;


    use DefaultImplementation;


    public function type (): string
    {
        return $this -> type;
    }

    public function value (): string
    {
        return $this -> value;
    }
}