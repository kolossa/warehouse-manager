<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use webdream\Warehouse\Management\Warehouse\WarehouseManagerService;
use webdream\Warehouse\Management\Warehouse\FindWarehouseByAddress;
use webdream\Warehouse\Management\Warehouse\WarehouseIsFullException;

final class AddProductsTest extends TestCase
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
	public function addToStock(): void
    {
		$warehouse=$this->warehouses[1];
		
		$flour=$this->productFixtureCreator->createFlourX();
		
		$this->warehouseManagerService->addProduct($flour, $warehouse);
		
		$this->assertTrue($warehouse->isStockContains($flour));
    }
	
    /**
	 * @test
	 */
	public function addToAnotherWarehouse(): void
    {
		$warehouse=$this->warehouses[1];
		
		$flour=$this->productFixtureCreator->createFlourX();
		
		$orange=$this->productFixtureCreator->createOrange();
		
		$this->warehouseManagerService->addProduct($flour, $warehouse);
		$this->warehouseManagerService->addProduct($orange, $warehouse);
		
		$otherWarehouse=$this->warehouses[2];
		
		$this->assertTrue($warehouse->isStockContains($flour));
		$this->assertTrue($otherWarehouse->isStockContains($orange));
    }
	
    /**
	 * @test
	 */
	public function fullCapacity(): void
    {
		$this->expectException(WarehouseIsFullException::class);
		
		$warehouse=$this->warehouses[1];
		
		$flour=$this->productFixtureCreator->createFlourX();
		
		$orange=$this->productFixtureCreator->createOrange();
		$orange2=$this->productFixtureCreator->createOrange2();
		
		$this->warehouseManagerService->addProduct($flour, $warehouse);
		$this->warehouseManagerService->addProduct($orange, $warehouse);
		$this->warehouseManagerService->addProduct($orange2, $warehouse);
		
		
    }
	
	
}