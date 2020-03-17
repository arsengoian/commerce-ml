<?php
/**
 * Created by PhpStorm.
 * User: riv
 * Date: 13.03.20
 * Time: 13:14
 */

namespace CommerceML\Constructors;


class Features extends \CommerceML\Implementation\Features
{
    /**
     * Features constructor.
     * @param array $features
     */
    public function __construct (array $features)
    {
        $this->features = $features;
    }
}