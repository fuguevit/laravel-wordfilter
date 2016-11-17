<?php

namespace Fuguevit\WordFilter\Contracts;

interface FilterableInterface
{
    /**
     * Get Filterable fields.
     *
     * @return mixed
     */
    public function getFilterable();

    /**
     * Filter eloquent fields.
     *
     * @param callable|null $callback
     *
     * @return mixed
     */
    public function filterFields(callable $callback = null);
}
