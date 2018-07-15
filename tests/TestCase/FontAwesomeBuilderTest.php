<?php
namespace FontAwesomeBuilder\Test\TestCase;

use FontAwesomeBuilder\Enum\FontAwesomeClassEnum;
use FontAwesomeBuilder\Enum\FontAwesomeCollectionEnum;
use FontAwesomeBuilder\FontAwesomeBuilder;
use PHPUnit\Framework\TestCase;

class FontAwesomeBuilderTest extends TestCase
{
	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}
	public function testBasicStyledUse()
	{
		$expected = '<span class="blue-stroopwafel"><i class="far fa-stroopwafel"></i></span>';
		$result = FontAwesomeBuilder::styled(FontAwesomeClassEnum::STROOPWAFEL, 'blue-stroopwafel');
		$this->assertEquals($expected, $result);
	}
	public function testBasicFixedUse()
	{
		$expected = '<i class="far fa-stroopwafel fa-fw"></i>';
		$result = FontAwesomeBuilder::fixedIcon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}
	public function testBasicBrandUse()
	{
		$expected = '<i class="fab fa-font-awesome"></i>';
		$result = FontAwesomeBuilder::brand(FontAwesomeClassEnum::FONT_AWESOME);
		$this->assertEquals($expected, $result);
	}
	public function testBasicSolidUse()
	{
		$expected = '<i class="fas fa-stroopwafel"></i>';
		$result = FontAwesomeBuilder::solid(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicLightUse()
	{
		$expected = '<i class="fal fa-stroopwafel"></i>';
		$result = FontAwesomeBuilder::light(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicRegularUse()
	{
		$expected = '<i class="far fa-stroopwafel"></i>';
		$result = FontAwesomeBuilder::regular(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicUse()
	{
		$expected = '<i class="far fa-stroopwafel"></i>';
		$result = FontAwesomeBuilder::icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}
}