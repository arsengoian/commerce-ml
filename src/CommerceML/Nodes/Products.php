<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 3:02 PM
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Collection;
use CommerceML\Node\Node;

abstract class Products extends Node implements Collection
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'products' => NULL,
        ];
    }

    static function getArrayFields (): array
    {
        return [
            'products' => Product::class,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Товары';
    }

    abstract public function products(): array;
}