<?php

namespace iikoExchangeBundle\Library\Request;

use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;

class RequestResponseItem
{
	protected string $requestCode;
	protected $data;
	protected ?Period $period;
	protected ?Restaurant $restaurant;

	/**
	 * @param string $requestCode
	 * @param $data
	 * @param Period|null $period
	 * @param Restaurant|null $restaurant
	 */
	public function __construct(string $requestCode, $data, ?Period $period = null, ?Restaurant $restaurant = null)
	{
		$this->requestCode = $requestCode;
		$this->data = $data;
		$this->period = $period;
		$this->restaurant = $restaurant;
	}

	/**
	 * @return string
	 */
	public function getRequestCode(): string
	{
		return $this->requestCode;
	}

	/**
	 * @param string $requestCode
	 * @return RequestResponseItem
	 */
	public function setRequestCode(string $requestCode): RequestResponseItem
	{
		$this->requestCode = $requestCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param mixed $data
	 * @return RequestResponseItem
	 */
	public function setData($data)
	{
		$this->data = $data;
		return $this;
	}

	/**
	 * @return Period|null
	 */
	public function getPeriod(): ?Period
	{
		return $this->period;
	}

	/**
	 * @param Period|null $period
	 * @return RequestResponseItem
	 */
	public function setPeriod(?Period $period): RequestResponseItem
	{
		$this->period = $period;
		return $this;
	}

	/**
	 * @return Restaurant|null
	 */
	public function getRestaurant(): ?Restaurant
	{
		return $this->restaurant;
	}

	/**
	 * @param Restaurant|null $restaurant
	 * @return RequestResponseItem
	 */
	public function setRestaurant(?Restaurant $restaurant): RequestResponseItem
	{
		$this->restaurant = $restaurant;
		return $this;
	}

}