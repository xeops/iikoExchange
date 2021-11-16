<?php

namespace iikoExchangeBundle\Application;

class Restaurant
{
	private int $id;
	private int $name;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getName(): int
	{
		return $this->name;
	}

	/**
	 * @param int $name
	 */
	public function setName(int $name): void
	{
		$this->name = $name;
	}


}