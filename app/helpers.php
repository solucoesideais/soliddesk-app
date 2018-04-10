<?php

/**
 * @param string $class
 * @param string $method
 * @return string
 */
function route_handler($class, $method)
{
    return $class . '@' . $method;
}
