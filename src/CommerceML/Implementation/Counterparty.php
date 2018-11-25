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
use CommerceML\Nodes\Address;
use CommerceML\Nodes\Representatives;

class Counterparty extends \CommerceML\Nodes\Counterparty implements Implementation
{
    private $id;
    private $name;
    private $rel;
    private $role;
    private $fullName;
    private $lastName;
    private $firstName;
    private $address;
    private $representatives;

    use DefaultImplementation;


    public function id (): string
    {
        return $this -> id;
    }

    public function name (): string
    {
        return $this -> name;
    }

    public function rel (): ?string
    {
        return $this -> rel;
    }

    public function role (): ?string
    {
        return $this -> role;
    }

    public function fullName (): ?string
    {
        return $this -> fullName;
    }

    public function lastName (): ?string
    {
        return $this -> lastName;
    }

    public function firstName (): ?string
    {
        return $this -> firstName;
    }

    public function address (): ?Address
    {
        return $this -> address;
    }

    public function representatives (): ?Representatives
    {
        return $this -> representatives;
    }
}