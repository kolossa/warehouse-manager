<?php 

namespace webdream\Warehouse\Management\Product;

interface IBestBefore
{
	public function getBestBefore(\DateTime $created) : \DateTime;
}