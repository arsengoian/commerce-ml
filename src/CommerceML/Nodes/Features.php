<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 13.03.20
 * Time: 13:16
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Collection;
use CommerceML\Node\Node;

abstract class Features extends Node implements Collection
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'features' => NULL,
        ];
    }

    /**
     * @inheritdoc
     */
    static function getArrayFields (): array
    {
        return [
            'features' => Feature::class,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'ХарактеристикиТовара';
    }

    abstract public function features(): array;
}