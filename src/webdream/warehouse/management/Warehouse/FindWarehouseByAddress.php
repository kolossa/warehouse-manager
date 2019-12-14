<?php 

namespace webdream\Warehouse\Management\Warehouse;

class FindWarehouseByAddress implements IFindWarehouses
{
	
	public function findWarehouses(array $warehouses, Warehouse $warehouse) : array
	{
		$result=[];
		$ordered=[];
		foreach($warehouses as $otherWarehouse){
			
			if($otherWarehouse->getId()==$warehouse->getId()){
				continue;
			}
			
			$points=0;
			
			if($otherWarehouse->getAddress()->getCountryISO31661Alpha3()==$warehouse->getAddress()->getCountryISO31661Alpha3()){
				$points++;
				
				if($otherWarehouse->getAddress()->getCity()==$warehouse->getAddress()->getCity()){
					$points++;
					
					if($otherWarehouse->getAddress()->getAddress()==$warehouse->getAddress()->getAddress()){
						$points++;
					}
				}
				
			}
			
			$ordered[$points][]=$otherWarehouse;
		}
		
		rsort($ordered);
		
		foreach($ordered as $orderedWarehouses){
			
			foreach($orderedWarehouses as $orderedWarehouse){
				$result[]=$orderedWarehouse;
			}
		}
		
		return $result;
	}
}