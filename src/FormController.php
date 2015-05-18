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
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\Checkbox
	 */
	public function addCheckbox($name)
	{
		return $this->addElement('Checkbox',$name);
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\CKEditor
	 */
	public function addCKEditor($name)
	{
		return $this->addElement('CKEditor',$name);
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\DateTime
	 */
	public function addDateTime($name)
	{
		return $this->addElement('DateTime',$name);
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\Password
	 */
	public function addPassword($name)
	{
		return $this->addElement('Password',$name);
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\Range
	 */
	public function addRange($name)
	{
		return $this->addElement('Range',$name);
	}

	/**
	 * @param $name
	 * @return \GCWorld\FormBuilder\Elements\Toggle
	 */
	public function addToggle($name)
	{
		return $this->addElement('Toggle',$name);
	}

	/**
	 * @param $config
	 * @return \GCWorld\FormBuilder\Elements\Row
	 */
	public function addRow($config)
	{
		$row = $this->addElement('Row','rows_do_not_have_names');
		/** @var \GCWorld\FormBuilder\Elements\Row $row */
		$row->setConfig($config);
		return $row;
	}

	/**
	 * @param $html
	 * @return \GCWorld\FormBuilder\Elements\HTML
	 */
	public function addHTML($html)
	{
		$row = $this->addElement('HTML','html_does_not_have_names');
		/** @var \GCWorld\FormBuilder\Elements\HTML $row */
		$row->setHTML($html);
		return $row;
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
