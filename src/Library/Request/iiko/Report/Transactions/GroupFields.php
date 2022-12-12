<?php

namespace iikoExchangeBundle\Library\Request\iiko\Report\Transactions;

class GroupFields
{

	public static function getTimePeriodFields() {
		return [
			self::DateTimeDateTyped,
			self::DateTimeDayOfWeak,
			self::DateTimeMonth,
			self::DateTimeMonth,
			self::DateTimeQuarter,
			self::DateTimeWeekInYear,
			self::DateTimeWeekInMonth,
			self::DateTimeYear,
			'DateTime.OperDayFilter'
		];
	}

	/**
	* Account.Name - Account (Счет) <br>
	* STRING <br>
	* TAGS:<ul><li>P&L</li><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountName = "Account.Name"; 

	/**
	* Account.Code - Account code (Код счета) <br>
	* STRING <br>
	* TAGS:<ul><li>P&L</li><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountCode = "Account.Code"; 

	/**
	* Account.Group - Account group (Группа счета) <br>
	* ENUM <br>
	* TAGS:<ul><li>P&L</li><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountGroup = "Account.Group"; 

	/**
	* Account.AccountHierarchyFull - Account hierarchy (Иерархия счета) <br>
	* STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountAccountHierarchyFull = "Account.AccountHierarchyFull"; 

	/**
	* Account.Type - Account type (Тип счета) <br>
	* ENUM <br>
	* TAGS:<ul><li>P&L</li><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountType = "Account.Type"; 

	/**
	* Product.AccountingCategory - Accounting category (Бухгалтерская категория) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductAccountingCategory = "Product.AccountingCategory"; 

	/**
	* DateTime.DateTyped - Accounting day (Учетный день) <br>
	* DATE <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeDateTyped = "DateTime.DateTyped"; 

	/**
	* @deprecated 
	* DateTime.OperDayFilter - DateTime.OperDayFilter (DateTime.OperDayFilter) <br>
	* string <br>
	*/
       const DateTimeOperDayFilter = "DateTime.OperDayFilter"; 

	/**
	* Contr-Product.AlcoholClass - Alcohol product class (Класс алкогольной продукции) <br>
	* STRING <br>
	* TAGS:<ul><li>Алкоголь</li><li>Корреспондент</li><li>Alcohol</li><li>Correspondent</li></ul>
	*/
       const ContrProductAlcoholClass = "Contr-Product.AlcoholClass"; 

	/**
	* Product.AlcoholClass - Alcohol product class (Класс алкогольной продукции) <br>
	* STRING <br>
	* TAGS:<ul><li>Алкоголь</li><li>Номенклатура</li><li>Alcohol</li><li>Stock list</li></ul>
	*/
       const ProductAlcoholClass = "Product.AlcoholClass"; 

	/**
	* Contr-Product.AlcoholClass.Group - Alcohol product group (Группа алкогольной продукции) <br>
	* STRING <br>
	* TAGS:<ul><li>Алкоголь</li><li>Корреспондент</li><li>Alcohol</li><li>Correspondent</li></ul>
	*/
       const ContrProductAlcoholClassGroup = "Contr-Product.AlcoholClass.Group"; 

	/**
	* Product.AlcoholClass.Group - Alcohol product group (Группа алкогольной продукции) <br>
	* STRING <br>
	* TAGS:<ul><li>Алкоголь</li><li>Номенклатура</li><li>Alcohol</li><li>Stock list</li></ul>
	*/
       const ProductAlcoholClassGroup = "Product.AlcoholClass.Group"; 

	/**
	* CashFlowCategory - CF item (Статья ДДС) <br>
	* STRING <br>
	* TAGS:<ul><li>Движение денежных средств</li><li>Cash flow</li></ul>
	*/
       const CashFlowCategory = "CashFlowCategory"; 

	/**
	* CashFlowCategory.Type - CF item type (Тип статьи ДДС) <br>
	* ENUM <br>
	* TAGS:<ul><li>Движение денежных средств</li><li>Cash flow</li></ul>
	*/
       const CashFlowCategoryType = "CashFlowCategory.Type"; 

	/**
	* CashFlowCategory.Hierarchy - CF items hierarchy (Иерархия статей ДДС) <br>
	* STRING <br>
	* TAGS:<ul><li>Движение денежных средств</li><li>Cash flow</li></ul>
	*/
       const CashFlowCategoryHierarchy = "CashFlowCategory.Hierarchy"; 

