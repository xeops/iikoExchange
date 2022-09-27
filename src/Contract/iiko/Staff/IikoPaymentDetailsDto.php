<?php
/**
 * Created by PhpStorm.
 * User: nyatM
 * Date: 28.05.2018
 * Time: 17:10
 */

namespace iikoExchangeBundle\Contract\iiko\Staff;


/**
 * Класс описывающий сущность PaymentsDetails
 * в расписании и явке
 * Class IikoPaymentDetails
 * @package IikoApiBundle\Model\Employee
 */
class IikoPaymentDetailsDto implements \JsonSerializable
{

	/** @var string */
	protected $salaryDepartmentId = '';
	/** @var string */
	protected $salaryDepartmentName = '';
	/** @var int */
	protected $regularPayedMinutes = 0;
	/** @var float */
	protected $regularPaymentSum = 0.0;
	/** @var int */
	protected $overtimePayedMinutes = 0;
	/** @var float */
	protected $overtimePayedSum = 0.0;
	/** @var float */
	protected $otherPaymentsSum = 0.0;

	/**
	 * @return array
	 */
	public function jsonSerialize()
	{
		return [
			'salaryDepartmentId' => $this->getSalaryDepartmentId(),
			'salaryDepartmentName' => $this->getSalaryDepartmentName(),
			'regularPayedMinutes' => $this->getRegularPayedMinutes(),
			'regularPaymentSum' => $this->getRegularPaymentSum(),
			'overtimePayedMinutes' => $this->getOvertimePayedMinutes(),
			'overtimePayedSum' => $this->getOvertimePayedSum(),
			'otherPaymentsSum' => $this->getOtherPaymentsSum()
		];
	}

	/**
	 * @return array
	 */
	public function jsonSerializeStripPayment()
	{
		return [
			'salaryDepartmentId' => $this->getSalaryDepartmentId(),
			'salaryDepartmentName' => $this->getSalaryDepartmentName(),
			'regularPayedMinutes' => $this->getRegularPayedMinutes(),
			'regularPaymentSum' => null,
			'overtimePayedMinutes' => $this->getOvertimePayedMinutes(),
			'overtimePayedSum' => null,
			'otherPaymentsSum' => null,
		];
	}


	

	/**
	 * @return string
	 */
	public function getSalaryDepartmentId()
	{
		return $this->salaryDepartmentId;
	}

	/**
	 * @param string $salaryDepartmentId
	 * @return $this
	 */
	public function setSalaryDepartmentId($salaryDepartmentId)
	{
		$this->salaryDepartmentId = (string)$salaryDepartmentId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSalaryDepartmentName()
	{
		return $this->salaryDepartmentName;
	}

	/**
	 * @param string $salaryDepartmentName
	 * @return $this
	 */
	public function setSalaryDepartmentName($salaryDepartmentName)
	{
		$this->salaryDepartmentName = (string)$salaryDepartmentName;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRegularPayedMinutes()
	{
		return $this->regularPayedMinutes;
	}

	/**
	 * @param int $regularPayedMinutes
	 * @return $this
	 */
	public function setRegularPayedMinutes($regularPayedMinutes)
	{
		$this->regularPayedMinutes = (int)$regularPayedMinutes;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getRegularPaymentSum()
	{
		return $this->regularPaymentSum;
	}

	/**
	 * @param float $regularPaymentSum
	 * @return $this
	 */
	public function setRegularPaymentSum($regularPaymentSum)
	{
		$this->regularPaymentSum = (float)$regularPaymentSum;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getOvertimePayedMinutes()
	{
		return $this->overtimePayedMinutes;
	}

	/**
	 * @param int $overtimePayedMinutes
	 * @return $this
	 */
	public function setOvertimePayedMinutes($overtimePayedMinutes)
	{
		$this->overtimePayedMinutes = (int)$overtimePayedMinutes;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getOvertimePayedSum()
	{
		return $this->overtimePayedSum;
	}

	/**
	 * @param float $overtimePayedSum
	 * @return $this
	 */
	public function setOvertimePayedSum($overtimePayedSum)
	{
		$this->overtimePayedSum = (float)$overtimePayedSum;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getOtherPaymentsSum()
	{
		return $this->otherPaymentsSum;
	}

	/**
	 * @param float $otherPaymentsSum
	 * @return $this
	 */
	public function setOtherPaymentsSum($otherPaymentsSum)
	{
		$this->otherPaymentsSum = (float)$otherPaymentsSum;
		return $this;
	}


}
