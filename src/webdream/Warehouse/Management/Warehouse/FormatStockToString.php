<?php 

namespace webdream\Warehouse\Management\Warehouse;

class FormatStockToString implements IStockFormatter
{
	public function formatStock(array $stock) : string
	{
		$result='';
		
		foreach($stock as $product){
			
			$result.=PHP_EOL;
			$result.=$product->getName();
			$result.=PHP_EOL;
		}
		return $result;
	}
}