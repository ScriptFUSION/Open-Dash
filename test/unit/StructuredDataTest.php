<?php
use ScriptFUSION\OpenDash\Data\StructuredData;

class StructuredDataTest extends PHPUnit_Framework_TestCase {
    /** @dataProvider provideInitializers */
    public function testInitiailizers($initializer, $description) {
        $data = new StructuredData($initializer);

        $this->assertSame('bar', $data['foo'], $description);
    }

    public function provideInitializers() {
        $array = ['foo' => 'bar'];

        return [
            [$array, 'Array'],
            [(object)$array, 'Object'],
            [new ArrayIterator($array), 'Iterator']
        ];
    }

    public function testGetData() {
        $data = new StructuredData(['foo' => 'bar']);

        $this->assertInternalType('array', $data->getData());
        $this->assertArrayHasKey('foo', $data->getData());
        $this->assertSame('bar', $data->getData()['foo']);
    }

    public function testGetError() {
        $data = new StructuredData([], 'foo');

        $this->assertSame('foo', $data->getError());
    }

    public function testIsValid() {
        $this->assertTrue((new StructuredData([]))->isValid());
        $this->assertFalse((new StructuredData([], 'foo'))->isValid());
    }

    public function testNestedIteratorInitializer() {
        $this->markTestSkipped('Will not pass yet.');

        $data = new StructuredData(new ArrayIterator([
            'foo' => new ArrayIterator([
                'bar' => new ArrayIterator([
                    'baz' => 'bat'
                ]),
                'qux' => 'quux'
            ])
        ]));

        $this->assertSame(['foo' => ['bar' => ['baz' => 'bat'], 'qux' => 'quux']], $data->getData());
    }
}
