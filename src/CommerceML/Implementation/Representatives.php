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

class Representatives extends \CommerceML\Nodes\Representatives implements Implementation, ArrayAccess, IteratorAggregate, Countable
{
    protected $representatives;

    use DefaultImplementation;

    use ImplementsCollection;
    const DATA_FIELD = 'representatives';

    public function representatives (): array
    {
        return $this -> representatives;
    }
}