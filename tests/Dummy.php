<?php

namespace FontAwesomeBuilder\Test;

use FontAwesomeBuilder\Traits\ClassesAwareTrait;

class Dummy
{
	use ClassesAwareTrait;

	public static function dummyAddClassIfOptionExists($key, &$classes, &$options)
	{
		self::addClassIfOptionExists($key,$classes, $options);
	}

	public static function dummyAddStaticClassIfOptionExists($key, &$classes, &$options)
	{
		self::addStaticClassIfOptionExists($key,$classes, $options);
	}
}