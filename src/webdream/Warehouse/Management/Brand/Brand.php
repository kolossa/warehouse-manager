<?php 

namespace webdream\Warehouse\Management\Brand;

use webdream\Warehouse\Management\Entity;

class Brand extends Entity
{
	/**
	 * @var string $name;
	 */
	private $name;
	
	/**
	 * @var int $category;
	 */
	private $category;
	
	public function getName() :string
	{
		return $this->name;
	}
	
	public function setName(string $value) :void
	{
		$this->name=$value;
	}
	
	public function getCategory() :int
	{
		return $this->category;
	}
	
	public function setCategory(int $value) :void
	{
		$this->category=$value;
	}
}