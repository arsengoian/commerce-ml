<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 11:01 AM
 */

namespace CommerceML\Implementation;


use CommerceML\DefaultImplementation;
use CommerceML\Implementation;

class CommercialInformation extends \CommerceML\Nodes\CommercialInformation implements Implementation
{
    protected $documents;
    protected $schemaVersion;
    protected $formationDate;

    use DefaultImplementation;



    /**
     * @return mixed
     */
    public function documents (): array
    {
        return $this->documents;
    }

    /**
     * @return mixed
     */
    public function schemaVersion (): string
    {
        return $this->schemaVersion;
    }

    /**
     * @return mixed
     */
    public function formationDate (): string
    {
        return $this->formationDate;
    }



}