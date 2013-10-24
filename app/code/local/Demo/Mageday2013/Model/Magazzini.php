<?php
class Demo_Mageday2013_Model_Magazzini extends Mage_Core_Model_Abstract
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function _construct()
    {
        $this->_init('demmag2013/magazzini');
    }

    public function validate()
    {
        $errors = array();
        #TODO implementare un controllo di errori
        return $errors;
    }

    protected function _beforeSave()
    {
        if ($this->isObjectNew() && null === $this->getCreatedAt()) {
            $this->setCreatedAt(Varien_Date::now());
        } else {
            $this->setUpdatedAt(Varien_Date::now());
        }

        parent::_beforeSave();
        return $this;
    }

}