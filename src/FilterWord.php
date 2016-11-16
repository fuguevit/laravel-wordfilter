<?php

namespace Fuguevit\WordFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FilterWord extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'filter_words';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'scope',
        'status'
    ];

    /**
     * Find entity by name field.
     *
     * @param Builder $query
     * @param $name
     * @return mixed
     */
    public function scopeName(Builder $query, $name)
    {
        return $query->whereName($name);
    }

    /**
     * Find entity by range field.
     *
     * @param Builder $query
     * @param $range
     * @return mixed
     */
    public function scopeRange(Builder $query, $range)
    {
        return $query->whereRange($range);
    }

    /**
     * Find entity by status field.
     *
     * @param Builder $query
     * @param $status
     * @return mixed
     */
    public function scopeStatus(Builder $query, $status)
    {
        return $query->whereStatus($status);
    }
}