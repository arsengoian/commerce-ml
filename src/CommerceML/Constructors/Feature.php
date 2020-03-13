<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 13.03.20
 * Time: 14:01
 */

namespace CommerceML\Constructors;


class Feature extends \CommerceML\Implementation\Feature
{
    /**
     * Feature constructor.
     * @param string|NULL $id
     * @param string $name
     * @param string $value
     */
    public function __construct (
        string $id = NULL, 
        string $name, 
        string $value)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }
}