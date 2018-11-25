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

abstract class RequisiteValue extends Node implements Composite
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'name' => 'Наименование',
            'value' => 'Значение'
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'ЗначениеРеквизита';
    }

    abstract public function name(): string;

    abstract public function value(): string;
}