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

abstract class AddressField extends Node implements Composite
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'type' => 'Тип',
            'value' => 'Значение'
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'АдресноеПоле';
    }

    abstract public function type(): string;

    abstract public function value(): string;
}