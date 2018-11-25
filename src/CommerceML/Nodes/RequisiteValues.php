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

abstract class RequisiteValues extends Node implements Collection
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'requisiteValues' => NULL
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'ЗначенияРеквизитов';
    }

    static function getArrayFields (): array
    {
        return [
            'requisiteValues' => RequisiteValue::class
        ];
    }

    abstract public function requisiteValues(): array;


}