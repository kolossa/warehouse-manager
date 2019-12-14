<?php 

namespace webdream\Warehouse\Management\Product;

class ProductFactory
{
	public function createFlour(int $id) : Flour
	{
		return new Flour($id, new FlourBestBefore());
	}
	
	public function createOrange(int $id) : Orange
	{
		return new Orange($id, new TropicalFruitBestBefore());
	}
}