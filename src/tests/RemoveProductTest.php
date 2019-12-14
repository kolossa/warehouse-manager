<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use webdream\Warehouse\Management\Warehouse\WarehouseManagerService;
use webdream\Warehouse\Management\Warehouse\FindWarehouseByAddress;
use webdream\Warehouse\Management\Warehouse\ProductNotFoundException;

final class RemoveProductsTest extends TestCase
{	
	private $warehouses=[];
	private $warehouseManagerService;
	private $productFixtureCreator;
	
	protected function setUp() : void
    {
        $warehouseCreator=new tests\WarehouseFixtureCreator();
		
		$warehouse1=$warehouseCreator->createWareHouse1();
		$this->warehouses[$warehouse1->getId()]=$warehouse1;
		
		$warehouse2=$warehouseCreator->createWareHouse2();
		$this->warehouses[$warehouse2->getId()]=$warehouse2;
		
		
		$this->productFixtureCreator=new tests\ProductFixtureCreator();
		
		$this->warehouseManagerService=new WarehouseManagerService($this->warehouses, new FindWarehouseByAddress($this->warehouses));
    }
	
    /**
	 * @test
	 */
	public function removeFromStock(): void
    {
		$warehouse=$this->warehouses[1];
		
		$flour=$this->productFixtureCreator->createFlourX();
		
		$this->warehouseManagerService->addProduct($flour, $warehouse);
		$this->warehouseManagerService->removeProduct($flour, $warehouse);
		
		$this->assertFalse($warehouse->isStockContains($flour));
    }
	
    /**
	 * @test
	 */
	public function removeFromAnotherWarehouse(): void
    {
		$warehouse1=$this->warehouses[1];
		$warehouse2=$this->warehouses[2];
		
		$flour=$this->productFixtureCreator->createFlourX();
		
		$orange=$this->productFixtureCreator->createOrange();
		
		$this->warehouseManagerService->addProduct($flour, $warehouse1);
		$this->warehouseManagerService->addProduct($orange, $warehouse2);
		
		$this->warehouseManagerService->removeProduct($flour, $warehouse2);
		$this->warehouseManagerService->removeProduct($orange, $warehouse1);
		
		$this->assertFalse($warehouse1->isStockContains($flour));
		$this->assertFalse($warehouse2->isStockContains($orange));
    }
	
    /**
	 * @test
	 */
	public function cantRemove(): void
    {
		$this->expectException(ProductNotFoundException::class);
		
		$warehouse=$this->warehouses[1];
		
		$flour=$this->productFixtureCreator->createFlourX();
		
		$this->warehouseManagerService->removeProduct($flour, $warehouse);
		
    }
	
	/**
	 * @test
	 */
	public function removeMoreProductsFromSeveralWarehouses():void
	{
		$warehouse1=$this->warehouses[1];
		$warehouse1->setCapacity(2);
		$warehouse2=$this->warehouses[2];
		
		$flour1=$this->productFixtureCreator->createFlourX();
		
		$flour2=$this->productFixtureCreator->createFlourY();
		
		$flour3=$this->productFixtureCreator->createFlourZ();
		
		$this->warehouseManagerService->addProduct($flour1, $warehouse1);
		$this->warehouseManagerService->addProduct($flour2, $warehouse1);
		$this->warehouseManagerService->addProduct($flour3, $warehouse2);
		
		$this->warehouseManagerService->removeProduct($flour1, $warehouse1);
		$this->warehouseManagerService->removeProduct($flour2, $warehouse1);
		$this->warehouseManagerService->removeProduct($flour3, $warehouse1);
		
		$this->assertFalse($warehouse1->isStockContains($flour1));
		$this->assertFalse($warehouse1->isStockContains($flour2));
		$this->assertFalse($warehouse2->isStockContains($flour3));
		
	}
	
	
}