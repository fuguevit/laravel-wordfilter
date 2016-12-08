<?php

namespace Fuguevit\WordFilter\Traits;

use Illuminate\Support\Facades\Cache;

trait FilterableTrait
{
    /**
     * {@inheritdoc}
     */
    public function getFilterable()
    {
        return $this->filterable;
    }

    /**
     * {@inheritdoc}
     */
    public function filterFields(callable $callback = null)
    {
        $input = '';
        $fields = $this->getFilterable();

        foreach ($fields as $field) {
            // add prefix & suffix symbol for avoiding splice collision.
            $input .= '##'.$this->{$field}.'##';
        }

        if (!$this->censorContent($input)) {
            if ($callback) {
                return $callback();
            }

            return false;
        }

        return true;
    }

    /**
     * Censor content.
     *
     * @param $content
     *
     * @return bool
     */
    protected function censorContent($content)
    {
        $arrBadWords = $this->getCachedBadwords();
        $content = strtolower($content);

        // if content contains bad words, return false.
        if (str_contains($content, $arrBadWords)) {
            return false;
        }

        // return true when content doesn't contain any bad word.
        return true;
    }

    /**
     * Get Cached Bad Words.
     *
     * @return mixed
     */
    protected function getCachedBadwords()
    {
        $words = Cache::remember(config('word.filter.cached_key'), config('word.filter.cached_minutes'),
            function () {
                $collection = $this->createFilterWordModel()->whereStatus('enable')->get(['name']);
                $array = [];
                foreach ($collection as $item) {
                    $array[] = strtolower($item['name']);
                }

                return $array;
            }
        );

        return $words;
    }

    /**
     * Create Entity Model.
     *
     * @return mixed
     */
    public static function createFilterWordModel()
    {
        $filterWordModel = config('word.filter.model');

        return new $filterWordModel();
    }
}
