<?php
/**
 * Created by PhpStorm.
 * User: nyatM
 * Date: 24.05.2018
 * Time: 18:08
 */

namespace iikoExchangeBundle\Contract\iiko\Staff;



/**
 * Класс, описывающий сущность "расписание сотрудника"
 * Class IikoEmployeeSchedule
 * @package IikoApiBundle\Model\Employee
 */
class IikoEmployeeScheduleDto implements \JsonSerializable
{
	/** @var  string */
	protected $id = '';
	/** @var  string */
	protected $employeeId = '';
	/** @var  string */
	protected $roleId = '';
	/** @var  int */
	protected $nonPaidMinutes = 0;//Неоплачиваемое время в минутах
	/** @var  string */
	protected $scheduleTypeCode = ''; // код расписания
	/** @var \DateTime */
	protected $dateFrom = null;
	/** @var \DateTime */
	protected $dateTo = null;
	/** @var  string */
	protected $departmentName = '';
	/** @var  string */
	protected $departmentId = '';
	/** @var IikoPaymentDetailsDto */
	protected $paymentDetails;

	/**
	 * @return array
	 */
	public function jsonSerialize()
	{
		return [
			'id' => $this->getId(),
			'employeeId' => $this->getEmployeeId(),
			'roleId' => $this->getRoleId(),
			'nonPaidMinutes' => $this->getNonPaidMinutes(),
			'scheduleTypeCode' => $this->getScheduleTypeCode(),
			'dateFrom' => $this->getDateFrom()->format('Y-m-d H:i:s'),
			'dateTo' => $this->getDateTo()->format('Y-m-d H:i:s'),
			'departmentName' => $this->getDepartmentName(),
			'departmentId' => $this->getDepartmentId(),
			'paymentDetails' => $this->getPaymentDetails()
		];

	}


	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = (string)$id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmployeeId()
	{
		return $this->employeeId;
	}

	/**
	 * @param string $employeeId
	 * @return $this
	 */
	public function setEmployeeId($employeeId)
	{
		$this->employeeId = (string)$employeeId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRoleId()
	{
		return $this->roleId;
	}

	/**
	 * @param mixed $roleId
	 * @return $this
	 */
	public function setRoleId($roleId)
	{
		$this->roleId = (string)$roleId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getNonPaidMinutes()
	{
		return $this->nonPaidMinutes;
	}

	/**
	 * @param int $nonPaidMinutes
	 * @return $this
	 */
	public function setNonPaidMinutes($nonPaidMinutes)
	{
		$this->nonPaidMinutes = (int)$nonPaidMinutes;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getScheduleTypeCode()
	{
		return $this->scheduleTypeCode;
	}

	/**
	 * @param mixed $scheduleTypeCode
	 * @return $this
	 */
	public function setScheduleTypeCode($scheduleTypeCode)
	{
		$this->scheduleTypeCode = (string)$scheduleTypeCode;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateFrom()
	{
		return $this->dateFrom;
	}

	/**
	 * @param \DateTime $dateFrom
	 * @return $this
	 */
	public function setDateFrom(\DateTime $dateFrom)
	{
		$this->dateFrom = $dateFrom;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateTo()
	{
		return $this->dateTo;
	}

	/**
	 * @param \DateTime $dateTo
	 * @return $this
	 */
	public function setDateTo(\DateTime $dateTo)
	{
		$this->dateTo = $dateTo;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDepartmentName()
	{
		return $this->departmentName;
	}

	/**
	 * @param string $departmentName
	 */
	public function setDepartmentName($departmentName)
	{
		$this->departmentName = (string)$departmentName;
	}

	/**
	 * @return string
	 */
	public function getDepartmentId()
	{
		return $this->departmentId;
	}

	/**
	 * @param string $departmentId
	 * @return $this
	 */
	public function setDepartmentId($departmentId)
	{
		$this->departmentId = (string)$departmentId;
		return $this;
	}

	/**
	 * @return IikoPaymentDetailsDto
	 */
	public function getPaymentDetails()
	{
		return $this->paymentDetails;
	}

	/**
	 * @param IikoPaymentDetailsDto $paymentDetails
	 * @return $this
	 */
	public function setPaymentDetails($paymentDetails)
	{
		$this->paymentDetails = $paymentDetails;
		return $this;
	}

	/**
	 * Корректны ли данные для импорта
	 * @return bool
	 */
	public function isCorrectImportData()
	{
		return $this->getRoleId() ? true : false;
	}

	/**
	 * Форматировать сущнность для добавления в iiko
	 * @return mixed
	 */
	public function toSaveIikoXml()
	{
		$root = new \SimpleXMLElement('<schedule></schedule>');
		if ($this->getId()) {
			$root->addChild('id', $this->getId());
		}
		$root->addChild('employeeId', $this->getEmployeeId());
		$root->addChild('roleId', $this->getRoleId());
		$root->addChild('dateFrom', $this->getDateFrom()->format('Y-m-d\TH:i:s'));
		$root->addChild('dateTo', $this->getDateTo()->format('Y-m-d\TH:i:s'));
		$root->addChild('scheduleTypeCode', $this->getScheduleTypeCode());
		$root->addChild('nonPaidMinutes', $this->getNonPaidMinutes());
		$root->addChild('departmentId', $this->getDepartmentId());
		return $root->asXML();
	}

}
