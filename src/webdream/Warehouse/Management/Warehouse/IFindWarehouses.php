<?php 

namespace webdream\Warehouse\Management\Warehouse;

interface IFindWarehouses
{
	/**
	 * @var Warehouse[] $warehouses
	 * @var Warehouse $warehouse
	 * @return Warehouse[]
	 */
	public function findWarehouses(array $warehouses, Warehouse $warehouse):array;
}