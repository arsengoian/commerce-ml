<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:31 PM
 */

namespace CommerceML\Traits;


use ArrayIterator;
use Traversable;

trait ImplementsCollection
{
    // Countable interface

    public function count ()
    {
        return count($this -> {self::DATA_FIELD});
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     */
    public function getIterator (): Traversable
    {
        return new ArrayIterator($this->{self::DATA_FIELD});
    }


    // ArrayAccess realization

    public function offsetSet($offset, $value) {
        if (is_null($offset))
            $this -> {self::DATA_FIELD}[] = $value;
        else
            $this -> {self::DATA_FIELD}[$offset] = $value;
        return $value;
    }

    /**
     * @param $offset
     * @return bool
     * @throws \Exception
     */
    public function offsetExists($offset) : bool {
        if (!is_string($offset) && !is_numeric($offset) && !is_null($offset))
            throw new \Exception('Illegal offset type');
        return isset($this -> data[$offset]);
    }

    public function offsetGet($offset) {
        try {
            return $this -> offsetExists($offset) ? $this -> {self::DATA_FIELD}[$offset] : NULL;
        } catch (\Exception $exception) {
            return NULL;
        }
    }

    public function offsetUnset($offset) {
        unset($this -> {self::DATA_FIELD}[$offset]);
    }
}