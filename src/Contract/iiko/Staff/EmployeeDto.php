<?php

namespace iikoExchangeBundle\Contract\iiko\Staff;


class EmployeeDto
{
	const DATE_FORMAT = "Y-m-d\TH:i:sP";
	/** @var null|string */
	protected ?string $id = null;
	/** @var  string */
	protected string $code = '';
	/** @var string */
	protected $name = '';
	/** @var string|null */
	protected $login = null;
	/** @var string */
	protected $mainRoleCode = '';
	/** @var array */
	protected $roleCodes = [];
	/** @var string|null */
	protected $firstName = '';
	/** @var string|null */
	protected $lastName = '';
	/** @var string|string */
	protected $middleName = '';
	/** @var string|string */
	protected $cardNumber = null;
	/** @var string|null */
	protected $taxpayerIdNumber = null;
	/** @var string|null */
	protected $snils = null;
	/** @var string */
	protected $preferredDepartmentCode = '';
	/** @var array */
	protected $departmentCodes = [];
	/** @var array */
	protected $responsibilityDepartmentCodes = [];
	/** @var bool */
	protected $deleted = false;
	/** @var bool */
	protected $supplier = false;
	/** @var bool */
	protected $employee = true;
	/** @var bool */
	protected $client = true;

	/** @var  string|null */
	protected $note = ''; //Комментарий
	/** @var  \DateTime|null */
	protected $fireDate = null; //Дата увольнения

	//Данные поставщика
	/** @var null|string */
	protected $gln = null; //Global Location Number
	/** @var  \DateTime */
	protected $activationDate = null;
	/** @var  \DateTime */
	protected $deactivationDate = null;

	//Справочная информация
	/** @var string|null */
	protected $phone = null;
	/** @var string|null */
	protected $cellPhone = null;
	/** @var \DateTime|null */
	protected $birthday = null;
	/** @var string|null */
	protected $email = null;
	/** @var string|null */
	protected $address = '';
	/** @var \DateTime|null */
	protected $hireDate = null; //Дата принятия на работу
	/** @var string|null */
	protected $hireDocumentNumber = null; //Номер документа о принятии на работу
	/** @var string */
	protected $password = null;
	/** @var string */
	protected $pinCode = null;


	/**
	 * Serialization
	 */
	public function jsonSerialize()
	{
		$array = [
			'id' => $this->getId(),
			'code' => $this->getCode(),
			'name' => $this->getName(),
			'login' => $this->getLogin(),
			'mainRoleCode' => $this->getMainRoleCode(),
			'roleCodes' => $this->getRoleCodes(),
			'firstName' => $this->getFirstName(),
			'middleName' => $this->getMiddleName(),
			'lastName' => $this->getLastName(),
			'cardNumber' => $this->getCardNumber(),
			'taxpayerIdNumber' => $this->getTaxpayerIdNumber(),
			'snils' => $this->getSnils(),
			'preferredDepartmentCode' => $this->getPreferredDepartmentCode(),
			'departmentCodes' => $this->getDepartmentCodes(),
			'responsibilityDepartmentCodes' => $this->getResponsibilityDepartmentCodes(),
			'deleted' => $this->isDeleted(),
			'supplier' => $this->isSupplier(),
			'employee' => $this->isEmployee(),
			'client' => $this->isClient(),
			'phone' => $this->getPhone(),
			'cellPhone' => $this->getCellPhone(),
			'hireDate' => $this->getHireDate() ? $this->getHireDate()->format('Y-m-d H:i:s') : null,
			'hireDocumentNumber' => $this->getHireDocumentNumber(),
			'address' => $this->getAddress(),
			'email' => $this->getEmail(),
			'birthday' => $this->getBirthday() ? $this->getBirthday()->format('Y-m-d H:i:s') : null,
			'note' => $this->getNote(),

		];
		if ($this->isSupplier())
		{
			$array['gln'] = $this->getGln();
			$array['activationDate'] = $this->getActivationDate() ? $this->getActivationDate()->format('Y-m-d H:i:s') : null;
			$array['deactivationDate'] = $this->getDeactivationDate() ? $this->getDeactivationDate()->format('Y-m-d H:i:s') : null;
		}
		if ($this->isEmployee())
		{
			$array['cardNumber'] = $this->getCardNumber();
			$array['fireDate'] = $this->getFireDate() ? $this->getFireDate()->format('Y-m-d H:i:s') : null;
		}
		return $array;
	}

