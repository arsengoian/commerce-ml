<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;

use CommerceML\Implementation\RequisiteValues;
use CommerceML\Implementation\BaseUnit;
use CommerceML\Implementation\Features;

class Product extends \CommerceML\Implementation\Product
{
    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $catalogID
     * @param $baseUnit
     * @param $pricePerUnit
     * @param $quantity
     * @param $sum
     * @param $requisiteValues
     * @param $features
     */
    public function __construct (
        string $id,
        string $name,
        string $catalogID,
        BaseUnit $baseUnit,
        string $pricePerUnit,
        string $quantity,
        string $sum,
        RequisiteValues $requisiteValues,
        Features $features = NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->catalogID = $catalogID;
        $this->baseUnit = $baseUnit;
        $this->pricePerUnit = $pricePerUnit;
        $this->quantity = $quantity;
        $this->sum = $sum;
        $this->requisiteValues = $requisiteValues;
        $this->features = $features;
    }
}