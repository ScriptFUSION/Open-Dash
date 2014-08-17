<?php
use ScriptFUSION\OpenDash\Convert\Cut;

class CutTest extends PHPUnit_Framework_TestCase {
    /** @dataProvider provideData */
    public function test($data, $fields, $delimiter, $result) {
        $this->assertSame($result, (new Cut($fields, $delimiter))->convert($data));
    }

    public function provideData() {
        return [
            ["foo\tbar", 0, "\t", ''],
            ["foo\tbar", 1, "\t", 'foo'],
            ["foo\tbar", 2, "\t", 'bar'],
            ["foo\tbar", 3, "\t", ''],
            ['foo  bar', 1, ' ', 'foo'],
            ['foo  bar', 2, ' ', ''],
            ['foo  bar', 3, ' ', 'bar'],
        ];
    }
}
