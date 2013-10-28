<?php
class Demo_Mageday2013_Model_Mageploy_Action_Magazzini extends PugMoRe_Mageploy_Model_Action_Abstract
{
    const VERSION = '1';

    protected $_code = 'demo_mageday13_magazzini';
    protected $_blankableParams = array('key', 'form_key');

    protected function _getVersion() {
        return Mage::helper('pugmore_mageploy')->getVersion(2).'.'.self::VERSION;
    }

}