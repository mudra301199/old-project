<?php

class Model_Product_Row extends Model_Core_Table_Row
{
    function __construct()
    {
        $this->setTableName('product');
        $this->setPrimaryKey('product_id');
        $this->setTableClass('Model_Product');
    }
}
?>