<?php

namespace Bogosoft\Http\Session;

/**
 * Represents a session.
 *
 * @package Bogosoft\Http\Session
 */
interface ISession
{
    /**
     * Get a value by its key from the current session.
     *
     * @param  string     $key     The key of a value to retrieve.
     * @param  mixed|null $default A value to be returned if the given key
     *                             has no associated value registered with
     *                             the current session.
     * @return mixed|null          The value associated with the given key
     *                             or the default value if no value could be
     *                             located.
     */
    function get(string $key, $default = null);

    /**
     * Get a value indicating whether or not the current session has a value
     * registered to a given key.
     *
     * @param  string $key A session value key.
     * @return bool        True if the current session has a value registered
     *                     to the given key; false otherwise.
     */
    function has(string $key): bool;

    /**
     * Regenerate the current session.
     */
    function regenerate(): void;

    /**
     * Set a given value by a given key in the current session.
     *
     * @param string $key   A key by which the given value can be referenced.
     * @param mixed  $value A value.
     */
    function set(string $key, $value): void;
}
