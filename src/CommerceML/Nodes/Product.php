<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 3:02 PM
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Composite;
use CommerceML\Node\Node;

abstract class Product extends Node implements Composite
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'id' => 'Ид',
            'catalogID' => 'ИдКаталога',
            'name' => 'Наименование',
            'features' => NULL,
            'baseUnit' => NULL,
            'pricePerUnit' => 'ЦенаЗаЕдиницу',
            'quantity' => 'Количество',
            'sum' => 'Сумма',
            'requisiteValues' => NULL
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Товар';
    }

    abstract public function id(): string;

    abstract public function catalogID(): ?string;

    abstract public function name(): string;
    
    abstract public function features(): ?Features;

    abstract public function baseUnit(): BaseUnit;

    abstract public function pricePerUnit(): string;

    abstract public function quantity(): string;

    abstract public function sum(): string;

    abstract public function requisiteValues(): RequisiteValues;

}