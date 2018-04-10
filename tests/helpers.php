<?php
/**
 * @param string $class
 * @param array $attributes
 * @param int $times
 * @return \Illuminate\Database\Eloquent\Model
 */
function create(string $class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}

/**
 * @param string $class
 * @param array $attributes
 * @param int $times
 * @return \Illuminate\Database\Eloquent\Model
 */
function make(string $class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}
