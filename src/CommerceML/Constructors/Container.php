<?php
/**
 * Container.php
 * Date: 18.09.2020
 * Time: 14:30
 * Author: Maksim Klimenko
 * Email: mavsan@gmail.com
 */

namespace CommerceML\Constructors;


class Container extends \CommerceML\Implementation\Container
{
    /**
     * Container constructor.
     * @param $documents
     */
    public function __construct (array $documents)
    {
        $this->documents = $documents;
    }
}
