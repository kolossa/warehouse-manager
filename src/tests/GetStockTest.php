<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use webdream\Warehouse\Management\Warehouse\GetStockService;
use webdream\Warehouse\Management\Warehouse\FormatStockToString;

final class GetStockTest extends TestCase
{	
	private $getStockService;
	
	protected function setUp() : void
    {
        $warehouseCreator=new tests\WareHouseFixtureCreator();
		
		$warehouse=$warehouseCreator->createWareHouse1();
		$warehouse->setCapacity(3);
		
		$productFixtureCreator=new tests\ProductFixtureCreator();
		
		$flour=$productFixtureCreator->createFlourX();
		
		$orange=$productFixtureCreator->createOrange();
		
		$warehouse->addToStock($flour);
		$warehouse->addToStock($orange);
		
		$this->getStockService=new GetStockService($warehouse, new FormatStockToString());
		
    }
	
    /**
	 * @test
	 */
	public function isString(): void
    {
        $result=$this->getStockService->getStock();
		$this->assertTrue(is_string($result));
    }
	
    /**
	 * @test
	 */
	public function stockContainsProductNames(): void
    {
        $result=$this->getStockService->getStock();
		
		$this->assertTrue(stripos($result, 'Olasz narancs')!==false);
		$this->assertTrue(stripos($result, 'X Malom liszt')!==false);
    }
	
	
}