<?php 

namespace webdream\Warehouse\Management\Warehouse;

use webdream\Warehouse\Management\Product\AbstractProduct;

class WarehouseManagerService
{
	/**
	 * @var IOrderWarehouses[] $warehouses
	 */
	private $finder;
	
	/**
	 * @var Warehouse[] $warehouses
	 */
	private $warehouses;
	
	public function __construct(array $warehouses, IFindWarehouses $finder)
	{
		$this->warehouses=$warehouses;
		$this->finder=$finder;
	}
	
	public function addProduct(AbstractProduct $product, Warehouse $warehouse) :Warehouse
	{
		try{
			$warehouse->addToStock($product);
			return $warehouse;
		}catch(WarehouseIsFullException $e){
			
			$otherWarehouses=$this->finder->findWarehouses($this->warehouses, $warehouse);
			foreach($otherWarehouses as $otherWarehouse){
				try{
					$otherWarehouse->addToStock($product);
					return $otherWarehouse;
				}catch(WarehouseIsFullException $e){
					
				}
			}
		}
		
		throw new WarehouseIsFullException();
	}
	
	public function removeProduct(AbstractProduct $product, Warehouse $warehouse) :Warehouse
	{
		try{
			$warehouse->removeFromStock($product);
			return $warehouse;
		}catch(ProductNotFoundException $e){
			
			$otherWarehouses=$this->finder->findWarehouses($this->warehouses, $warehouse);
			
			foreach($otherWarehouses as $otherWarehouse){
				
				try{
					$otherWarehouse->removeFromStock($product);
					return $otherWarehouse;
				}catch(ProductNotFoundException $e){
					
				}
			}
		}
		
		throw new ProductNotFoundException();
	}
}