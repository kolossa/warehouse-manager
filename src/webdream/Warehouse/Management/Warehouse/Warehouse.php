<?php 

namespace webdream\Warehouse\Management\Warehouse;

use webdream\Warehouse\Management\Entity;
use webdream\Warehouse\Management\Product\AbstractProduct;

class Warehouse extends Entity
{
	/**
	 * @var string $name;
	 */
	private $name;
	
	/**
	 * @var Address $address;
	 */
	private $address;
	
	/**
	 * @var int $capacity;
	 */
	private $capacity;
	
	/**
	 * @var AbstractProduct[] $stock;
	 */
	private $stock=array();
	
	public function getName() : string
	{
		return $this->name;
	}
	
	public function setName(string $value) : void
	{
		$this->name=$value;
	}
	
	public function getAddress() : Address
	{
		return $this->address;
	}
	
	public function setAddress(Address $value) : void
	{
		$this->address=$value;
	}
	
	public function getCapacity() : int
	{
		return $this->capacity;
	}
	
	public function setCapacity(int $value) : void
	{
		$this->capacity=$value;
	}
	
	/**
	 * @return AbstractProduct[]
	 */
	public function getStock() : array
	{
		return $this->stock;
	}
	
	/**
	 * @var AbstractProduct[] $value
	 */
	public function setStock(array $value) : void
	{
		if(count($value)<=$this->capacity){
			$this->stock=$value;
		}else{
			throw new WarehouseIsFullException();
		}
	}
	
	public function addToStock(AbstractProduct $product) : void
	{
		if(count($this->stock)<$this->capacity){
			$this->stock[]=$product;
		}else{
			throw new WarehouseIsFullException();
		}
	}
	
	public function removeFromStock(AbstractProduct $product) :void
	{
		$found=false;
		foreach($this->stock as $key=>$stockProduct){
			
			if($stockProduct->getItemNumber()==$product->getItemNumber()){
				unset($this->stock[$key]);
				$found=true;
				break;
			}
		}
		
		if(!$found){
			throw new ProductNotFoundException();
		}
	}
	
	public function isStockContains(AbstractProduct $product)
	{
		foreach($this->stock as $stockProduct){
			
			if($stockProduct->getId() == $product->getId()){
				return true;
			}
		}
		
		return false;
	}
}