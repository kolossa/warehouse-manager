<?php 

namespace webdream\Warehouse\Management\Product;

use webdream\Warehouse\Management\Entity;
use webdream\Warehouse\Management\Values\Price;
use webdream\Warehouse\Management\Entities\Brand\Brand;

abstract class AbstractProduct extends Entity
{
	/**
	 * @var int $itemNumber;
	 */
	private $itemNumber;
	
	/**
	 * @var string $name;
	 */
	private $name;
	
	/**
	 * @var Price $price;
	 */
	private $price;
	
	/**
	 * @var Brand $brand;
	 */
	private $brand;
	
	/**
	 * @var DateTime $created;
	 */
	private $created;
	
	/**
	 * @var IBestBefore $bestBeforeAlgorithm;
	 */
	private $bestBeforeAlgorithm;
	
	public function __construct(int $id, IBestBefore $bestBeforeAlgorithm)
	{
		parent::__construct($id);
		$this->bestBeforeAlgorithm=$bestBeforeAlgorithm;
	}
	
	public function bestBefore()
	{
		return $this->bestBeforeAlgorithm->getBestBefore($this->created);
	}
	
	public function getItemNumber() : int
	{
		return $this->itemNumber;
	}
	
	public function setItemNumber(int $value) :void
	{
		$this->itemNumber=$value;
	}
	
	public function getName() : string
	{
		return $this->name;
	}
	
	public function setName(string $value) :void
	{
		$this->name=$value;
	}
	
	public function getPrice() : Price
	{
		return $this->price;
	}
	
	public function setPrice(Price $value) :void
	{
		$this->price=$value;
	}
	
	public function getBrand() : Brand
	{
		return $this->brand;
	}
	
	public function setBrand(Brand $value) :void
	{
		$this->brand=$value;
	}
	
	public function getCreated() : \DateTime
	{
		return $this->created;
	}
	
	public function setCreated(\DateTime $value) :void
	{
		$this->created=$value;
	}
	
}