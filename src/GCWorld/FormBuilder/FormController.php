<?php
namespace GCWorld\FormBuilder;

class FormController
{
	protected $formElements = array();
	protected $elementIndex = 0;
	protected $formUrl      = null;
	protected $formMethod   = null;
	public    $formEncType  = 'multipart/form-data';

	public function __construct($url, $method = 'POST')
	{
		$this->formUrl    = $url;
		$this->formMethod = $method;
	}

	/**
	 * @param $type
	 * @param $name
	 * @return \GCWorld\FormBuilder\BaseElement
	 */
	public function addElement($type, $name)
	{
		$class = '\\GCWorld\\FormBuilder\\Elements'.$type;
		$obj = new $class($name);
		$this->formElements[$this->elementIndex] = $obj;
		$this->elementIndex++;
		return $obj;
	}

	public function render()
	{
		echo '<form action="'.$this->formUrl.'" method="'.$this->formMethod.'">';
		foreach($this->formElements as $element)
		{
			/** @var \GCWorld\FormBuilder\BaseElement $element */
			echo '<div class="form-group">';
			echo $element->render();
			echo '</div>';
		}
		echo '<div class="form-group"><input type="submit" class="btn btn-success" value="Submit"></div>';
		echo '</form>';
	}
}