<?php

namespace Fuguevit\WordFilter\Traits;

use Illuminate\Support\Facades\Cache;

trait FilterableTrait
{
    /**
     * Filter Fields
     *
     * @param $fields
     * @param $callback
     * @return bool
     */
    public function filterFields($fields, $callback)
    {
        foreach ($fields as $field) {
            $value = $this->{$field};
            if (!$this->censorString($value)) {
                if ($callback) {
                    return $this->{$callback}();
                }
                return false;
            }
        }
        return true;
    }

    /**
     * censorString
     *
     * @param $string
     * @return bool
     */
    protected function censorString($string)
    {
        $arr_badwords = $this->getCachedBadwords();

        // if string contains bad words, return true
        if (str_contains($string, $arr_badwords)) {
            return false;
        }

        return true;
    }

    /**
     * Get Cached Bad Words.
     *
     * @return mixed
     */
    protected function getCachedBadwords()
    {
        $words = Cache::remember(config('fugue.filterword.cached_key'), config('fugue.filterword.cached_minutes'),
            function () {
                return $this->createFilterWordModel()->scopeStatus('enable')->get('name');
            }
        );
        return $words;
    }

    /**
     * @return mixed
     */
    public static function createFilterWordModel()
    {
        $filterWordModel = config('fugue.filterword.model');
        return new $filterWordModel();
    }

}