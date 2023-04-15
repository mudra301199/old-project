<?php

class Model_Core_Url
{
	public function getCurrentUrl()
	{
  		 return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	public function getUrl($a=null, $c= null, array $params=null, $resetParams=false)
	{
		$request= new Model_Core_Request();

		$final= $request->getParams();

		$requireParam = [];

		$CurrentUrl = explode('?', $this->getCurrentUrl());

		if($resetParams)
		{
			$final=[];
		}

		if($c==null)
		{
			$reqireParam['c']=$request->getControllerName();
		}
		else
		{
			$requireParam['c']=$c;
		}

		if($a==null)
		{
			$requireParam['a']=$request->getAction();
		}
		else
		{
			$requireParam['a']=$a;
		}

		$final=array_merge($final,$requireParam);

		if($params)
		{
			$final = array_merge($final, $params);
		}

		$url = $CurrentUrl[0].'?'.http_build_query($final);
		return $url;
	}
	

}
?>