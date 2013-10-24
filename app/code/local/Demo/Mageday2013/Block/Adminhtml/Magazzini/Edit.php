<?php
class Demo_Mageday2013_Block_Adminhtml_Magazzini_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();
		$this->_objectId = 'id';
		$this->_blockGroup = 'demmag2013';
		$this->_controller = 'adminhtml_magazzini';
		$this->_updateButton('save', 'label', Mage::helper('demmag2013')->__('Salva'));
		$this->_updateButton('delete', 'label', Mage::helper('demmag2013')->__('Cancella'));
	}
	
	public function getHeaderText()
	{
		if( Mage::registry('demmag2013_data') && Mage::registry('demmag2013_data')->getId())
		{
			return Mage::helper('demmag2013')->__("Modifica Elemento");
		} 
		else 
		{
			return Mage::helper('demmag2013')->__('Aggiungi Elemento');
		}
	}
	
}
