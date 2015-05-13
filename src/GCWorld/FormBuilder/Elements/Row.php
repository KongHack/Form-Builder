<?php
namespace GCWorld\FormBuilder\Elements;

use GCWorld\FormBuilder\BaseElement;
use GCWorld\FormBuilder\FormController;

class Row extends BaseElement
{
	private $config     = null;
	private $containers = array();

	/**
	 * @param string $config
	 * @return $this
	 * @throws \Exception
	 */
	public function setConfig($config)
	{
		$this->config = explode('/',$config);

		$total = 0;
		foreach($this->config as $c)
		{
			$total += intval($c);
		}
		if($total != 12)
		{
			throw new \Exception('Config must contain 12 columns in total');
		}
		return $this;
	}

	/**
	 * @param integer $index
	 * @return \GCWorld\FormBuilder\FormController
	 * @throws \Exception
	 */
	public function getContainer($index)
	{
		if(!isset($this->containers[$index]))
		{
			if(!isset($this->config[$index]))
			{
				throw new \Exception('Config not defined for the container you are attempting to get');
			}
			$form = new FormController();
			$form->setContainer();
			$this->containers[$index] = $form;
		}
		return $this->containers[$index];
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function render()
	{
		$out = '<div class="row">';
		foreach($this->config as $index => $cols)
		{
			$out .= '<div class="col-sm-'.$cols.'">';
			$out .= $this->getContainer($index)->render();
			$out .= '</div>';
		}
		$out .= '</div>';
		return $out;
	}
}
