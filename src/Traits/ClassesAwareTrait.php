<?php

namespace FontAwesomeBuilder\Traits;

use FontAwesomeBuilder\Enum\FaOtherClassEnum;
use FontAwesomeBuilder\Enum\FaRotateEnum;
use FontAwesomeBuilder\Enum\FontSizeEnum;

trait ClassesAwareTrait
{
	protected static function addClassIfOptionExists($key, &$tbl, &$options){
		if (isset($options[$key])){
			$tbl[] = htmlentities($options[$key]);
			unset($options[$key]);
		}
	}

	protected static function addStaticClassIfOptionExists($key, &$tbl, &$options){
		$css = null;
		switch ($key){
			case 'fixed':
				$css = FontSizeEnum::FIXED_WIDTH;
				break;
			case 'animate':
				$css = FaRotateEnum::ANIMATE;
				break;
			case 'pull-left':
				$css = FaOtherClassEnum::FA_PULL_LEFT;
				break;
			case 'pull-right':
				$css = FaOtherClassEnum::FA_PULL_RIGHT;
				break;
			case 'bordered':
				$css = FaOtherClassEnum::FA_BORDER;
				break;
		}
		if (isset($options[$key])){
			$options[$key] = $css;
		}
		return self::addClassIfOptionExists($key, $tbl, $options);
	}
}