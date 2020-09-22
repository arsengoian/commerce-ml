<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 9:56 PM
 */

namespace CommerceML\Nodes;


use CommerceML\Node\Collection;
use CommerceML\Node\AttributeContaining;
use CommerceML\Node\Node;
use CommerceML\Traits\AttributeComposite;

abstract class BaseUnit extends Node implements AttributeContaining
{

    /**
     * @return string Russian representation
     */
    public static function commerceMLRepresentation (): string
    {
        return 'БазоваяЕдиница';
    }

    public static function attributes (): array
    {
        return [
            'code' => 'Код',
            'fullName' => 'НаименованиеПолное',
            'short' => 'МеждународноеСокращение'
        ];
    }


    abstract function code(): string;

    abstract function fullName(): string;

    abstract function short(): string;


}
