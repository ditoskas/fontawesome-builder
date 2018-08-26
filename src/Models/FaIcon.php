<?php

namespace FontAwesomeBuilder\Models;

use FontAwesomeBuilder\Enum\FontAwesomeCollectionEnum;
use FontAwesomeBuilder\FontAwesomeBuilder;

class FaIcon
{
	protected $config = [
		'tag' => 'i',
		'collection' => FontAwesomeCollectionEnum::REGULAR
	];
	protected $scale = null;
	protected $position = null;

	public function __construct($config = [])
	{
		$this->config = array_merge($this->config, $config);
	}

	private function getTransformValue(){
		$result = '';
		if (!empty($this->scale)){
			$result .= $this->scale;
		}
		if (!empty($this->position)){
			$result .= ' '.$this->position;
		}
		return $result;
	}

	public function mask($collection, $icon)
	{
		$this->setConfigItem('mask', $collection.' '.$icon);
		return $this;
	}

	public function positionComplex($up = null, $right = null, $down = null, $left = null)
	{
		$value = '';
		if ($up !== null){
			$value .= 'up-'.$up;
		}
		if ($right !== null){
			$value .= !empty($value)?' right-'.$right:'right-'.$right;
		}
		if ($down !== null){
			$value .= !empty($value)?' down-'.$down:'down-'.$down;
		}
		if ($left !== null){
			$value .= !empty($value)?' left-'.$left:'left-'.$left;
		}
		$this->position = $value;
		$this->setConfigItem('transform', $this->getTransformValue());
		return $this;
	}

	public function grow($value)
	{
		$this->scale = 'grow-'.$value;
		$this->setConfigItem('transform', $this->getTransformValue());
		return $this;
	}

	public function shrink($value)
	{
		$this->scale = 'shrink-'.$value;
		$this->setConfigItem('transform', $this->getTransformValue());
		return $this;
	}

	public function positionUp($value)
	{
		return $this->position('up', $value);
	}

	public function positionRight($value)
	{
		return $this->position('right', $value);
	}

	public function positionDown($value)
	{
		return $this->position('down', $value);
	}

	public function positionLeft($value)
	{
		return $this->position('left', $value);
	}

	public function position($direction, $value)
	{
		$this->position = $direction.'-'.$value;
		$this->setConfigItem('transform', $this->getTransformValue());
		return $this;
	}

	public function right()
	{
		unset($this->config['pull-left']);
		$this->setConfigItem('pull-right', true);
		return $this;
	}

	public function left()
	{
		unset($this->config['pull-right']);
		$this->setConfigItem('pull-left', true);
		return $this;
	}

	public function bordered()
	{
		$this->setConfigItem('bordered', true);
		return $this;
	}

	public function animate()
	{
		$this->setConfigItem('animate', true);
		return $this;
	}

	public function rotate($rotate)
	{
		$this->setConfigItem('rotate', $rotate);
		return $this;
	}

	public function getConfig()
	{
		return $this->config;
	}

	public function setConfig($currentConfig)
	{
		$this->config = $currentConfig;
	}

	public function setConfigItem($key, $value)
	{
		$this->config[$key] = $value;
	}

	public function styled($class)
	{
		$this->setConfigItem('styled', $class);
		return $this;
	}

	public function fixed()
	{
		$this->setConfigItem('fixed', true);
		return $this;
	}

	public function regular()
	{
		$this->setConfigItem('collection', FontAwesomeCollectionEnum::REGULAR);
		return $this;
	}

	public function solid()
	{
		$this->setConfigItem('collection', FontAwesomeCollectionEnum::SOLID);
		return $this;
	}

	public function light()
	{
		$this->setConfigItem('collection', FontAwesomeCollectionEnum::LIGHT);
		return $this;
	}

	public function brand()
	{
		$this->setConfigItem('collection', FontAwesomeCollectionEnum::BRAND);
		return $this;
	}

	public function wrapped($tag, $options = [])
	{
		if (empty($options)){
			$this->setConfigItem('wrapped', $tag);
		}
		else {
			$options = array_merge(['tag' => $tag], $options);
			$this->setConfigItem('wrapped', $options);
		}
		return $this;
	}

	public function icon($name)
	{
		$config = $this->getConfig();
		if (isset($config['styled'])){
			return FontAwesomeBuilder::styled($name, $config['styled'],$this->getConfig());
		}
		return FontAwesomeBuilder::icon($name,$this->getConfig());
	}

	public function stackIcons($icons, $options = []){
		return FontAwesomeBuilder::stackIcons($icons, $options);
	}

	public function create($config = [])
	{
		if (empty($config)){
			$config = [
				'tag' => 'i',
				'collection' => FontAwesomeCollectionEnum::REGULAR
			];
		}
		$this->setConfig($config);
		return $this;
	}

	public function style($style)
	{
		$this->setConfigItem('style', $style);
		return $this;
	}

	public function text($text)
	{
		$this->setConfigItem('text', $text);
		return $this;
	}

	public function tag($tag)
	{
		$this->setConfigItem('tag', $tag);
		return $this;
	}

	public function size($size)
	{
		$this->setConfigItem('size', $size);
		return $this;
	}
}