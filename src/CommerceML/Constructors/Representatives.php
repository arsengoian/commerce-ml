<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class Representatives extends \CommerceML\Implementation\Representatives
{

    /**
     * Representatives constructor.
     * @param $representatives
     */
    public function __construct (array $representatives)
    {
        $this->representatives = $representatives;
    }
}