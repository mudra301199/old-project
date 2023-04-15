<?php  

class Model_Payment_Row extends Model_Core_Table_Row
{
    function __construct()
    {
        $this->setTableName('payment');
        $this->setPrimaryKey('payment_id');
        $this->setTableClass('Model_Payment');
    }
}
?>