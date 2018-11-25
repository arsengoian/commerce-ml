<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 9:56 PM
 */

namespace CommerceML\Nodes;


use CommerceML\ArrayNode;
use CommerceML\AttributeContaining;
use CommerceML\Node;
use CommerceML\Traits\AttributeComposite;

abstract class CommercialInformation extends Node implements AttributeContaining, ArrayNode
{
    use AttributeComposite;

    /**
     * @return string Russian representation
     */
    public function commerceMLRepresentation (): string
    {
        return 'КоммерческаяИнформация';
    }

    public function attributes (): array
    {
        return [
            'schemaVersion' => 'ВерсияСхемы',
            'formationDate' => 'ДатаФормирования'
        ];
    }

    function getChildFields (): array
    {
        return [
            'document' => NULL
        ];
    }

    function getArrayFields (): array
    {
        return [
            'document' => Document::class,
        ];
    }


    abstract function document(): array;

    abstract function schemaVersion(): string;

    abstract function formationDate(): string;


}