	/**
	* Session.CashRegister - Cash register (Касса) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const SessionCashRegister = "Session.CashRegister"; 

	/**
	* Department.Category1 - Category 1 (Категория 1) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const DepartmentCategory1 = "Department.Category1"; 

	/**
	* Department.Category2 - Category 2 (Категория 2) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const DepartmentCategory2 = "Department.Category2"; 

	/**
	* Department.Category3 - Category 3 (Категория 3) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const DepartmentCategory3 = "Department.Category3"; 

	/**
	* Department.Category4 - Category 4 (Категория 4) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const DepartmentCategory4 = "Department.Category4"; 

	/**
	* Department.Category5 - Category 5 (Категория 5) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const DepartmentCategory5 = "Department.Category5"; 

	/**
	* Contr-Product.AlcoholClass.Code - Code of alcohol product class (Код класса алкогольной продукции) <br>
	* STRING <br>
	* TAGS:<ul><li>Алкоголь</li><li>Корреспондент</li><li>Alcohol</li><li>Correspondent</li></ul>
	*/
       const ContrProductAlcoholClassCode = "Contr-Product.AlcoholClass.Code"; 

	/**
	* Product.AlcoholClass.Code - Code of alcohol product class (Код класса алкогольной продукции) <br>
	* STRING <br>
	* TAGS:<ul><li>Алкоголь</li><li>Номенклатура</li><li>Alcohol</li><li>Stock list</li></ul>
	*/
       const ProductAlcoholClassCode = "Product.AlcoholClass.Code"; 

	/**
	* Comment - Comment (Комментарий) <br>
	* STRING <br>
	* TAGS:<ul><li>Транзакция</li><li>Transaction</li></ul>
	*/
       const Comment = "Comment"; 

	/**
	* Conception - Concept (Концепция) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Организация</li><li>Company</li><li>Corporation</li></ul>
	*/
       const Conception = "Conception"; 

	/**
	* Conception.Code - Concept code (Код концепции) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Организация</li><li>Company</li><li>Corporation</li></ul>
	*/
       const ConceptionCode = "Conception.Code"; 

	/**
	* Counteragent.Name - Contractor (Контрагент) <br>
	* STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const CounteragentName = "Counteragent.Name"; 

	/**
	* Counteragent.Id - Contractor ID (ID контрагента) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const CounteragentId = "Counteragent.Id"; 

	/**
	* Account.CounteragentType - Contractor type (Тип контрагента) <br>
	* ENUM <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountCounteragentType = "Account.CounteragentType"; 

	/**
	* Contr-Account.Code - Corr. Account Code (Код корр.счета) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrAccountCode = "Contr-Account.Code"; 

	/**
	* Contr-Account.Group - Corr. Account group (Группа корр.счета) <br>
	* ENUM <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrAccountGroup = "Contr-Account.Group"; 

	/**
	* Contr-Account.Type - Corr. Account type (Тип корр.счета) <br>
	* ENUM <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrAccountType = "Contr-Account.Type"; 

	/**
	* Contr-Account.Name - Corr. Account/Storage (Корр.Счет/Склад) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrAccountName = "Contr-Account.Name"; 

	/**
	* Contr-Product.AccountingCategory - Corr. Accounting Category (Корр.Бухгалтерская категория) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductAccountingCategory = "Contr-Product.AccountingCategory"; 

	/**
	* Contr-Product.TopParent - Corr. Level 1 Stock List Group (Корр.Группа номенклатуры 1-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductTopParent = "Contr-Product.TopParent"; 

	/**
	* Contr-Product.SecondParent - Corr. Level 2 Stock List Group (Корр.Группа номенклатуры 2-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductSecondParent = "Contr-Product.SecondParent"; 

	/**
	* Contr-Product.ThirdParent - Corr. Level 3 Stock List Group (Корр.Группа номенклатуры 3-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductThirdParent = "Contr-Product.ThirdParent"; 

	/**
	* Contr-Product.MeasureUnit - Corr. Measurement Unit (Корр.Единица измерения) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductMeasureUnit = "Contr-Product.MeasureUnit"; 

	/**
	* Contr-Product.Num - Corr. SKU of item (Корр.Артикул элемента номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductNum = "Contr-Product.Num"; 

	/**
	* Contr-Product.Category - Corr. Stock List Category (Корр.Категория номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductCategory = "Contr-Product.Category"; 

	/**
	* Contr-Product.Hierarchy - Corr. Stock List Hierarchy (Корр.Иерархия номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductHierarchy = "Contr-Product.Hierarchy"; 

	/**
	* Contr-Product.Name - Corr. Stock list item (Корр.Элемент номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductName = "Contr-Product.Name"; 

	/**
	* Contr-Product.CookingPlaceType - Corr. Production Place Type (Корр.Тип места приготовления) <br>
	* STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductCookingPlaceType = "Contr-Product.CookingPlaceType"; 

	/**
	* Contr-Product.Type - Corr. Type of stock list item (Корр.Тип элемента номенклатуры) <br>
	* ENUM <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductType = "Contr-Product.Type"; 

	/**
	* Contr-Product.Id - Corr. item list ID (Корр.ID эл.номенклатуры) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductId = "Contr-Product.Id"; 

	/**
	* Contr-Product.Category.Id - Corr. of item list category ID (Корр.ID категории номенклатуры) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Корреспондент</li><li>Correspondent</li></ul>
	*/
       const ContrProductCategoryId = "Contr-Product.Category.Id"; 

