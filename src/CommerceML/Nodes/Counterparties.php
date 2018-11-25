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

abstract class Counterparties extends Node implements Collection
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'counterparties' => NULL,
        ];
    }


    /**
     * @inheritdoc
     */
    static function getArrayFields (): array
    {
        return [
            'counterparties' => Counterparty::class,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Контрагенты';
    }


    abstract public function counterparties(): array;
}