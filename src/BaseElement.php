<?php
namespace GCWorld\FormBuilder;

abstract class BaseElement implements BaseElementInterface
{
	protected $elementID            = null;
	protected $elementName          = null;
	protected $elementLabel         = null;
	protected $elementValue         = null;
	protected $elementPlaceholder   = null;
	protected $elementClass         = 'form-control';

	/**
	 * @param $elementName
	 */
	public function __construct($elementName)
	{
		$this->elementName = $elementName;
	}

	/**
	 * @param $text
	 * @return $this
	 */
	public function setLabel($text)
	{
		$this->elementLabel = $text;
		return $this;
	}

	/**
	 * @param $id
	 * @return $this
	 */
	public function setID($id)
	{
		$this->elementID = $id;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setValue($value)
	{
		$this->elementValue = $value;
		return $this;
	}

	/**
	 * @param $text
	 * @return $this
	 */
	public function setPlaceholder($text)
	{
		$this->elementPlaceholder = $text;
		return $this;
	}

	/**
	 * @param $class
	 * @return $this
	 */
	public function addClass($class)
	{
		$this->elementClass .= ' '.$class;
		return $this;
	}
}

interface BaseElementInterface
{
	/**
	 * @param $elementName
	 */
	public function __construct($elementName);
	public function setLabel($text);
	public function setID($id);
	public function setValue($value);
	public function render();
}
