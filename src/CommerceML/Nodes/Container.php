<?php
/**
 * Container.php
 * Date: 18.09.2020
 * Time: 12:55
 * Author: Maksim Klimenko
 * Email: mavsan@gmail.com
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Collection;
use CommerceML\Node\Node;

abstract class Container extends Node implements Collection
{
    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'documents' => NULL,
        ];
    }

    static function getArrayFields (): array
    {
        return [
            'documents' => Document::class,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Контейнер';
    }

    abstract public function documents(): array;
}
