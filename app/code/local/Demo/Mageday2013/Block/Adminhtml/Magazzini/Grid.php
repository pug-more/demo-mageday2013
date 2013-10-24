<?php

class Demo_Mageday2013_Block_Adminhtml_Magazzini_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('MagazziniGrid');
		$this->setDefaultSort('magazzino_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}

	protected function _prepareCollection()
	{
		//$model = Mage::getModel('demmag2013/magazzini');
		//$collection = $model->getCollection();
		$collection = Mage::getResourceModel('demmag2013/magazzini_collection');
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		$this->addColumn('id', array(
			'header' => Mage::helper('demmag2013')->__('ID'),
			'align' =>'left',
			'width' => '1px',
			'index' => 'id',
		));

        $this->addColumn('codice', array(
            'header' => Mage::helper('demmag2013')->__('Codice'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'codice',
        ));

        $this->addColumn('nome', array(
            'header' => Mage::helper('demmag2013')->__('Nome'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'nome',
        ));

		$this->addColumn('nazione', array(
			'header' => Mage::helper('demmag2013')->__('Nazione'),
			'align' =>'left',
			'width' => '50px',
			'index' => 'nazione',
			'type' => 'country',
		));

        $this->addColumn('citta', array(
            'header' => Mage::helper('demmag2013')->__('Città'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'citta',
        ));

        $this->addColumn('cap', array(
            'header' => Mage::helper('demmag2013')->__('CAP'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'cap',
        ));

        $this->addColumn('indirizzo', array(
            'header' => Mage::helper('demmag2013')->__('Indirizzo'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'indirizzo',
        ));

        $this->addColumn('email', array(
			'header' => Mage::helper('demmag2013')->__('Email'),
			'align' =>'left',
			'width' => '50px',
			'index' => 'email',
		));

		return parent::_prepareColumns();
	}

	public function getRowUrl($row)
	{
		//azione al click sulla riga
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}


}