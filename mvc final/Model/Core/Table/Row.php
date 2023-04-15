<?php
class Model_Core_Table_Row
{
	protected $tableName = null;
	protected $primaryKey = null;
	protected $tableClass = 'Model_Core_Table';
	protected $tableObject = null;
	protected $table = null;
	protected $data = [];

	public function __construct()
	{
		// code...
	}

	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function __get($key)
	{
		if (!array_key_exists($key, $this->data)) 
		{
			return null;
		}
		return $this->data[$key];
	}

	public function __unset($key)
	{
		if (!array_key_exists($key, $this->data)) {
			return $this;
		}
		unset ($this->data[$key]);
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function setTableClass($tableClass)
	{
		$this->tableClass = $tableClass;
		return $this;
	}

	public function getTableName()
	{
		if ($this->tableName) 
		{
			return $this->tableName;
		}
		$this->setTableName($tableName);
		return $tableName;	
	}

	public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getPrimaryKey()
	{
		if ($this->primaryKey) 
		{
			return $this->primaryKey;
		}
		$this->getTableObject()->getPrimaryKey();
		return $primaryKey;
	}

	public function setTable($table)
	{
		$this->table = $table;
		return $this;
	}

	public function getTable()
	{
		$tableClass = $this->tableClass;
		if ($this->table!=null) 
		{
			return $this->table;
		}
		$model = new $tableClass();
		$this->setTable($model);
		return $model;
	}

	public function setData($data)
	{
		$this->data = $data;
		return $this;
	}

	public function getData($key=null)
	{
		if ($key == null) 
		{
			return $this->data;
		}

		if (!array_key_exists($key, $this->data)) {
			return null;
		}
		return $this->data[$key];
	}

	public function addData($key, $value)
	{
		$this->data[$key] = $value;
		return $this;	
	}

	public function removeData($key = null)
	{
		if ($key == null) 
		{
			$this->data = [];
		}
		if (!array_key_exists($key, $this->data)) {
			return $this;
		}
		unset ($this->data[$key]);
	}

	public function getTableObject()
	{
		if ($this->tableObject) 
		{
			return $this->tableObject;
		}
		$tableObject = new ($this->tableClass)();
		$this->setTableObject($tableObject);
		return $tableObject;
	}

	protected function setTableObject($tableObject)
	{
		$this->tableObject = $tableObject;
		return $this;
	}

	public function save()
	{
		if (!array_key_exists($this->getPrimaryKey(), $this->data)) 
		{
			$insert = $this->getTableObject()->insert($this->data);
			if ($insert) 
			{

				$this->load($insert);
				return $this->data[$this->getPrimaryKey()] = $insert;
			}
			return null;
		}
		else
		{
			$id = $this->data[$this->getPrimaryKey()];
			if (!$id) 
			{
				throw new Exception("id not found", 1);
				
			}
			$update = $this->getTableObject()->update($this->data,$id);
			if ($update) 
			{
				$this->load($id);
				return$this;
			}
			return null;
		}
	}

	public function fetchAll($query)
	{
		$result = $this->getTableObject()->fetchAll($query);
		if (!$result) 
		{
			return false;
		}
		foreach ($result as &$row) {
			$row = (new $this)->setData($row)->setTable($this->getTable());
		}
		return $result;
	}

	public function fetchRow($query)
	{
		$result = $this->getTableObject()->fetchRow($query);
		if ($result) 
		{
			 $this->data = $result;
			 return $this;
		}
		return false;	
	}

	public function delete()
	{
		$id = $this->getData($this->getPrimaryKey());
		if (!$id) 
		{
			return false;
		}
		$model = $this->getTable()->delete($id);
		return true;
	}

	public function load($id, $column=null)
	{
		if (!$column) 
		{
			$column = $this->getPrimaryKey();
		}
		$query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$column}` = '{$id}'";
		$table = new Model_Core_Table();
		$result = $table->fetchRow($query);
		if ($result) {
			 $this->data = $result;
		}
		return $this;
	}
}
?>