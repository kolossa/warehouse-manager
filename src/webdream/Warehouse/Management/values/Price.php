<?php 

namespace webdream\Warehouse\Management\Values;

class Price
{
	/**
     * @var double $amount
     */
    private $amount;
	
	/**
     * @var string $currency
     */
    private $currency;

	public function __construct(double $amount, string $currency)
	{
		$this->amount = $amount;
		$the->currency = $currency;
	}
	
	public function equals(Price $other)
    {
		return $this->amount === $other->getAmount() && $this->isSameCurrency($other);
	}
	
    public function getAmount() : double
    {
        return $this->amount;
    }
	
    public function getCurrency() : string
    {
        return $this->currency;
    }
	
	public function add(Price $price)
	{
		$this->assertSameCurrency($price);
		return new Price($this->amount + $price->getAmount(), $this->currency);
	}
	
	public function subtract(Price $price)
	{
		$this->assertSameCurrency($price);
		return new Price($this->amount - $price->getAmount, $this->currency);
	}
	
	private function assertSameCurrency(Price $other)
    {
        if (!$this->isSameCurrency($other)) {
            throw new \InvalidArgumentException('Currencies must be identical');
        }
    }
	
	private function isSameCurrency(Price $other)
	{
		return $this->currency === $other->getCurrency();
	}
}