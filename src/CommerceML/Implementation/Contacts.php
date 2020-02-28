<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 28.02.20
 * Time: 15:53
 */

namespace CommerceML\Implementation;


use CommerceML\DefaultImplementation;
use CommerceML\Implementation;
use ArrayAccess;
use CommerceML\Traits\ImplementsCollection;
use IteratorAggregate;
use Countable;

class Contacts extends \CommerceML\Nodes\Contacts implements Implementation, ArrayAccess, IteratorAggregate, Countable
{
    protected $contacts;


    use DefaultImplementation;

    use ImplementsCollection;
    const DATA_FIELD = 'contacts';

    public function contacts (): array
    {
        return $this -> contacts;
    }
}