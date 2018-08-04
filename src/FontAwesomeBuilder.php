<?php

namespace FontAwesomeBuilder;

use FontAwesomeBuilder\Enum\FaStackEnum;
use FontAwesomeBuilder\Enum\FontAwesomeCollectionEnum;
use FontAwesomeBuilder\Traits\ClassesAwareTrait;

class FontAwesomeBuilder
{
	use ClassesAwareTrait;

	public static function icon($name, $options = [])
	{
		$tag = (!empty($options['tag']))?htmlentities($options['tag']):'i';
		unset($options['tag']);
		$collection = (!empty($options['collection']))?htmlentities($options['collection']):FontAwesomeCollectionEnum::REGULAR;
		unset($options['collection']);
		$classes = [
			$collection,
			$name
		];
		$wrappedStartTag = $wrappedEndTag = null;
		if (isset($options['wrapped'])){
			if (is_array($options['wrapped'])){
				$wrappedStartTag = '<'.$options['wrapped']['tag'];
				if (isset($options['wrapped']['class'])){
					$wrappedStartTag .= ' class="'.$options['wrapped']['class'].'"';
				}
				if (isset($options['wrapped']['style'])){
					$wrappedStartTag .= ' style="'.$options['wrapped']['style'].'"';
				}
				$wrappedStartTag .= '>';
				$wrappedEndTag = '</'.$options['wrapped']['tag'].'>';
			}
			else {
				$wrappedStartTag = '<'.$options['wrapped'].'>';
				$wrappedEndTag = '</'.$options['wrapped'].'>';
			}
		}
		unset($options['wrapped']);
		$text = null;
		if (isset($options['text'])){
			if (isset($options['escape']) && $options['escape'] === false){
				$text = $options['text'];
			}
			else {
				$text = htmlentities($options['text']);
			}
		}
		unset($options['escape']);
		unset($options['text']);
		self::addClassIfOptionExists('size', $classes, $options);
		self::addClassIfOptionExists('class', $classes, $options);
		self::addClassIfOptionExists('rotate', $classes, $options);

		self::addStaticClassIfOptionExists('fixed', $classes, $options);
		self::addStaticClassIfOptionExists('animate', $classes, $options);
		self::addStaticClassIfOptionExists('pull-left', $classes, $options);
		self::addStaticClassIfOptionExists('pull-right', $classes, $options);
		self::addStaticClassIfOptionExists('bordered', $classes, $options);

		$options['class'] = implode(' ',$classes);
		$result = $wrappedStartTag.'<'.$tag.' class="'.$options['class'].'"';
		if (isset($options['style'])){
			$result .= ' style="'.$options['style'].'"';
		}
		if (isset($options['transform'])){
			$result .= ' data-fa-transform="'.$options['transform'].'"';
		}
		if (isset($options['mask'])){
			$result .= ' data-fa-mask="'.$options['mask'].'"';
		}
		$result .= '></'.$tag.'>'.$text.$wrappedEndTag;
		return $result;
	}

	public static function styled($name, $styleClass, $options = [])
	{
		$icon = self::icon($name, $options);
		return '<span class="'.$styleClass.'">'.$icon.'</span>';
	}

	public function stackIcons($icons, $options = [])
	{
		if (count($icons) !== 2){
			throw new \Exception('There must be exactly 2 icons');
		}
		$icon1 = $icons[0];
		$icon2 = $icons[1];
		$optionsIcon1 = isset($options['icon1'])?$options['icon1']:[];
		$optionsIcon2 = isset($options['icon2'])?$options['icon2']:[];

		$spanClass = FaStackEnum::FA_STACK;
		if (isset($options['size'])){
			$spanClass .= ' '.$options['size'];
		}
		if (isset($options['class'])){
			$spanClass .= ' '.$options['class'];
		}

		$optionsIcon1['class'] = isset($optionsIcon1['class'])?FaStackEnum::FA_STACK_2X.' '. $optionsIcon1['class']:FaStackEnum::FA_STACK_2X;
		$optionsIcon2['class'] = isset($optionsIcon2['class'])?FaStackEnum::FA_STACK_1X.' '. $optionsIcon2['class']:FaStackEnum::FA_STACK_1X;
		$result = [
			'<span class="'.htmlentities($spanClass).'">',
			self::icon($icon1, $optionsIcon1),
			self::icon($icon2, $optionsIcon2),
			'</span>'
		];

		return implode('', $result);
	}

	public static function fixedIcon($name, $options = [])
	{
		$options['fixed'] = true;
		return self::icon($name, $options);
	}

	public static function regular($name, $options = [])
	{
		$options['collection'] = FontAwesomeCollectionEnum::REGULAR;
		return self::icon($name, $options);
	}

	public static function solid($name, $options = [])
	{
		$options['collection'] = FontAwesomeCollectionEnum::SOLID;
		return self::icon($name, $options);
	}

	public static function light($name, $options = [])
	{
		$options['collection'] = FontAwesomeCollectionEnum::LIGHT;
		return self::icon($name, $options);
	}

	public static function brand($name, $options = [])
	{
		$options['collection'] = FontAwesomeCollectionEnum::BRAND;
		return self::icon($name, $options);
	}

}