	/**
	* DateTime.Typed - Date and time (Дата и время) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeTyped = "DateTime.Typed"; 

	/**
	* DateTime.DayOfWeak - Day of week (День недели) <br>
	* STRING <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeDayOfWeak = "DateTime.DayOfWeak"; 

	/**
	* TransactionSide - Debit/Credit (Дебет/Кредит) <br>
	* ENUM <br>
	* TAGS:<ul><li>Транзакция</li><li>Transaction</li></ul>
	*/
       const TransactionSide = "TransactionSide"; 

	/**
	* Document - Document No. (Номер документа) <br>
	* STRING <br>
	* TAGS:<ul><li>Транзакция</li><li>Transaction</li></ul>
	*/
       const Document = "Document"; 

	/**
	* Session.Group - Group (Группа) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const SessionGroup = "Session.Group"; 

	/**
	* DateTime.Hour - Hour (Час) <br>
	* STRING <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeHour = "DateTime.Hour"; 

	/**
	* Product.Category.Id - Item list category ID (ID категории номенклатуры) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductCategoryId = "Product.Category.Id"; 

	/**
	* Product.Id - Item list element ID (ID элемента номенклатуры) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductId = "Product.Id"; 

	/**
	* Department.JurPerson - Legal entity (Юридическое лицо) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const DepartmentJurPerson = "Department.JurPerson"; 

	/**
	* CashFlowCategory.HierarchyLevel1 - Level 1 CF item (Статья ДДС 1-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Движение денежных средств</li><li>Cash flow</li></ul>
	*/
       const CashFlowCategoryHierarchyLevel1 = "CashFlowCategory.HierarchyLevel1"; 

	/**
	* Account.AccountHierarchyTop - Level 1 account (Счет 1-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountAccountHierarchyTop = "Account.AccountHierarchyTop"; 

	/**
	* Product.TopParent - Level 1 stock list group (Группа номенклатуры 1-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductTopParent = "Product.TopParent"; 

	/**
	* CashFlowCategory.HierarchyLevel2 - Level 2 CF item (Статья ДДС 2-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Движение денежных средств</li><li>Cash flow</li></ul>
	*/
       const CashFlowCategoryHierarchyLevel2 = "CashFlowCategory.HierarchyLevel2"; 

	/**
	* Account.AccountHierarchySecond - Level 2 account (Счет 2-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountAccountHierarchySecond = "Account.AccountHierarchySecond"; 

	/**
	* Product.SecondParent - Level 2 stock list group (Группа номенклатуры 2-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductSecondParent = "Product.SecondParent"; 

	/**
	* CashFlowCategory.HierarchyLevel3 - Level 3 CF item (Статья ДДС 3-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Движение денежных средств</li><li>Cash flow</li></ul>
	*/
       const CashFlowCategoryHierarchyLevel3 = "CashFlowCategory.HierarchyLevel3"; 

	/**
	* Account.AccountHierarchyThird - Level 3 account (Счет 3-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountAccountHierarchyThird = "Account.AccountHierarchyThird"; 

	/**
	* Product.ThirdParent - Level 3 stock list group (Группа номенклатуры 3-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductThirdParent = "Product.ThirdParent"; 

	/**
	* Product.MeasureUnit - Measurement unit (Единица измерения) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductMeasureUnit = "Product.MeasureUnit"; 

	/**
	* DateTime.Month - Month (Месяц) <br>
	* STRING <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeMonth = "DateTime.Month"; 

	/**
	* OrderId - Order ID (ID заказа) <br>
	* ID <br>
	* TAGS:<ul><li>Транзакция</li><li>Transaction</li></ul>
	*/
       const OrderId = "OrderId"; 

