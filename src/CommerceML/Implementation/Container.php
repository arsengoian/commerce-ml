<?php
/**
 * Container.php
 * Date: 18.09.2020
 * Time: 14:30
 * Author: Maksim Klimenko
 * Email: mavsan@gmail.com
 */

namespace CommerceML\Implementation;


use ArrayAccess;
use CommerceML\DefaultImplementation;
use CommerceML\Implementation;
use CommerceML\Traits\ImplementsCollection;
use Countable;
use IteratorAggregate;

class Container extends \CommerceML\Nodes\Container implements Implementation, ArrayAccess, IteratorAggregate, Countable
{
    protected $documents = [];

    use DefaultImplementation;

    use ImplementsCollection;
    const DATA_FIELD = 'documents';

    public function documents(): array
    {
        return $this->documents;
    }
}
