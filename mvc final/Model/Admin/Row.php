<?php

class Model_Admin_Row extends Model_Core_Table_Row
{
	function __construct()
    {
      parent::__construct();
      $this->setTableName('admin')->setPrimaryKey('admin_id');
      $this->setTableClass('Model_Admin');
    }	

  public function getStatus()
  {
    if ($this->status) 
    {
      return $this->status;
    }
    return Model_Admin::STATUS_DEFAULT;
  }

  public function getStatusText()
  {
    $statuses = $this->getTable()->getStatusOptions();
    if (array_key_exists($this->status, $statuses)) 
    {
      return $statuses[$this->status];
    }
    return $statuses[Model_Admin::STATUS_DEFAULT];
  }
}

?>