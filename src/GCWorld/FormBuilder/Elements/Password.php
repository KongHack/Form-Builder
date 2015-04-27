<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

/**
 * Class Password
 * @package GCWorld\FormBuilder\Elements
 *
 * NOTE: Built using this plugin: https://github.com/ablanco/jquery.pwstrength.bootstrap
 */
class Password extends BaseElement
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
		$out .= '<input type="password" name="'.$this->elementName.'" class="'.$this->elementClass.'"';
		if(empty($this->elementID))
		{
			$this->elementID = $this->elementName.'_'.time();
		}
		$out .= ' id="'.$this->elementID.'"';
		if(!empty($this->elementPlaceholder))
		{
			$out .= ' placeholder="'.$this->elementPlaceholder.'"';
		}
		if(!empty($this->elementValue))
		{
			$out .= ' value="'.htmlentities($this->elementValue).'"';
		}
		$out .= '>';

		$out .= '
		<script type="text/javascript">
			$(function(){
				$("#'.$this->elementID.'").pwstrength();
			});
		</script>
		';

		return $out;
	}
}
