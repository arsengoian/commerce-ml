<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class Counterparties extends \CommerceML\Implementation\Counterparties
{
    /**
     * Counterparties constructor.
     * @param $counterparties
     */
    public function __construct (array $counterparties)
    {
        $this->counterparties = $counterparties;
    }
}