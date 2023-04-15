<?php

class Model_Shipping_Row extends Model_Core_Table_Row
{
    function __construct()
    {
        $this->setTableName('shipping');
        $this->setPrimaryKey('shipping_id');
        $this->setTableClass('Model_Shipping');
    }
}
?>