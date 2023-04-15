<?php 

class Model_Core_Table
{
	public $adapter = null;
	public $tableName = null;
	public $primaryKey = null;

	protected function setAdapter(Model_Core_Adapter$adapter)
	{
		$this->adapter = $adapter;
		return $this;
	}

	public function getAdapter()
	{
		if ($this->adapter) 
		{
			return $this->adapter;			
		}
		$adapter = new Model_Core_Adapter();
		$this->setAdapter($adapter);
		return $adapter;
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName()
	{
		return $this->tableName;
	}

	public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}

	public function fetchAll($query = NULL)
	{
		if ($query == NULL) 
		{
			$query = "SELECT * FROM `{$this->getTableName()}` ORDER BY `{$this->getPrimaryKey()}` ASC";
		}
		$result = $this->getAdapter()->fetchAll($query);
		return $result;
	}

	public function fetchRow($query = NULL)
	{
		if ($query == NULL) 
		{
			$query = "SELECT * FROM `{$this->getTableName()}` WHERE ORDER BY `{$this->getPrimaryKey()}` ASC";
		}
		$result = $this->getAdapter()->fetchRow($query);
		return $result;
	}

	public function insert($data = [])
	{
		if(!$data)
		{
			throw new Exception("No data found.", 1);
		}
		$keys = "`".implode("`, `", array_keys($data))."`";
		$values = "'".implode("','", array_values($data))."'";
		$query = "INSERT INTO `{$this->getTableName()}` ({$keys}) VALUES ({$values})";
		$result = $this->getAdapter()->insert($query);
		return $result;
	}

	public function update($data, $condition)
	{
		if (!$data) 
		{
			throw new Exception("Data not found.", 1);
		}
		$final = [];
		foreach ($data as $key => $value) {
			$final[] = "`{$key}` = '{$value}'"; 
		}
		if (is_array($condition)) 
		{
			$where = [];
			foreach ($condition as $key => $value) 
			{
				$where[] = "`{$key}` = '{$value}'"; 
			}
			$whereString = implode(" AND ", $where);
		}
		else
		{
			$whereString = "`{$this->getPrimaryKey()}`= {$condition}";
		}

		$updateData = implode(",",$final);
		$query = "UPDATE `{$this->getTableName()}` SET {$updateData} WHERE {$whereString} ";
		$result = $this->getAdapter()->update($query);
		return $result;
	}

	public function delete($condition)
	{
		if (!$condition) 
		{
			throw new Exception("ENTER THE RECODE.", 1);
		}

		if (is_array($condition)) 
		{
			$where = [];
			foreach ($condition as $key => $value) 
			{
				$where[] = "`{$key}` = '{$value}'";
			}
			$whereString = implode(" AND ", $where);
		}
		else
		{
			$whereString = "`{$this->getPrimaryKey()}`={$condition}";
		}

		$query = "DELETE FROM `{$this->getTableName()}` WHERE $whereString";
		$result = $this->getAdapter()->Delete($query);
		return $result;
	}
	public function load($value, $column=null)
	{
		$column=(!$column) ? $this->getPrimaryKey() : $column;

		$query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$column}` = {$value}";
		
		$result = $this->getAdapter()->fetchRow($query);
		return $result;
	}
}

	

 ?>