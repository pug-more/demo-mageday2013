<?php

class Demo_Mageday2013_Block_Adminhtml_Magazzini extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_controller = 'adminhtml_magazzini';
        $this->_blockGroup = 'demmag2013';
        $this->_headerText = Mage::helper('demmag2013')->__('Gestisci');
        parent::__construct();
    }

}