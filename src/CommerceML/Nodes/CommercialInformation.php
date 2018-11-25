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

abstract class CommercialInformation extends Node implements AttributeContaining, Collection
{
    use AttributeComposite;

    /**
     * @return string Russian representation
     */
    public static function commerceMLRepresentation (): string
    {
        return 'КоммерческаяИнформация';
    }

    public static function attributes (): array
    {
        return [
            'schemaVersion' => 'ВерсияСхемы',
            'formationDate' => 'ДатаФормирования'
        ];
    }

    public static function getChildFields (): array
    {
        return [
            'documents' => NULL
        ];
    }

    public static function getArrayFields (): array
    {
        return [
            'documents' => Document::class,
        ];
    }


    abstract function documents(): array;

    abstract function schemaVersion(): string;

    abstract function formationDate(): string;


}
