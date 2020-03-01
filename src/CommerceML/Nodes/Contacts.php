<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 28.02.20
 * Time: 15:38
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Collection;
use CommerceML\Node\Node;

abstract class Contacts extends Node implements Collection
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'contacts' => NULL,
        ];
    }

    /**
     * @inheritdoc
     */
    static function getArrayFields (): array
    {
        return [
            'contacts' => Contact::class,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Контакты';
    }

    abstract public function contacts(): array;
}