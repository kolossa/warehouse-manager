<?php 

namespace webdream\Warehouse\Management\Warehouse;

class GetStockService
{
	/**
	 * @var Warehouse $warehouse
	 */
	private $warehouse;
	
	/**
	 * @var IStockFormatter $stockFormatter
	 */
	private $stockFormatter;
	
	public function __construct(Warehouse $warehouse, IStockFormatter $stockFormatter)
	{
		$this->warehouse=$warehouse;
		$this->stockFormatter=$stockFormatter;
	}
	
	public function getStock()
	{
		return $this->stockFormatter->formatStock($this->warehouse->getStock());
	}
}