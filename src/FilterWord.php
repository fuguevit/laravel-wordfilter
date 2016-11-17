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
        'range',
        'status'
    ];

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