<?php

namespace iikoExchangeBundle\Application;

class Restaurant
{
	private int $id;
	private string $name;
	private \DateTimeZone $dateTimeZone;

	/**
	 * @param int $id
	 * @param string $name
	 */
	public function __construct(int $id, string $name, \DateTimeZone $dateTimeZone)
	{
		$this->id = $id;
		$this->name = $name;
		$this->dateTimeZone = $dateTimeZone;
	}


	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Restaurant
	 */
	public function setId(int $id): Restaurant
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Restaurant
	 */
	public function setName(string $name): Restaurant
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return \DateTimeZone
	 */
	public function getDateTimeZone(): \DateTimeZone
	{
		return $this->dateTimeZone;
	}

	/**
	 * @param \DateTimeZone $dateTimeZone
	 * @return Restaurant
	 */
	public function setDateTimeZone(\DateTimeZone $dateTimeZone): Restaurant
	{
		$this->dateTimeZone = $dateTimeZone;
		return $this;
	}

}