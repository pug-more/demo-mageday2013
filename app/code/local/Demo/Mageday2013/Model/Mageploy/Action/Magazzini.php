<?php
class Demo_Mageday2013_Model_Mageploy_Action_Magazzini extends PugMoRe_Mageploy_Model_Action_Abstract
{
    const VERSION = '1';

    protected $_code = 'demo_mageday13_magazzini';
    protected $_blankableParams = array('key', 'form_key');

    protected function _getVersion()
    {
        return Mage::helper('pugmore_mageploy')->getVersion(2) . '.' . self::VERSION;
    }

    public function match()
    {
        if (!$this->_request) {
            return false;
        }

        if ($this->_request->getModuleName() == 'demmag2013') {
            if ($this->_request->getControllerName() == 'adminhtml_magazzini') {
                if (in_array($this->_request->getActionName(), array('save', 'delete'))) {
                    return true;
                }
            }
        }

        return false;
    }

    public function encode()
    {
        $result = parent::encode();

        if ($this->_request) {
            $params = $this->_request->getParams();

            $new = 'new';
            $actionName = $this->_request->getActionName();

            // Convert ID
            $code = $params['codice'];
            if (isset($params['id'])) {
                $new = 'existing';
                $params['id'] = $code;
            }

            foreach ($this->_blankableParams as $key) {
                if (isset($params[$key])) {
                    unset($params[$key]);
                }
            }

            $result[self::INDEX_EXECUTOR_CLASS] = get_class($this);
            $result[self::INDEX_CONTROLLER_MODULE] = $this->_request->getControllerModule();
            $result[self::INDEX_CONTROLLER_NAME] = $this->_request->getControllerName();
            $result[self::INDEX_ACTION_NAME] = $this->_request->getActionName();
            $result[self::INDEX_ACTION_PARAMS] = $this->_encodeParams($params);
            $result[self::INDEX_ACTION_DESCR] = sprintf("%s %s Magazzino '%s'", ucfirst($actionName), $new, $code);
            $result[self::INDEX_VERSION] = $this->_getVersion();
        }

        return $result;
    }

    public function decode($encodedParameters, $version) {
        // The !empty() ensures that rows without a version number can be
        // executed (not without any risk).
        if (!empty($version) && $this->_getVersion() != $version) {
            throw new Exception(sprintf("Can't decode the Action encoded with %s Tracker v %s; current Magazzini Tracker is v %s ", $this->_code, $version, $this->_getVersion()));
        }

        $parameters = $this->_decodeParams($encodedParameters);

        // Convert Magazzino UUID
        if (isset($parameters['id'])) {
            $code = $parameters['id'];
            $magazzino = Mage::getModel('demmag2013/magazzini')->load($code, 'codice');
            if ($magazzino->getId()) {
                $parameters['id'] = $magazzino->getId();
            }
        }

        $request = new Mage_Core_Controller_Request_Http();
        $request->setPost($parameters);
        $_SERVER['REQUEST_METHOD'] = 'POST'; // checked by StoreController
        $request->setQuery($parameters);
        return $request;
    }

}