<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class Address extends \CommerceML\Implementation\Address
{
    /**
     * Address constructor.
     * @param $addressFields
     * @param $representation
     */
    public function __construct (array $addressFields, string $representation)
    {
        $this->addressFields = $addressFields;
        $this->representation = $representation;
    }
}