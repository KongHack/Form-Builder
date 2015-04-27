<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

class CKEditor extends BaseElement
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
		if(empty($this->elementID))
		{
			$this->elementID = $this->elementName.'_'.time();
		}
		$out .= ' id="'.$this->elementID.'"';

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

		$out .= '
		<script type="text/javascript">
			CKEDITOR.config.allowedContent = true;
			CKEDITOR.replace("'.$this->elementName.'");
		</script>
		';

		return $out;
	}
}
