<?php
class Demo_Mageday2013_Model_Mysql4_Magazzini extends Mage_Core_Model_Mysql4_Abstract
{

  #protected $_isPkAutoIncrement = false;
  
	protected function _construct()
    {
        $this->_init('demmag2013/magazzini', 'id');
    }

}

