<?php

namespace Fuguevit\WordFilter\Tests;

class WordFilterTest extends TestCase
{
    public function test_stub()
    {
        $string = "OK我觉得六四好";

        $arr_badwords = ['六四', '江泽民', '李鹏'];

        $result = str_contains($string, $arr_badwords);
        $this->assertTrue($result);

        $collection = collect([['江泽民', 2, 3], [4, 5, 6], [7, 8, 9]]);

        $result2 = str_contains('OK江泽民觉得六四好', $collection->collapse()->all());
        $this->assertTrue($result2);
    }

}