<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use webdream\Warehouse\Management\Warehouse\WarehouseIsFullException;

final class CapacityTest extends TestCase
{	
	private $warehouse;
	private $productFixtureCreator;
	
	protected function setUp() : void
    {
        $warehouseCreator=new tests\WarehouseFixtureCreator();
		
		$this->warehouse=$warehouseCreator->createWareHouse1();
		$this->warehouse->setCapacity(1);
		
		$this->productFixtureCreator=new tests\ProductFixtureCreator();
		
		$flour=$this->productFixtureCreator->createFlourX();
		
		$this->warehouse->addToStock($flour);
		
    }
	
    /**
	 * @test
	 */
	public function capacityFull(): void
    {
		$this->expectException(WarehouseIsFullException::class);
        
		$orange=$this->productFixtureCreator->createOrange();
		
		$this->warehouse->addToStock($orange);
    }
	
    /**
	 * @test
	 */
	public function capacityFullWithSetter(): void
    {
		$this->expectException(WarehouseIsFullException::class);
        
		$orange=$this->productFixtureCreator->createOrange();
		
		$flour=$this->productFixtureCreator->createFlourY();
		
		$this->warehouse->setStock([$flour, $orange]);
    }
	
	
	
}