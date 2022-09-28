<?php

namespace iikoExchangeBundle\Contract\iiko\Staff;

class SalaryDto implements \JsonSerializable
{
	protected string $employeeId;
	protected float $salary;
	protected \DateTime $startDate;

	/**
	 * @return string
	 */
	public function getEmployeeId(): string
	{
		return $this->employeeId;
	}

	/**
	 * @param string $employeeId
	 * @return SalaryDto
	 */
	public function setEmployeeId(string $employeeId): SalaryDto
	{
		$this->employeeId = $employeeId;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getSalary(): float
	{
		return $this->salary;
	}

	/**
	 * @param float $salary
	 * @return SalaryDto
	 */
	public function setSalary(float $salary): SalaryDto
	{
		$this->salary = $salary;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getStartDate(): \DateTime
	{
		return $this->startDate;
	}

	/**
	 * @param \DateTime $startDate
	 * @return SalaryDto
	 */
	public function setStartDate(\DateTime $startDate): SalaryDto
	{
		$this->startDate = $startDate;
		return $this;
	}


	public function jsonSerialize()
	{
		return [
			'employeeId' => $this->getEmployeeId(),
			'salary' => $this->getSalary(),
			'startDate' => $this->getStartDate()->format('Y-m-d H:i:s')
		];
	}
}