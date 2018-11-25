<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 3:02 PM
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Composite;
use CommerceML\Node\Node;

abstract class Representative extends Node implements Composite
{

    /**
     * @inheritdoc
     */
    static function getChildFields (): array
    {
        return [
            'counterparty' => NULL,
        ];
    }

    /**
     * @return string Russian representation of tag name
     */
    static function commerceMLRepresentation (): string
    {
        return 'Представитель';
    }

    abstract public function counterparty(): Counterparty;
}