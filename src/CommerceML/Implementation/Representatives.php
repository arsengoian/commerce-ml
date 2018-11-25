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
use CommerceML\Nodes\Counterparty;

class Representatives extends \CommerceML\Nodes\Representatives implements Implementation
{
    private $representatives;

    use DefaultImplementation;


    public function representatives (): array
    {
        return $this -> representatives;
    }
}