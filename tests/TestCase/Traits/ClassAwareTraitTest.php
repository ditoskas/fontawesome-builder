<?php

namespace FontAwesomeBuilder\Test\TestCase\Traits;
use FontAwesomeBuilder\Enum\FaRotateEnum;
use FontAwesomeBuilder\Enum\FontSizeEnum;
use FontAwesomeBuilder\Test\Dummy;
use PHPUnit\Framework\TestCase;

class ClassAwareTraitTest extends TestCase
{
	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}

	public function testAddClassIfOptionExists()
	{
		$expected = 'fal fa-users fa-2x';
		$options = [
			'collection' => 'fal',
			'icon' => 'fa-users',
			'size' => 'fa-2x'
		];
		$classes = [];

		Dummy::dummyAddClassIfOptionExists('collection', $classes, $options);
		Dummy::dummyAddClassIfOptionExists('icon', $classes, $options);
		Dummy::dummyAddClassIfOptionExists('size', $classes, $options);
		$this->assertEquals($expected, implode(' ', $classes));
		$this->assertEmpty($options);
	}

	public function testAddStaticClassIfOptionExists()
	{
		$expected = 'fal fa-users fa-2x fa-fw fa-spin';
		$options = [
			'collection' => 'fal',
			'icon' => 'fa-users',
			'size' => 'fa-2x',
			'fixed' => FontSizeEnum::FIXED_WIDTH,
			'animate' => FaRotateEnum::ANIMATE,
		];
		$classes = [];
		Dummy::dummyAddClassIfOptionExists('collection', $classes, $options);
		Dummy::dummyAddClassIfOptionExists('icon', $classes, $options);
		Dummy::dummyAddClassIfOptionExists('size', $classes, $options);
		Dummy::dummyAddStaticClassIfOptionExists('fixed', $classes, $options);
		Dummy::dummyAddStaticClassIfOptionExists('animate', $classes, $options);
		$this->assertEquals($expected, implode(' ', $classes));
		$this->assertEmpty($options);
	}
}