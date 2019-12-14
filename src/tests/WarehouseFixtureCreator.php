<?php 

namespace tests;

use webdream\Warehouse\Management\Warehouse\WareHouseFactory;
use webdream\Warehouse\Management\Warehouse\Address;
use webdream\Warehouse\Management\Warehouse\Warehouse;

class WarehouseFixtureCreator
{
	
	private $warehouseFactory;
	
	/**
	 * @return WarehouseFactory
	 */
	public function getWarehouseFactory()
	{
		if($this->warehouseFactory==null){
			$this->warehouseFactory=new WarehouseFactory();
		}
		
		return $this->warehouseFactory;
	}
	
	public function createWareHouse1():Warehouse
	{
		$warehouse1=$this->getWarehouseFactory()->createWareHouse(1);
		$warehouse1->setCapacity(1);
		
		$address=new Address();
		$address->setCountry('Hungary');
		$address->setCountryISO31661Alpha3('HUN');
		$address->setCity('Budapest');
		$address->setAddress('Rétköz utca 10.');
		
		$warehouse1->setAddress($address);
		
		return $warehouse1;
	}
	
	public function createWareHouse2():Warehouse
	{
		$warehouse2=$this->getWarehouseFactory()->createWareHouse(2);
		$warehouse2->setCapacity(1);
		
		$address2=new Address();
		$address2->setCountry('Hungary');
		$address2->setCountryISO31661Alpha3('HUN');
		$address2->setCity('Győr');
		$address2->setAddress('Háromszék utca 10.');
		
		$warehouse2->setAddress($address2);
		
		return $warehouse2;
	}
}