<?php 

namespace tests;

use webdream\Warehouse\Management\Product\ProductFactory;
use webdream\Warehouse\Management\Product\Flour;
use webdream\Warehouse\Management\Product\Orange;

class ProductFixtureCreator
{
	
	private $productFactory;
	
	/**
	 * @return ProductFactory
	 */
	public function getProductFactory()
	{
		if($this->productFactory==null){
			$this->productFactory=new ProductFactory();
		}
		
		return $this->productFactory;
	}
	
	public function createFlourX():Flour
	{
		$flour=$this->getProductFactory()->createFlour(1);
		$flour->setName('X Malom liszt');
		$flour->setItemNumber(20);
		
		return $flour;
	}
	
	public function createFlourY():Flour
	{
		$flour=$this->getProductFactory()->createFlour(2);
		$flour->setName('Y Malom liszt');
		$flour->setItemNumber(20);
		
		return $flour;
	}
	
	public function createFlourZ():Flour
	{
		$flour=$this->getProductFactory()->createFlour(3);
		$flour->setName('Z Malom liszt');
		$flour->setItemNumber(20);
		
		return $flour;
	}
	
	public function createOrange():Orange
	{
		$orange=$this->getProductFactory()->createOrange(4);
		$orange->setName('Olasz narancs');
		$orange->setItemNumber(30);
		
		return $orange;
	}
	
	public function createOrange2():Orange
	{
		$orange=$this->getProductFactory()->createOrange(5);
		$orange->setName('Olasz narancs2');
		$orange->setItemNumber(30);
		
		return $orange;
	}
	
	
}