	/**
	 * @return string
	 */
	public function getId(): ?string
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return EmployeeDto
	 */
	public function setId(string $id): EmployeeDto
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 * @return EmployeeDto
	 */
	public function setCode(string $code): EmployeeDto
	{
		$this->code = $code;
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
	 * @return EmployeeDto
	 */
	public function setName(string $name): EmployeeDto
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLogin(): ?string
	{
		return $this->login;
	}

	/**
	 * @param string|null $login
	 * @return EmployeeDto
	 */
	public function setLogin(?string $login): EmployeeDto
	{
		$this->login = $login;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMainRoleCode(): string
	{
		return $this->mainRoleCode;
	}

	/**
	 * @param string $mainRoleCode
	 * @return EmployeeDto
	 */
	public function setMainRoleCode(string $mainRoleCode): EmployeeDto
	{
		$this->mainRoleCode = $mainRoleCode;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getRoleCodes(): array
	{
		return $this->roleCodes;
	}

	/**
	 * @param array $roleCodes
	 * @return EmployeeDto
	 */
	public function setRoleCodes(array $roleCodes): EmployeeDto
	{
		$this->roleCodes = $roleCodes;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	/**
	 * @param string|null $firstName
	 * @return EmployeeDto
	 */
	public function setFirstName(?string $firstName): EmployeeDto
	{
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	/**
	 * @param string|null $lastName
	 * @return EmployeeDto
	 */
	public function setLastName(?string $lastName): EmployeeDto
	{
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMiddleName(): string
	{
		return $this->middleName;
	}

	/**
	 * @param string $middleName
	 * @return EmployeeDto
	 */
	public function setMiddleName(string $middleName): EmployeeDto
	{
		$this->middleName = $middleName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCardNumber(): ?string
	{
		return $this->cardNumber;
	}

	/**
	 * @param string $cardNumber
	 * @return EmployeeDto
	 */
	public function setCardNumber(?string $cardNumber): EmployeeDto
	{
		$this->cardNumber = $cardNumber;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getTaxpayerIdNumber(): ?string
	{
		return $this->taxpayerIdNumber;
	}

	/**
	 * @param string|null $taxpayerIdNumber
	 * @return EmployeeDto
	 */
	public function setTaxpayerIdNumber(?string $taxpayerIdNumber): EmployeeDto
	{
		$this->taxpayerIdNumber = $taxpayerIdNumber;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getSnils(): ?string
	{
		return $this->snils;
	}

	/**
	 * @param string|null $snils
	 * @return EmployeeDto
	 */
	public function setSnils(?string $snils): EmployeeDto
	{
		$this->snils = $snils;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPreferredDepartmentCode(): string
	{
		return $this->preferredDepartmentCode;
	}

	/**
	 * @param string $preferredDepartmentCode
	 * @return EmployeeDto
	 */
	public function setPreferredDepartmentCode(string $preferredDepartmentCode): EmployeeDto
	{
		$this->preferredDepartmentCode = $preferredDepartmentCode;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getDepartmentCodes(): array
	{
		return $this->departmentCodes;
	}

	/**
	 * @param array $departmentCodes
	 * @return EmployeeDto
	 */
	public function setDepartmentCodes(array $departmentCodes): EmployeeDto
	{
		$this->departmentCodes = $departmentCodes;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getResponsibilityDepartmentCodes(): array
	{
		return $this->responsibilityDepartmentCodes;
	}

	/**
	 * @param array $responsibilityDepartmentCodes
	 * @return EmployeeDto
	 */
	public function setResponsibilityDepartmentCodes(array $responsibilityDepartmentCodes): EmployeeDto
	{
		$this->responsibilityDepartmentCodes = $responsibilityDepartmentCodes;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isDeleted(): bool
	{
		return $this->deleted;
	}

	/**
	 * @param bool $deleted
	 * @return EmployeeDto
	 */
	public function setDeleted(bool $deleted): EmployeeDto
	{
		$this->deleted = $deleted;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSupplier(): bool
	{
		return $this->supplier;
	}

	/**
	 * @param bool $supplier
	 * @return EmployeeDto
	 */
	public function setSupplier(bool $supplier): EmployeeDto
	{
		$this->supplier = $supplier;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isEmployee(): bool
	{
		return $this->employee;
	}

	/**
	 * @param bool $employee
	 * @return EmployeeDto
	 */
	public function setEmployee(bool $employee): EmployeeDto
	{
		$this->employee = $employee;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isClient(): bool
	{
		return $this->client;
	}

	/**
	 * @param bool $client
	 * @return EmployeeDto
	 */
	public function setClient(bool $client): EmployeeDto
	{
		$this->client = $client;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getNote(): ?string
	{
		return $this->note;
	}

	/**
	 * @param string|null $note
	 * @return EmployeeDto
	 */
	public function setNote(?string $note): EmployeeDto
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getFireDate(): ?\DateTime
	{
		return $this->fireDate;
	}

	/**
	 * @param \DateTime|null $fireDate
	 * @return EmployeeDto
	 */
	public function setFireDate(?\DateTime $fireDate): EmployeeDto
	{
		$this->fireDate = $fireDate;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getGln(): ?string
	{
		return $this->gln;
	}

	/**
	 * @param string|null $gln
	 * @return EmployeeDto
	 */
	public function setGln(?string $gln): EmployeeDto
	{
		$this->gln = $gln;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getActivationDate(): ?\DateTime
	{
		return $this->activationDate;
	}

	/**
	 * @param \DateTime $activationDate
	 * @return EmployeeDto
	 */
	public function setActivationDate(?\DateTime $activationDate): EmployeeDto
	{
		$this->activationDate = $activationDate;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDeactivationDate(): ?\DateTime
	{
		return $this->deactivationDate;
	}

	/**
	 * @param \DateTime $deactivationDate
	 * @return EmployeeDto
	 */
	public function setDeactivationDate(?\DateTime $deactivationDate): EmployeeDto
	{
		$this->deactivationDate = $deactivationDate;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPhone(): ?string
	{
		return $this->phone;
	}

	/**
	 * @param string|null $phone
	 * @return EmployeeDto
	 */
	public function setPhone(?string $phone): EmployeeDto
	{
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getCellPhone(): ?string
	{
		return $this->cellPhone;
	}

	/**
	 * @param string|null $cellPhone
	 * @return EmployeeDto
	 */
	public function setCellPhone(?string $cellPhone): EmployeeDto
	{
		$this->cellPhone = $cellPhone;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getBirthday(): ?\DateTime
	{
		return $this->birthday;
	}

	/**
	 * @param \DateTime|null $birthday
	 * @return EmployeeDto
	 */
	public function setBirthday(?\DateTime $birthday): EmployeeDto
	{
		$this->birthday = $birthday;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getEmail(): ?string
	{
		return $this->email;
	}

	/**
	 * @param string|null $email
	 * @return EmployeeDto
	 */
	public function setEmail(?string $email): EmployeeDto
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAddress(): ?string
	{
		return $this->address;
	}

	/**
	 * @param string|null $address
	 * @return EmployeeDto
	 */
	public function setAddress(?string $address): EmployeeDto
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getHireDate(): ?\DateTime
	{
		return $this->hireDate;
	}

	/**
	 * @param \DateTime|null $hireDate
	 * @return EmployeeDto
	 */
	public function setHireDate(?\DateTime $hireDate): EmployeeDto
	{
		$this->hireDate = $hireDate;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getHireDocumentNumber(): ?string
	{
		return $this->hireDocumentNumber;
	}

	/**
	 * @param string|null $hireDocumentNumber
	 * @return EmployeeDto
	 */
	public function setHireDocumentNumber(?string $hireDocumentNumber): EmployeeDto
	{
		$this->hireDocumentNumber = $hireDocumentNumber;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPassword(): ?string
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 * @return EmployeeDto
	 */
	public function setPassword(?string $password): EmployeeDto
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPinCode(): ?string
	{
		return $this->pinCode;
	}

	/**
	 * @param string $pinCode
	 * @return EmployeeDto
	 */
	public function setPinCode(?string $pinCode): EmployeeDto
	{
		$this->pinCode = $pinCode;
		return $this;
	}

}