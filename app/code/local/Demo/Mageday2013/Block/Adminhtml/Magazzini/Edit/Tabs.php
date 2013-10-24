<?php

class Demo_Mageday2013_Block_Adminhtml_Magazzini_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('demmag2013_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('demmag2013')->__('Menu Item'));
	}

	protected function _beforeToHtml()
	{
		$this->addTab('form_section', array(
			'label' => Mage::helper('demmag2013')->__('Magazzino'),
			'title' => Mage::helper('demmag2013')->__('Magazzino'),
			'content' => $this->getLayout()->createBlock('demmag2013/adminhtml_magazzini_edit_tab_form')->toHtml(),
		));

		return parent::_beforeToHtml();
	}

}