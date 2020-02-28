<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 28.02.20
 * Time: 16:01
 */

namespace CommerceML\Constructors;


class Contacts extends \CommerceML\Implementation\Contacts
{
    public function __construct(array $contacts)
    {
        $this->contacts = $contacts;
    }
}