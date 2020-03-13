<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 13.03.20
 * Time: 13:14
 */

namespace CommerceML\Implementation;


use CommerceML\DefaultImplementation;
use CommerceML\Implementation;
use ArrayAccess;
use CommerceML\Traits\ImplementsCollection;
use IteratorAggregate;
use Countable;

class Features extends \CommerceML\Nodes\Features implements Implementation, ArrayAccess, IteratorAggregate, Countable
{
    protected $features;


    use DefaultImplementation;

    use ImplementsCollection;
    const DATA_FIELD = 'features';

    public function features (): array
    {
        return $this -> features;
    }
}