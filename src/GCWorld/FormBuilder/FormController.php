<?php
namespace GCWorld\FormBuilder;

class FormController
{
	protected $formElements = array();
	protected $elementIndex = 0;
	protected $formUrl      = null;
	protected $formMethod   = null;
	protected $isContainer  = false;
	public    $formEncType  = 'multipart/form-data';

	/**
	 * @param null   $url
	 * @param string $method
	 */
	public function __construct($url = null, $method = 'POST')
	{
		$this->formUrl    = $url;
		$this->formMethod = $method;
	}

	/**
	 * Sets this form as a container, omitting the form wrapper and submit button
	 */
	public function setContainer()
	{
		$this->isContainer = true;
	}

	/**
	 * @param $type
	 * @param $name
	 * @return \GCWorld\FormBuilder\BaseElement
	 */
	public function addElement($type, $name)
	{
		$class = '\\GCWorld\\FormBuilder\\Elements\\'.$type;
		$obj = new $class($name);
		$this->formElements[$this->elementIndex] = $obj;
		$this->elementIndex++;
		return $obj;
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\TextInput
	 */
	public function addTextInput($name)
	{
		return $this->addElement('TextInput',$name);
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\Textarea
	 */
	public function addTextarea($name)
	{
		return $this->addElement('Textarea',$name);
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\Select
	 */
	public function addSelect($name)
	{
		return $this->addElement('Select',$name);
	}

	/**
	 * @return string
	 */
	public function render()
	{
		$out = '';
		if(!$this->isContainer)
		{
			$out .= '<form action="'.$this->formUrl.'" method="'.$this->formMethod.'">';
		}
		foreach($this->formElements as $element)
		{
			/** @var \GCWorld\FormBuilder\BaseElement $element */
			$out .= '<div class="form-group">';
			$out .= $element->render();
			$out .= '</div>';
		}
		if(!$this->isContainer)
		{
			$out .= '<div class="form-group"><input type="submit" class="btn btn-success" value="Submit"></div>';
			$out .= '</form>';
		}
		return $out;
	}
}
