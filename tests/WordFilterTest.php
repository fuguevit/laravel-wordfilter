<?php

namespace Fuguevit\WordFilter\Tests;

class WordFilterTest extends TestCase
{
    public function test_stub()
    {
        $string = "OK我觉得六四好";

        $arr_badwords = ['六四', '江泽民', '李鹏'];

        $result = str_contains($string, $arr_badwords);

        return $this->assertTrue($result);
    }

}