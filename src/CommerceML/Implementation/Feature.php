<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 13.03.20
 * Time: 13:46
 */

namespace CommerceML\Implementation;


use CommerceML\DefaultImplementation;
use CommerceML\Implementation;

class Feature extends \CommerceML\Nodes\Feature implements Implementation
{
    protected $id;
    protected $name;
    protected $value;


    use DefaultImplementation;


    public function id(): ?string 
    {
        return $this -> id;
    }
    
    public function name (): string
    {
        return $this -> name;
    }

    public function value (): string
    {
        return $this -> value;
    }
}