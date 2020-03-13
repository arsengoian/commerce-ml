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
use CommerceML\Nodes\Address;
use CommerceML\Nodes\BaseUnit;
use CommerceML\Nodes\Features;
use CommerceML\Nodes\Representatives;
use CommerceML\Nodes\RequisiteValues;

class Product extends \CommerceML\Nodes\Product implements Implementation
{
    protected $id;
    protected $name;
    protected $features;
    protected $catalogID;
    protected $baseUnit;
    protected $pricePerUnit;
    protected $quantity;
    protected $sum;
    protected $requisiteValues;

    use DefaultImplementation;


    public function id (): string
    {
        return $this -> id;
    }

    public function name (): string
    {
        return $this -> name;
    }

    public function features(): ?Features
    {
        return $this -> features;
    }

    public function catalogID (): ?string
    {
        return $this -> catalogID;
    }

    public function baseUnit (): BaseUnit
    {
        return $this -> baseUnit;
    }

    public function pricePerUnit (): string
    {
        return $this -> pricePerUnit;
    }

    public function quantity (): string
    {
        return $this -> quantity;
    }

    public function sum (): string
    {
        return $this -> sum;
    }

    public function requisiteValues (): RequisiteValues
    {
        return $this -> requisiteValues;
    }
}