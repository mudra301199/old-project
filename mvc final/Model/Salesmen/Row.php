<?php 

class Model_Salesmen_Row extends Model_Core_Table_Row
{
    function __construct()
    {
        $this->setTableName('salesman');
        $this->setPrimaryKey('salesman_id');
        $this->setTableClass('Model_Salesmen');
    }
}
?>