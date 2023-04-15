<?php

class Controller_Salesman_Price extends Model_Core_Action
{
	protected $prices=[];

	public function setSalesmen($salesmen)
	{
		$this->salesmen=$salesmen;
		return $this;
	}

	public function getSalesmen()
	{
		return $this->salesmen;
	}

	public function setPrices($prices)
	{
		$this->prices=$prices;
		return $this;
	}

	public function getPrices()
	{
		return $this->prices;
	}

	public function gridAction()
	{
		$price=new Model_Salesmen_Price();
		$query = "SELECT * FROM `salesman`";
		$salesmen=new Model_Salesmen();
		$data['created_at'] = date("Y-m-d h:i:s");
		$salesman = $salesmen->fetchAll();
		$request = $this->getRequest($data);
		$this->setSalesmen($salesman);
		$pricequery="SELECT SP.*,P.`product_id`, P.`sku`, P.`cost`, P.`price`  FROM `product` AS  P LEFT JOIN `salesmanPrice` AS SP
			ON P.product_id = SP.product_id AND SP.salesman_id
		    GROUP BY P.product_id";
		$salesman_price=$price->fetchAll($pricequery);
		$this->setPrices($salesman_price);
		$this->getTemplate('salesman_price/salesman_price-grid.php');
	}

	public function deleteAction()
	{
		$request = $this->getRequest();
		$price = new Model_Salesmen_Price();
		$id = $request->getParams('id');
		$query = "DELETE FROM `salesmanPrice` WHERE `product_id`= {$id}";
		$result=$price->delete($id);
		$this->getTemplate('salesman_price/salesman_price-grid.php');
	}
}


?>