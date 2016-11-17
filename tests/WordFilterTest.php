<?php

namespace Fuguevit\WordFilter\Tests;

class WordFilterTest extends TestCase
{
    public function test_bad_words()
    {
        $string = 'OK我觉得五三好';

        $arr_badwords = ['五三'];

        $result = str_contains($string, $arr_badwords);
        $this->assertTrue($result);
    }
}
