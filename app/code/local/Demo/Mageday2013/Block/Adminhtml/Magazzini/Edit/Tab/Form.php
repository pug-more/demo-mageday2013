<?php

class Demo_Mageday2013_Block_Adminhtml_Magazzini_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);

        $fieldsetBasic = $form->addFieldset('demmag2013_form_general', array('legend' => Mage::helper('demmag2013')->__('General')));

        $fieldsetBasic->addField('codice', 'text', array(
            'label' => Mage::helper('demmag2013')->__('Codice'),
            'required' => true,
            'class' => 'required-entry',
            'name' => 'codice',
        ));

        $fieldsetBasic->addField('nome', 'text', array(
            'name' => 'nome',
            'label' => Mage::helper('demmag2013')->__('Nome'),
            'class' => 'required-entry',
            'required' => true,
        ));

        $countries = Mage::getModel('adminhtml/system_config_source_country')
            ->toOptionArray();
        #unset($countries[0]);

        $fieldsetBasic->addField('nazione', 'select', array(
            'label' => Mage::helper('demmag2013')->__('Nazione'),
            'required' => true,
            'class' => 'required-entry',
            'name' => 'nazione',
            'values' => $countries,
        ));

        $fieldsetBasic->addField('citta', 'text', array(
            'label' => Mage::helper('demmag2013')->__('Città'),
            'required' => true,
            'class' => 'required-entry',
            'name' => 'citta',
        ));

        $fieldsetBasic->addField('cap', 'text', array(
            'label' => Mage::helper('demmag2013')->__('CAP'),
            'required' => true,
            'class' => 'required-entry',
            'name' => 'cap',
        ));

        $fieldsetBasic->addField('indirizzo', 'textarea', array(
            'label' => Mage::helper('demmag2013')->__('Indirizzo'),
            'name' => 'indirizzo',
        ));

        $fieldsetBasic->addField('email', 'text', array(
            'label' => Mage::helper('demmag2013')->__('Email'),
            'name' => 'email',
        ));

        if (Mage::getSingleton('adminhtml/session')->getCustomMenuData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getCustomMenuData());
            Mage::getSingleton('adminhtml/session')->setCustomMenuData(null);
        } elseif (Mage::registry('demmag2013_data')) {
            $form->setValues(Mage::registry('demmag2013_data')->getData());
        }

        return parent::_prepareForm();
    }

}