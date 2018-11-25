<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class BaseUnit extends \CommerceML\Implementation\BaseUnit
{

    /**
     * BaseUnit constructor.
     * @param string $code
     * @param string $fullName
     * @param string $short
     * @param string $value
     */
    public function __construct (
        string $code,
        string $fullName,
        string $short,
        string $value)
    {
        $this->code = $code;
        $this->fullName = $fullName;
        $this->short = $short;
        $this->_tagContents = $value;
    }
}