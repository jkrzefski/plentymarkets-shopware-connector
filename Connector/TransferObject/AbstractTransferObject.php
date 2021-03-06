<?php

namespace SystemConnector\TransferObject;

abstract class AbstractTransferObject implements TransferObjectInterface
{
    /**
     * @param array $params
     *
     * @return $this
     */
    public static function fromArray(array $params = [])
    {
        $object = new static();

        foreach ($params as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($object, $method)) {
                $object->$method($value);
            }
        }

        return $object;
    }
}
