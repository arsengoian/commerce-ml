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

class Counterparties extends \CommerceML\Nodes\Counterparties implements Implementation
{
    private $counterparties;

    use DefaultImplementation;


    public function counterparties (): array
    {
        return $this -> counterparties;
    }
}