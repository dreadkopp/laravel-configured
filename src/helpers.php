<?php

if (! function_exists('configured')) {
    /**
     * Get the specified configuration value. it will only return configs that are explicitly configured, none merged from framework
     *
     * @template T
     * @param T $default
     * @return T
     */
    function configured(?string $key = null, mixed $default = null)
    {
        if (is_null($key)) {
            return app('configured');
        }

        return app('configured')->get($key, $default);
    }
}