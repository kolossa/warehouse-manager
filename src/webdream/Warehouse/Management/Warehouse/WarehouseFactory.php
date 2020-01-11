<?php 

namespace webdream\Warehouse\Management\Warehouse;

class WarehouseFactory
{
	public function createWarehouse($id) : Warehouse
	{
		return new Warehouse($id);
	}
}