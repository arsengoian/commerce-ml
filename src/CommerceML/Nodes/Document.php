<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 2:16 AM
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Composite;
use CommerceML\Node\Node;
use CommerceML\Node\Collection;

abstract class Document extends Node implements Composite
{

    public static function commerceMLRepresentation (): string
    {
        return 'Документ';
    }


    public static function getChildFields (): array
    {
        return [
            'id' => 'Ид',
            'number' => 'Номер',
            'date' => 'Дата',
            'ecoOperation' => 'ХозОперация',
            'role' => 'Роль',
            'currency' => 'Валюта',
            'exchangeRate' => 'Курс',
            'sum' => 'Сумма',
            'counterparties' => NULL,
            'time' => 'Время',
            'comment' => 'Комментарий',
            'products' => NULL,
            'requisiteValues' => NULL
        ];
    }


    abstract public function id(): string;

    abstract public function number(): string;

    abstract public function date(): string;

    abstract public function ecoOperation(): string;

    abstract public function role(): string;

    abstract public function currency(): string;

    abstract public function exchangeRate(): string;

    abstract public function sum(): string;

    abstract public function counterparties(): Counterparties;

    abstract public function time(): string;

    abstract public function products(): Products;

    abstract public function requisiteValues(): RequisiteValues;

}