	/**
	* Department - Store (Торговое предприятие) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const Department = "Department"; 

	/**
	* Account.IsCashFlowAccount - Participates in cash flow (Участвует ли счет в ДДС) <br>
	* ENUM <br>
	* TAGS:<ul><li>Движение денежных средств</li><li>Счета</li><li>Accounts</li><li>Cash flow</li></ul>
	*/
       const AccountIsCashFlowAccount = "Account.IsCashFlowAccount"; 

	/**
	* DateTime.Quarter - Quarter (Квартал) <br>
	* STRING <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeQuarter = "DateTime.Quarter"; 

	/**
	* Session.RestaurantSection - Section (Отделение) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const SessionRestaurantSection = "Session.RestaurantSection"; 

	/**
	* Product.Num - SKU (Артикул элемента номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductNum = "Product.Num"; 

	/**
	* Product.Category - Stock list category (Категория номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductCategory = "Product.Category"; 

	/**
	* Product.Hierarchy - Stock list hierarchy (Иерархия номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductHierarchy = "Product.Hierarchy"; 

	/**
	* Product.Name - Stock list item (Элемент номенклатуры) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductName = "Product.Name"; 

	/**
	* Product.Type - Stock list type (Тип элемента номенклатуры) <br>
	* ENUM <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductType = "Product.Type"; 

	/**
	* Store - Storage (Склад) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const Store = "Store"; 

	/**
	* Account.StoreOrAccount - Storage/account (Склад/счет) <br>
	* ENUM <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountStoreOrAccount = "Account.StoreOrAccount"; 

	/**
	* Department.Code - Subdivision code (Код подразделения) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const DepartmentCode = "Department.Code"; 

	/**
	* TransactionType.Code - Transaction code (Код транзакции) <br>
	* OBJECT <br>
	* TAGS:<ul><li>Транзакция</li><li>Transaction</li></ul>
	*/
       const TransactionTypeCode = "TransactionType.Code"; 

	/**
	* TransactionType - Transaction type (Тип транзакции) <br>
	* ENUM <br>
	* TAGS:<ul><li>Транзакция</li><li>Transaction</li></ul>
	*/
       const TransactionType = "TransactionType"; 

	/**
	* Contr-Product.AlcoholClass.Type - Type of alcohol products (Тип алкогольной продукции) <br>
	* ENUM <br>
	* TAGS:<ul><li>Алкоголь</li><li>Корреспондент</li><li>Alcohol</li><li>Correspondent</li></ul>
	*/
       const ContrProductAlcoholClassType = "Contr-Product.AlcoholClass.Type"; 

	/**
	* Product.AlcoholClass.Type - Type of alcohol products (Тип алкогольной продукции) <br>
	* ENUM <br>
	* TAGS:<ul><li>Алкоголь</li><li>Номенклатура</li><li>Alcohol</li><li>Stock list</li></ul>
	*/
       const ProductAlcoholClassType = "Product.AlcoholClass.Type"; 

	/**
	* Product.CookingPlaceType - Production place type (Тип места приготовления) <br>
	* STRING <br>
	* TAGS:<ul><li>Номенклатура</li><li>Stock list</li></ul>
	*/
       const ProductCookingPlaceType = "Product.CookingPlaceType"; 

	/**
	* DateTime.WeekInMonth - Week of month (Неделя месяца) <br>
	* STRING <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeWeekInMonth = "DateTime.WeekInMonth"; 

	/**
	* DateTime.WeekInYear - Week No. (Неделя года) <br>
	* STRING <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeWeekInYear = "DateTime.WeekInYear"; 

	/**
	* DateTime.Year - Year (Год) <br>
	* STRING <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateTimeYear = "DateTime.Year"; 

	/**
	* Account.Id - Account ID (ID счета) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const AccountId = "Account.Id"; 

	/**
	* Session.GroupId - Group ID (ID группы) <br>
	* ID <br>
	* TAGS:<ul><li>Корпорация</li><li>Corporation</li></ul>
	*/
       const SessionGroupId = "Session.GroupId"; 

	/**
	* OrderNum - Order number (Номер заказа) <br>
	* STRING <br>
	* TAGS:<ul><li>Транзакция</li><li>Transaction</li></ul>
	*/
       const OrderNum = "OrderNum"; 

	/**
	* DateSecondary.DateTyped - Transaction date (Дата проводки) <br>
	* DATE <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateSecondaryDateTyped = "DateSecondary.DateTyped"; 

	/**
	* DateSecondary.DateTimeTyped - Transaction date and time (Дата и время проводки) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Дата и время</li><li>Date and time</li></ul>
	*/
       const DateSecondaryDateTimeTyped = "DateSecondary.DateTimeTyped"; 

}