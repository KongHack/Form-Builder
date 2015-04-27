<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

/**
 * Class Range
 * @package GCWorld\FormBuilder\Elements
 *
 * Note: Looks better with this bootstrap plugin: https://github.com/flatlogic/awesome-bootstrap-checkbox
 */
class Range extends BaseElement
{
	protected $elementClass = '';   //Used for modifiers like radio-primary
	protected $rangeMin     = 0;
	protected $rangeMax     = 5;
	protected $rangeNA      = false;
	protected $rangeNASide  = 'R';

	/**
	 * @param integer $min
	 * @param integer $max
	 * @return $this
	 */
	public function setRange($min, $max)
	{
		$this->rangeMin = intval($min);
		$this->rangeMax = intval($max);
		return $this;
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setNAValue($value)
	{
		$this->rangeNA = $value;
		return $this;
	}

	/**
	 * @return $this
	 */
	public function setNAOnLeft()
	{
		$this->rangeNASide = 'L';
		return $this;
	}


	/**
	 * @return string
	 */
	public function render()
	{
		if($this->rangeMax < $this->rangeMin)
		{
			return 'Infinite Loop Prevention.  Your max is less than your min';
		}

		$out = '';
		if(!empty($this->elementLabel))
		{
			$out .= '<label>'.$this->elementLabel.'</label><br>'."\n";
		}

		if($this->rangeNA !== false && $this->rangeNASide == 'L')
		{
			$id = (empty($this->elementID)?$this->elementName:$this->elementID).'_NA';
			$out .= '
			<div class="radio radio-inline">
                <input type="radio" id="'.$id.'" value="'.$this->rangeNA.'" name="'.$this->elementName.'" '.($this->rangeNA==$this->elementValue?'checked="checked"':'').'>
                <label for="'.$id.'"> N/A </label>
            </div>
			';
		}

		for($i=$this->rangeMin;$i<=$this->rangeMax;++$i)
		{
			$id = (empty($this->elementID)?$this->elementName:$this->elementID);
			$id .= '_'.$i;

			$out .= '
			<div class="radio radio-inline">
                <input type="radio" id="'.$id.'" value="'.$i.'" name="'.$this->elementName.'" '.($i==$this->elementValue?'checked="checked"':'').'>
                <label for="'.$id.'"> '.$i.' </label>
            </div>
			';
		}

		if($this->rangeNA !== false && $this->rangeNASide != 'L')
		{
			$id = (empty($this->elementID)?$this->elementName:$this->elementID).'_NA';
			$out .= '
			<div class="radio radio-inline">
                <input type="radio" id="'.$id.'" value="'.$this->rangeNA.'" name="'.$this->elementName.'" '.($this->rangeNA==$this->elementValue?'checked="checked"':'').'>
                <label for="'.$id.'"> N/A </label>
            </div>
			';
		}

		return $out;
	}

}
