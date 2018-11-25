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

class Address extends \CommerceML\Nodes\Address implements Implementation
{
    private $addressFields;
    private $representation;

    use DefaultImplementation;


    public function addressFields (): array
    {
        return $this -> addressFields;
    }

    public function representation (): string
    {
        return $this -> representation;
    }
}