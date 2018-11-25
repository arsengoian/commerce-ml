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

class Products extends \CommerceML\Nodes\Products implements Implementation, ArrayAccess, IteratorAggregate, Countable
{
    protected $products;


    use DefaultImplementation;

    use ImplementsCollection;
    const DATA_FIELD = 'products';

    public function products (): array
    {
        return $this -> products;
    }
}