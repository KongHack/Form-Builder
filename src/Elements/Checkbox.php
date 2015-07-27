<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

/**
 * Class Checkbox
 * @package GCWorld\FormBuilder\Elements
 *
 * Note: Looks better with this bootstrap plugin: https://github.com/flatlogic/awesome-bootstrap-checkbox
 */
class Checkbox extends BaseElement
{
    protected $elementClass = 'checkbox';
    protected $checkState   = false;
    /**
     * @return string
     */
    public function render()
    {

        $out = '<div class="'.$this->elementClass.'"><label>';
        $out .= '<input type="checkbox" name="'.$this->elementName.'"';
        if (!empty($this->elementID)) {
        $out .= ' id="'.$this->elementID.'"';
        }

        if (empty($this->elementValue)) {
        $out .= ' value="1"';
        } else {
            $out .= ' value="'.$this->elementValue.'"';
        }

        if ($this->checkState) {
            $out .= ' checked="checked"';
        }
        $out .= '></label></div>';
        return $out;
    }

    /**
     * @param $state
     * @return $this
     */
    public function setCheckState($state)
    {
        $this->checkState = $state;
        return $this;
    }
}
