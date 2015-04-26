<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

class Textarea extends BaseElement
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
		$out .= '<textarea name="'.$this->elementName.'" class="'.$this->elementClass.'"';
		if(!empty($this->elementID))
		{
			$out .= ' id="'.$this->elementID.'"';
		}
		if(!empty($this->elementPlaceholder))
		{
			$out .= ' placeholder="'.$this->elementPlaceholder.'"';
		}
		$out .= '>';
		if(!empty($this->elementValue))
		{
			$out .= $this->elementValue;
		}
		$out .= '</textarea>';
		return $out;
	}
}
