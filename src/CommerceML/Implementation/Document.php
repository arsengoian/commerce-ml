<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 11:07 AM
 */

namespace CommerceML\Implementation;


use CommerceML\DefaultImplementation;
use CommerceML\Implementation;
use CommerceML\Nodes\Counterparties;
use CommerceML\Nodes\Products;
use CommerceML\Nodes\RequisiteValues;

class Document extends \CommerceML\Nodes\Document implements Implementation
{
    protected $id;
    protected $number;
    protected $date;
    protected $ecoOperation;
    protected $role;
    protected $currency;
    protected $exchangeRate;
    protected $sum;
    protected $counterparties;
    protected $time;
    protected $comment;
    protected $products;
    protected $requisiteValues;

    use DefaultImplementation;

    /**
     * @return string
     */
    public function id (): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function number (): string
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function date (): string
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function ecoOperation (): string
    {
        return $this->ecoOperation;
    }

    /**
     * @return mixed
     */
    public function role (): string
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function currency (): string
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function exchangeRate (): string
    {
        return $this->exchangeRate;
    }

    /**
     * @return mixed
     */
    public function sum (): string
    {
        return $this->sum;
    }

    /**
     * @return mixed
     */
    public function counterparties (): Counterparties
    {
        return $this->counterparties;
    }

    /**
     * @return mixed
     */
    public function time (): string
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function comment (): string
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function products (): Products
    {
        return $this->products;
    }

    /**
     * @return mixed
     */
    public function requisiteValues (): RequisiteValues
    {
        return $this->requisiteValues;
    }



}
