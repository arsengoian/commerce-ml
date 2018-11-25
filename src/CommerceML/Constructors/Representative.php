<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;
use CommerceML\Implementation\Counterparty;

class Representative extends \CommerceML\Implementation\Representative
{
    /**
     * Representative constructor.
     * @param $counterparty
     */
    public function __construct (Counterparty $counterparty)
    {
        $this->counterparty = $counterparty;
    }
}