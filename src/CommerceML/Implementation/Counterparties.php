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

class Counterparties extends \CommerceML\Nodes\Counterparties implements Implementation, ArrayAccess, IteratorAggregate, Countable
{
    protected $counterparties;

    use DefaultImplementation;

    use ImplementsCollection;
    const DATA_FIELD = 'counterparties';

    public function counterparties (): array
    {
        return $this -> counterparties;
    }
}