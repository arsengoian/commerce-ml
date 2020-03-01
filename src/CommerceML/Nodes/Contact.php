<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 28.02.20
 * Time: 15:32
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Composite;
use CommerceML\Node\Node;

abstract class Contact extends Node implements Composite
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
        return 'Контакт';
    }

    abstract public function type(): string;

    abstract public function value(): string;
}