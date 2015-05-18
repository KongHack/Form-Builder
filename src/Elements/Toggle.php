<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

/**
 * Class Toggle
 * @package GCWorld\FormBuilder\Elements
 */
class Toggle extends BaseElement
{
	protected $elementClass = 'default';    // Uses partial class name
	protected $buttonSet    = array();

	/**
	 * @param $default
	 * @return $this
	 * @throws \Exception
	 */
	public function useDefault($default)
	{
		switch($default)
		{
			case 'y-n':
				$this->addButton(1,'Yes');
				$this->addButton(0,'No');
				break;
			case 'y-n-na':
				$this->addButton(1,'Yes');
				$this->addButton(0,'No');
				$this->addButton(-1,'N/A');
				break;
			case 'a-i':
				$this->addButton(1,'Active');
				$this->addButton(0,'Inactive');
				break;
			default:
				throw new \Exception('Invalid default value.');
				break;
		}


		return $this;
	}

	/**
	 * @param        $value
	 * @param        $caption
	 * @param string $class
	 * @return $this
	 */
	public function addButton($value, $caption, $class = 'default')
	{
		$this->buttonSet[] = array('value'=>$value,'caption'=>$caption,'class'=>$class);
		return $this;
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function render()
	{
		if(count($this->buttonSet) < 1)
		{
			throw new \Exception('No toggles defined');
		}


		$out = '<div class="btn-group" data-toggle="buttons">';

		foreach($this->buttonSet as $button)
		{
			$out .= '
			<label class="btn btn-'.$button['class'];
			if($this->elementValue == $button['value'])
			{
				$out .= ' active';
			}
			$out .= '">
			<input type="radio" name="'.$this->elementName.'" value="'.$button['value'].'"';
			if($this->elementValue == $button['value'])
			{
				$out .= ' checked="checked"';
			}
			$out .= '> '.$button['caption'].'</label>';

		}

		$out .= '</div>';
		return $out;
	}
}
