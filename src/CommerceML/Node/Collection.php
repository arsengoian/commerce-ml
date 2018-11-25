<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 9:40 PM
 */

namespace CommerceML\Node;

use CommerceML\Node\Composite;

interface Collection extends Composite
{

    /**
     * If getChildFields declared method returns an array, its elements are checked.
     * They must be instances of the named class or interface
     *
     * @return array of [method name => child class]
     */
    static function getArrayFields(): array;

}
