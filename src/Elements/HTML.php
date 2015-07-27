<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;

class HTML extends BaseElement
{
    private $html = '';

    /**
     * @param $html
     * @return $this
     */
    public function setHTML($html)
    {
        $this->html = $html;
        return $this;
    }

    public function render()
    {
        return $this->html;
    }
}
