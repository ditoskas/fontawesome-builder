<?php

namespace FontAwesomeBuilder\Test\TestCase\Models;

use FontAwesomeBuilder\Enum\FaRotateEnum;
use FontAwesomeBuilder\Enum\FontAwesomeClassEnum;
use FontAwesomeBuilder\Enum\FontAwesomeCollectionEnum;
use FontAwesomeBuilder\Enum\FontSizeEnum;
use FontAwesomeBuilder\Models\FaIcon;
use PHPUnit\Framework\TestCase;

class FaIconTest extends TestCase
{
	/**
	 * @var FaIcon|null
	 */
	protected $faIcon = null;
	protected $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare nulla id faucibus tincidunt. Donec quis sollicitudin justo, et dignissim.';
	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
		$this->faIcon = new FaIcon();
	}

	public function testMask()
	{
		$result = $this->faIcon->create()
			->brand()
			->shrink(3.5)
			->positionComplex(null, 1.25, 1.6, null)
			->mask(FontAwesomeCollectionEnum::SOLID, FontAwesomeClassEnum::CIRCLE)
			->icon(FontAwesomeClassEnum::FACEBOOK_F);
		$this->assertEquals('<i class="fab fa-facebook-f" data-fa-transform="shrink-3.5 right-1.25 down-1.6" data-fa-mask="fas fa-circle"></i>', $result);
	}

	public function testPosition()
	{
		$result = $this->faIcon->create()
			->solid()
			->shrink(8)
			->positionUp(6)
			->icon(FontAwesomeClassEnum::MAGIC);
		$this->assertEquals('<i class="fas fa-magic" data-fa-transform="shrink-8 up-6"></i>', $result);

		$result = $this->faIcon->positionRight(6)->icon(FontAwesomeClassEnum::MAGIC);
		$this->assertEquals('<i class="fas fa-magic" data-fa-transform="shrink-8 right-6"></i>', $result);

		$result = $this->faIcon->positionDown(6)->icon(FontAwesomeClassEnum::MAGIC);
		$this->assertEquals('<i class="fas fa-magic" data-fa-transform="shrink-8 down-6"></i>', $result);

		$result = $this->faIcon->positionLeft(6)->icon(FontAwesomeClassEnum::MAGIC);
		$this->assertEquals('<i class="fas fa-magic" data-fa-transform="shrink-8 left-6"></i>', $result);

	}

	public function testScale()
	{
		$result = $this->faIcon->create()
			->solid()
			->shrink(8)
			->icon(FontAwesomeClassEnum::MAGIC);
		$this->assertEquals('<i class="fas fa-magic" data-fa-transform="shrink-8"></i>', $result);

		$result = $this->faIcon->grow(6)->icon(FontAwesomeClassEnum::MAGIC);
		$this->assertEquals('<i class="fas fa-magic" data-fa-transform="grow-6"></i>', $result);
	}

	public function testBorderedAndPulledIcons()
	{
		$result = $this->faIcon->create()
			->solid()
			->size(FontSizeEnum::X2)
			->left()
			->icon(FontAwesomeClassEnum::QUOTE_LEFT);
		$this->assertEquals('<i class="fas fa-quote-left fa-2x fa-pull-left"></i>', $result);

		$result = $this->faIcon->right()->icon(FontAwesomeClassEnum::QUOTE_LEFT);
		$this->assertEquals('<i class="fas fa-quote-left fa-2x fa-pull-right"></i>', $result);

		$result = $this->faIcon->bordered()->icon(FontAwesomeClassEnum::QUOTE_LEFT);
		$this->assertEquals('<i class="fas fa-quote-left fa-2x fa-pull-right fa-border"></i>', $result);
	}

	public function testAnimate()
	{
		$result = $this->faIcon->create()
			->solid()
			->animate()
			->icon(FontAwesomeClassEnum::SPINNER);
		$this->assertEquals('<i class="fas fa-spinner fa-spin"></i>', $result);
	}

	public function testRotate()
	{
		$result = $this->faIcon->create()
			->brand()
			->rotate(FaRotateEnum::ROTATE_90)
			->icon(FontAwesomeClassEnum::FONT_AWESOME);
		$this->assertEquals('<i class="fab fa-font-awesome fa-rotate-90"></i>', $result);

		$result = $this->faIcon->rotate(FaRotateEnum::ROTATE_180)->icon(FontAwesomeClassEnum::FONT_AWESOME);
		$this->assertEquals('<i class="fab fa-font-awesome fa-rotate-180"></i>', $result);

		$result = $this->faIcon->rotate(FaRotateEnum::ROTATE_270)->icon(FontAwesomeClassEnum::FONT_AWESOME);
		$this->assertEquals('<i class="fab fa-font-awesome fa-rotate-270"></i>', $result);

		$result = $this->faIcon->rotate(FaRotateEnum::ROTATE_FLIP_HORIZONTAL)->icon(FontAwesomeClassEnum::FONT_AWESOME);
		$this->assertEquals('<i class="fab fa-font-awesome fa-flip-horizontal"></i>', $result);

		$result = $this->faIcon->rotate(FaRotateEnum::ROTATE_FLIP_VERTICAL)->icon(FontAwesomeClassEnum::FONT_AWESOME);
		$this->assertEquals('<i class="fab fa-font-awesome fa-flip-vertical"></i>', $result);
	}

	public function testFixedWidth()
	{
		$expected = '<i class="fas fa-home fa-fw"></i>';
		$result = $this->faIcon->create()
			->solid()
			->fixed()
			->icon(FontAwesomeClassEnum::HOME);
		$this->assertEquals($expected, $result);
	}

	public function testSizing()
	{
		$result = $this->faIcon->create()
			->solid()
			->size(FontSizeEnum::XS)
			->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-xs"></i>', $result);

		$result = $this->faIcon->size(FontSizeEnum::SM)->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-sm"></i>', $result);

		$result = $this->faIcon->size(FontSizeEnum::LG)->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-lg"></i>', $result);

		$result = $this->faIcon->size(FontSizeEnum::X2)->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-2x"></i>', $result);

		$result = $this->faIcon->size(FontSizeEnum::X3)->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-3x"></i>', $result);

		$result = $this->faIcon->size(FontSizeEnum::X5)->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-5x"></i>', $result);

		$result = $this->faIcon->size(FontSizeEnum::X7)->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-7x"></i>', $result);

		$result = $this->faIcon->size(FontSizeEnum::X10)->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals('<i class="fas fa-stroopwafel fa-10x"></i>', $result);
	}

	public function testBasicWrappedUse()
	{
		$expected = '<span style="font-size: 3em; color: Tomato;"><i class="fas fa-stroopwafel"></i></span>';
		$result = $this->faIcon->create()
			->solid()
			->wrapped('span',['style' => 'font-size: 3em; color: Tomato;'])
			->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicStyledUse()
	{
		$expected = '<span class="blue-stroopwafel"><i class="far fa-stroopwafel"></i></span>';
		$result = $this->faIcon->create()
			->styled('blue-stroopwafel')
			->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}
	public function testBasicBrandUse()
	{
		$expected = '<i class="fab fa-font-awesome"></i>';
		$result = $this->faIcon->create()
			->brand()
			->icon(FontAwesomeClassEnum::FONT_AWESOME);
		$this->assertEquals($expected, $result);
	}
	public function testBasicSolidUse()
	{
		$expected = '<i class="fas fa-stroopwafel"></i>';
		$result = $this->faIcon->create()
			->solid()
			->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicLightUse()
	{
		$expected = '<i class="fal fa-stroopwafel"></i>';
		$result = $this->faIcon->create()
			->light()
			->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicRegularUse()
	{
		$expected = '<i class="far fa-stroopwafel"></i>';
		$result = $this->faIcon->create()
			->regular()
			->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicUse()
	{
		$expected = '<i class="far fa-stroopwafel"></i>';
		$result = $this->faIcon->create()->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testBasicUseTag()
	{
		$expected = '<span class="far fa-stroopwafel"></span>';
		$result = $this->faIcon->create()->tag('span')->icon(FontAwesomeClassEnum::STROOPWAFEL);
		$this->assertEquals($expected, $result);
	}

	public function testTag()
	{
		$expected = [
			'tag' => 'span',
			'collection' => FontAwesomeCollectionEnum::REGULAR
		];

		$icon = $this->faIcon->create()->tag('span');
		$this->assertInstanceOf(FaIcon::class, $icon);
		$this->assertEquals($expected, $icon->getConfig());
	}

	public function testCreateWithoutConfig()
	{
		$expected = [
			'tag' => 'i',
			'collection' => FontAwesomeCollectionEnum::REGULAR
		];
		$icon = $this->faIcon->create();
		$this->assertEquals($expected, $icon->getConfig());
	}

	public function testCreateWithConfig()
	{
		$expected = [
			'tag' => 'span',
			'collection' => FontAwesomeCollectionEnum::SOLID
		];
		$icon = $this->faIcon->create($expected);
		$this->assertEquals($expected, $icon->getConfig());
	}

	public function testSetGetConfig()
	{
		$expected = [
			'tag' => 'span',
			'collection' => FontAwesomeCollectionEnum::BRAND
		];
		$fa = new FaIcon($expected);
		$this->assertEquals($expected, $fa->getConfig());
		$expected['collection'] = FontAwesomeCollectionEnum::SOLID;
		$fa->setConfig($expected);
		$this->assertEquals($expected, $fa->getConfig());
	}
}