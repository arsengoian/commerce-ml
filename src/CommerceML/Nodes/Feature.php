<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 13.03.20
 * Time: 13:17
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Composite;
use CommerceML\Node\Node;

abstract class Feature extends Node implements Composite
{
    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'id' => 'Ид',
            'name' => 'Наименование',
            'value' => 'Значение'
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'ХарактеристикаТовара';
    }

    abstract public function id(): ?string;
    
    abstract public function name(): string;

    abstract public function value(): string;
}