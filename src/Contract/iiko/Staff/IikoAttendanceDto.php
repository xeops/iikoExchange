<?php

namespace iikoExchangeBundle\Contract\iiko\Staff;


/**
 * Класс описыващий сущность "Явка" пользователя
 * Class IikoAttendanceDto
 */
class IikoAttendanceDto implements \JsonSerializable
{
	/** @var string */
	protected $id = '';
	/** @var string */
	protected $employeeId = '';
	/** @var string */
	protected $roleId = '';
	/** @var string */
	protected $attendanceType = '';
	/** @var string */
	protected $comment = '';
	/** @var \DateTime */
	protected $dateFrom = null;
	/** @var \DateTime */
	protected $dateTo = null;
	/** @var \DateTime */
	protected $personalDateFrom = null;
	/** @var \DateTime */
	protected $personalDateTo = null;
	/** @var string */
	protected $departmentId = '';
	/** @var string */
	protected $departmentName = '';
	/** @var IikoPaymentDetailsDto */
	protected $paymentDetails = null;
	/** @var \DateTime */
	protected $created = null;
	/** @var \DateTime */
	protected $modified = null;
	/** @var string */
	protected $userModified = '';

	/**
	 * @return array
	 */
	public function jsonSerialize()
	{
		$arr = [
			'id' => $this->getId(),
			'employeeId' => $this->getEmployeeId(),
			'roleId' => $this->getRoleId(),
			'attendanceType' => $this->getAttendanceType(),
			'comment' => $this->getComment(),
			'dateFrom' => $this->getDateFrom() ? $this->getDateFrom()->format('Y-m-d H:i:s') : null,
			'dateTo' => $this->getDateTo() ? $this->getDateTo()->format('Y-m-d H:i:s') : null,
			'personalDateFrom' => $this->getPersonalDateFrom() ? $this->getPersonalDateFrom()->format('Y-m-d H:i:s') : null,
			'personalDateTo' => $this->getPersonalDateTo() ? $this->getPersonalDateTo()->format('Y-m-d H:i:s') : null,
			'departmentId' => $this->getDepartmentId(),
			'departmentName' => $this->getDepartmentName(),
			'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d H:i:s') : null,
			'modified' => $this->getModified() ? $this->getModified()->format('Y-m-d H:i:s') : null,
			'userModified' => $this->getUserModified(),
			'paymentDetails' => $this->getPaymentDetails()
		];
		return $arr;
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
	 * @return string
	 */
	public function getRoleId()
	{
		return $this->roleId;
	}

	/**
	 * @param string $roleId
	 * @return $this
	 */
	public function setRoleId($roleId)
	{
		$this->roleId = (string)$roleId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAttendanceType(): string
	{
		return $this->attendanceType;
	}

	/**
	 * @param string $attendanceType
	 * @return $this
	 */
	public function setAttendanceType($attendanceType)
	{
		$this->attendanceType = (string)$attendanceType;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * @param string $comment
	 * @return $this
	 */
	public function setComment($comment)
	{
		$this->comment = (string)$comment;
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
	public function setDateTo($dateTo)
	{
		$this->dateTo = $dateTo;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getPersonalDateFrom()
	{
		return $this->personalDateFrom;
	}

	/**
	 * @param \DateTime $personalDateFrom
	 * @return $this
	 */
	public function setPersonalDateFrom($personalDateFrom)
	{
		$this->personalDateFrom = $personalDateFrom;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getPersonalDateTo()
	{
		return $this->personalDateTo;
	}

	/**
	 * @param \DateTime $personalDateTo
	 * @return $this
	 */
	public function setPersonalDateTo($personalDateTo)
	{
		$this->personalDateTo = $personalDateTo;
		return $this;
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
	 * @return string
	 */
	public function getDepartmentName()
	{
		return $this->departmentName;
	}

	/**
	 * @param string $departmentName
	 * @return $this
	 */
	public function setDepartmentName($departmentName)
	{
		$this->departmentName = (string)$departmentName;
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
	 * @return \DateTime
	 */
	public function getCreated()
	{
		return $this->created;
	}

	/**
	 * @param \DateTime $created
	 * @return $this
	 */
	public function setCreated($created)
	{
		$this->created = $created;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getModified()
	{
		return $this->modified;
	}

	/**
	 * @param \DateTime $modified
	 * @return $this
	 */
	public function setModified($modified)
	{
		$this->modified = $modified;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUserModified()
	{
		return $this->userModified;
	}

	/**
	 * @param string $userModified
	 * @return $this
	 */
	public function setUserModified($userModified)
	{
		$this->userModified = (string)$userModified;
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
	 * @return \DateTime
	 */
	public function getActualDateFrom()
	{
		return $this->getDateFrom() ? $this->getDateFrom() : $this->getPersonalDateFrom();
	}

	/**
	 * @return \DateTime
	 */
	public function getActualDateTo()
	{
		return $this->getDateTo() ? $this->getDateTo() : $this->getPersonalDateTo();
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
	 * Закрыта ли явка
	 * @return bool
	 */
	public function isClosed()
	{
		return $this->getDateTo() ? true : false;
	}

}