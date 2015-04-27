<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

/**
 * Class TextInput
 * @package GCWorld\FormBuilder\Elements
 */
class TextInput extends BaseElement
{
	/**
	 * @return string
	 */
	public function render()
	{
		$out = '';
		if(!empty($this->elementLabel))
		{
			$out .= '<label>'.$this->elementLabel.'</label>'."\n";
		}
		$out .= '<input type="text" name="'.$this->elementName.'" class="'.$this->elementClass.'"';
		if(!empty($this->elementID))
		{
			$out .= ' id="'.$this->elementID.'"';
		}
		if(!empty($this->elementPlaceholder))
		{
			$out .= ' placeholder="'.$this->elementPlaceholder.'"';
		}
		if(!empty($this->elementValue))
		{
			$out .= ' value="'.htmlentities($this->elementValue).'"';
		}
		$out .= '>';
		return $out;
	}
}
