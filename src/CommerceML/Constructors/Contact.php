<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 28.02.20
 * Time: 15:59
 */

namespace CommerceML\Constructors;


class Contact extends \CommerceML\Implementation\Contact
{
    /**
     * Contact constructor.
     * @param string $type
     * @param string $value
     */
    public function __construct (string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}