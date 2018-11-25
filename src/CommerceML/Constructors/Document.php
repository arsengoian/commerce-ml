<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;

use CommerceML\Implementation\Counterparties;
use CommerceML\Implementation\Products;
use CommerceML\Implementation\RequisiteValues;


class Document extends \CommerceML\Implementation\Document
{
    /**
     * Document constructor.
     * @param $id
     * @param $number
     * @param $date
     * @param $ecoOperation
     * @param $role
     * @param $currency
     * @param $exchangeRate
     * @param $sum
     * @param $counterparties
     * @param $time
     * @param $comment
     * @param $products
     * @param $requisiteValues
     */
    public function __construct (
        string $id,
        string $number,
        string $date,
        string $ecoOperation,
        string $role,
        string $currency,
        string $exchangeRate,
        string $sum,
        Counterparties $counterparties,
        string $time,
        ?string $comment,
        Products $products,
        RequisiteValues $requisiteValues)
    {
        $this->id = $id;
        $this->number = $number;
        $this->date = $date;
        $this->ecoOperation = $ecoOperation;
        $this->role = $role;
        $this->currency = $currency;
        $this->exchangeRate = $exchangeRate;
        $this->sum = $sum;
        $this->counterparties = $counterparties;
        $this->time = $time;
        $this->comment = $comment;
        $this->products = $products;
        $this->requisiteValues = $requisiteValues;
    }
}