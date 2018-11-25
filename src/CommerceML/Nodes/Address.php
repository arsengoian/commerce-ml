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

abstract class Address extends Node implements Collection
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'addressFields' => NULL,
            'representation' => 'Представление',
        ];
    }

    /**
     * @inheritdoc
     */
    static function getArrayFields (): array
    {
        return [
            'addressFields' => AddressField::class,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'АдресРегистрации';
    }

    abstract public function addressFields(): array;

    abstract public function representation(): string;
}