<?php 

class Model_Vendor_Row extends Model_Core_Table_Row
{
    function __construct()
    {
        $this->setTableName('vendor');
        $this->setPrimaryKey('vendor_id');
        $this->setTableClass('Model_Vendor');
    }
}
?>