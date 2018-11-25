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
use CommerceML\Nodes\Counterparty;
use CommerceML\Nodes\Representatives;

class Representative extends \CommerceML\Nodes\Representative implements Implementation
{
    protected $counterparty;

    use DefaultImplementation;


    public function counterparty (): Counterparty
    {
        return $this -> counterparty;
    }
}