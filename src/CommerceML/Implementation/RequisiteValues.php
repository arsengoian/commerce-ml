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
use ArrayAccess;
use CommerceML\Traits\ImplementsCollection;
use IteratorAggregate;
use Countable;

class RequisiteValues extends \CommerceML\Nodes\RequisiteValues implements Implementation, ArrayAccess, IteratorAggregate, Countable
{
    protected $requisiteValues;


    use DefaultImplementation;

    use ImplementsCollection;
    const DATA_FIELD = 'requisiteValues';


    public function requisiteValues (): array
    {
        return $this -> requisiteValues;
    }
}