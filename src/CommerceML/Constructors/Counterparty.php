<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;

use CommerceML\Implementation\Contacts;
use CommerceML\Implementation\Representatives;
use CommerceML\Implementation\Address;

class Counterparty extends \CommerceML\Implementation\Counterparty
{
    /**
     * Counterparty constructor.
     * @param $id
     * @param $name
     * @param $rel
     * @param $role
     * @param $fullName
     * @param $lastName
     * @param $firstName
     * @param $address
     * @param $contacts
     * @param $representatives
     */
    public function __construct (
        string $id,
        string $name,
        string $rel = NULL,
        string $role = NULL,
        string $fullName = NULL,
        string $lastName = NULL,
        string $firstName = NULL,
        Address $address = NULL,
        Contacts $contacts = NULL,
        Representatives $representatives = NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->rel = $rel;
        $this->role = $role;
        $this->fullName = $fullName;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->address = $address;
        $this->contacts = $contacts;
        $this->representatives = $representatives;
    }
}