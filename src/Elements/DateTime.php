<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

/**
 * Note: Best used with: http://eonasdan.github.io/bootstrap-datetimepicker/
 *
 * Class DateTime
 * @package GCWorld\FormBuilder\Elements
 */
class DateTime extends BaseElement
{
	protected $format = 'MM/DD/YYYYY';

	public function setFormat($format)
	{
		$this->format = $format;
	}

	public function render()
	{
		if(empty($this->elementID))
		{
			$this->elementID = 'date_time_'.time().'_'.mt_rand(0,99999);
		}

		$out = '';
		if(!empty($this->elementLabel))
		{
			$out .= '<label>'.$this->elementLabel.'</label>'."\n";
		}
		$out .= '<input type="text" name="'.$this->elementName.'" class="'.$this->elementClass.'" id="'.$this->elementID.'"';
		if(!empty($this->elementPlaceholder))
		{
			$out .= ' placeholder="'.$this->elementPlaceholder.'"';
		}
		if(!empty($this->elementValue))
		{
			if(is_numeric($this->elementValue))
			{
				$this->elementValue = date('Y-m-d H:i:s',$this->elementValue);
			}

			$out .= ' value="'.$this->elementValue.'"';
		}
		$out .= '>';

		$out .= '
		<script type="text/javascript">
			$(function(){
				$("#'.$this->elementID.'").datetimepicker({
                    format: "'.$this->format.'"
                });
			});
		</script>
		';


		return $out;
	}
}