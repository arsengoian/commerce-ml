<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 28.02.20
 * Time: 15:51
 */

namespace CommerceML\Implementation;


use CommerceML\DefaultImplementation;
use CommerceML\Implementation;

class Contact extends \CommerceML\Nodes\Contact implements Implementation
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