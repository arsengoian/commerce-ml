<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class CommercialInformation extends \CommerceML\Implementation\CommercialInformation
{

    /**
     * CommercialInformation constructor.
     * @param $documents
     * @param $schemaVersion
     * @param $formationDate
     */
    public function __construct (array $documents, string $schemaVersion = '2.10', string $formationDate = NULL)
    {
        $this->documents = $documents;
        $this->schemaVersion = $schemaVersion;
        $this->formationDate = $formationDate ?? date('Y-m-d');
    }
}