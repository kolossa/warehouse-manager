<?php 

namespace webdream\Warehouse\Management\Product;

class TropicalFruitBestBefore implements IBestBefore
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
		
		if(in_array(date('m'), ['10', '11', '12', '01', '02', '03'])){
			$bestBefore->add(new \DateInterval('P7D'));
		}elseif(in_array(date('m'), ['04', '05', '06', '07', '08', '09'])){
			$bestBefore->add(new \DateInterval('P5D'));
		}
		
		$this->bestBefore=$bestBefore;
		
		return $bestBefore;
	}
}