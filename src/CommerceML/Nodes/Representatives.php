<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 3:44 PM
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Collection;
use CommerceML\Node\Node;

abstract class Representatives extends Node implements Collection
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'representatives' => NULL,
        ];
    }

    /**
     * @inheritdoc
     */
    static function getArrayFields (): array
    {
        return [
            'representatives' => Representative::class,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Представители';
    }

    abstract public function representatives(): array;
}