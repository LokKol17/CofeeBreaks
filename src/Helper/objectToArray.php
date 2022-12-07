<?php

function object_to_array(stdClass $object): array
{
    $result = (array)$object;

    foreach($result as &$value) {

        if ($value instanceof stdClass) {
            $value = object_to_array($value);
        }
    }

    return $result;
}