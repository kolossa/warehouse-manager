<?php 

namespace webdream\Warehouse\Management\Warehouse;

class Address
{
	/**
	 * @var string $country
	 */
	private $country;
	
	/**
	 * @var string $countryISO31661Alpha3
	 */
	private $countryISO31661Alpha3;
	
	/**
	 * @var string $city
	 */
	private $city;
	
	/**
	 * @var string $address
	 */
	private $address;
	
	/**
	 * @var double $gpsLatitude
	 */
	private $gpsLatitude;
	
	/**
	 * @var double $gpsLongitude
	 */
	private $gpsLongitude;
	
	public function getCountry() : string
	{
		return $this->country;
	}
	
	public function setCountry(string $value)
	{
		$this->country=$value;
	}
	
	public function getCountryISO31661Alpha3() : string
	{
		return $this->countryISO31661Alpha3;
	}
	
	public function setCountryISO31661Alpha3(string $value)
	{
		$this->countryISO31661Alpha3=$value;
	}
	
	public function getCity() : string
	{
		return $this->city;
	}
	
	public function setCity(string $value)
	{
		$this->city=$value;
	}
	
	public function getAddress() : string
	{
		return $this->address;
	}
	
	public function setAddress(string $value)
	{
		$this->address=$value;
	}
	
	public function getGpsLatitude() : double
	{
		return $this->gpsLatitude;
	}
	
	public function setGpsLatitude(double $value)
	{
		$this->gpsLatitude=$value;
	}
	
	public function getGpsLongitude() : double
	{
		return $this->gpsLongitude;
	}
	
	public function setGpsLongitude(double $value)
	{
		$this->gpsLongitude=$value;
	}
}