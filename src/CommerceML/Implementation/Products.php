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

class Products extends \CommerceML\Nodes\Products implements Implementation
{
    private $products;

    use DefaultImplementation;


    public function products (): array
    {
        return $this -> products;
    }
}