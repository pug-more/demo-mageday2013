<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('demmag2013/magazzini'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id')
    ->addColumn('codice', Varien_Db_Ddl_Table::TYPE_TEXT, 25, array(
        'unsigned'  => true,
        'unique'    => true,
    ))
    ->addColumn('nome', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
    ))
    ->addColumn('nazione', Varien_Db_Ddl_Table::TYPE_TEXT, 2, array(
        'nullable'  => false,
    ))
    ->addColumn('citta', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
    ))
    ->addColumn('cap', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
    ))
    ->addColumn('indirizzo', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
    ))
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
    ), 'Created At')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
    ), 'Updated At')
    ->addIndex(
        $installer->getIdxName(
            $installer->getTable('demmag2013/magazzini'),
            array('codice'),
            Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
        ),
        array('codice'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE))
    ->setComment('Magazzini per Demo');
$installer->getConnection()->createTable($table);

$installer->endSetup();
