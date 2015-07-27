<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

class Select extends BaseElement
{
    protected $options  = array();
    protected $select2  = true;
    protected $multiple = false;

    /**
     * @param array $options
     * @return $this
     */
    public function addOptionsArray(array $options)
    {
        foreach ($options as $k => $v) {
        $this->options[$k] = $v;
        }
        return $this;
    }

    /**
     * @param $value
     * @param $text
     * @return $this
     */
    public function addOption($value, $text)
    {
        $this->options[$value] = $text;
        return $this;
    }

    /**
     * @param bool $multiple
     * @return $this
     */
    public function setMultiple($multiple = true)
    {
        $this->multiple = $multiple;
        if (substr($this->elementName, -2)!='[]') {
            $this->elementName = $this->elementName.'[]';
        }
        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $out = '';
        if (!empty($this->elementLabel)) {
            $out .= '<label>'.$this->elementLabel.'</label>'."\n";
        }
        $out .=  '<select name="'.$this->elementName.'"';
        if ($this->select2) {
            $this->elementClass .= ' select2-basic';
        }
        $out .= ' class="'.$this->elementClass.'"';
        if (!empty($this->elementID)) {
            $out .= ' id="'.$this->elementID.'"';
        }
        if ($this->multiple) {
            $out .= ' multiple';
        }
        $out .= '>';

        $sel = $this->elementValue;
        if (!is_array($sel)) {
            $sel = array($sel);
        }

        foreach ($this->options as $k => $v) {
            $out .= '<option value="'.$k.'"'.(in_array($k, $sel)?' selected':'').'>'.$v.'</option>';
        }


        $out .= '</select>';

        return $out;
    }
}
