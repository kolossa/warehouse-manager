<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use webdream\Warehouse\Management\Warehouse\WarehouseFactory;
use webdream\Warehouse\Management\Warehouse\Warehouse;

final class CreateWarehouseTest extends TestCase
{
    /**
	 * @test
	 */
	public function create(): void
    {
        $factory=new WarehouseFactory();
		$warehouse=$factory->createWarehouse(1);
		
		$this->assertInstanceOf(
            Warehouse::class,
            $warehouse
        );
    }
}