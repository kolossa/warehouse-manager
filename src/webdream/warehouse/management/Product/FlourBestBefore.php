<?php 

namespace webdream\Warehouse\Management\Product;

class FlourBestBefore implements IBestBefore
{
	/**
	 * @var DateTime $bestBefore
	 */
	private $bestBefore;
	
	public function getBestBefore(\DateTime $created) : \DateTime
	{
		if($this->bestBefore!=null){
			return $this->bestBefore;
		}
		
		$bestBefore = clone $created;
		$bestBefore->add(new \DateInterval('P1Y'));
		
		$this->bestBefore=$bestBefore;
		
		return $bestBefore;
	}
}