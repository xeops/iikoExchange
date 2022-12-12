<?php
namespace iikoExchangeBundle\Library\Request\iiko\Report\Delco;


class GroupFields
{


	/**
	* CloseTime.Minutes15 - 15-minute closing interval (15-минутный интервал закрытия) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const CloseTimeMinutes15 = "CloseTime.Minutes15"; 

	/**
	* OpenTime.Minutes15 - 15-minute opening interval (15-минутный интервал открытия) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const OpenTimeMinutes15 = "OpenTime.Minutes15"; 

	/**
	* OpenDate.Typed - Accounting day (Учетный день) <br>
	* DATE <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const OpenDateTyped = "OpenDate.Typed"; 

	/**
	* Delivery.ActualTime - Actual delivery time (Фактическое время доставки) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryActualTime = "Delivery.ActualTime"; 

	/**
	* Delivery.Address - Address (Адрес) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryAddress = "Delivery.Address"; 

	/**
	* Delivery.ExternalCartographyId - Address ID (Идентификатор адреса) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryExternalCartographyId = "Delivery.ExternalCartographyId"; 

	/**
	* Delivery.MarketingSource - Ad (Реклама) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryMarketingSource = "Delivery.MarketingSource"; 

	/**
	* Card - Authorization card (Карта авторизации) <br>
	* STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const Card = "Card"; 

	/**
	* AuthUser - Authorized by (Авторизовал) <br>
	* STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const AuthUser = "AuthUser"; 

	/**
	* AuthUser.Id - Authorized by ID (ID авторизовавшего) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const AuthUserId = "AuthUser.Id"; 

	/**
	* Banquet - Banquet (Банкет) <br>
	* ENUM <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const Banquet = "Banquet"; 

	/**
	* Bonus.CardNumber - Loyalty card No. (Номер бонусной карты) <br>
	* STRING <br>
	* TAGS:<ul><li>Бонусы</li><li>Bonus/Rewards</li></ul>
	*/
       const BonusCardNumber = "Bonus.CardNumber"; 

	/**
	* Bonus.Type - Rewards type (Тип бонуса) <br>
	* STRING <br>
	* TAGS:<ul><li>Бонусы</li><li>Bonus/Rewards</li></ul>
	*/
       const BonusType = "Bonus.Type"; 

	/**
	* CashRegisterName - Cash register (Касса) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const CashRegisterName = "CashRegisterName"; 

	/**
	* CashLocation - Cash register location (Расположение кассы) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const CashLocation = "CashLocation"; 

	/**
	* CashRegisterName.Number - Cash register No. (Номер кассы) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const CashRegisterNameNumber = "CashRegisterName.Number"; 

	/**
	* SessionID - Till shift ID (ID кассовой смены) <br>
	* ID <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const SessionID = "SessionID"; 

	/**
	* Cashier - Cashier (Кассир) <br>
	* STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const Cashier = "Cashier"; 

	/**
	* Cashier.Id - Cashier ID (ID кассира) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const CashierId = "Cashier.Id"; 

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
	* Delivery.City - City (Город) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryCity = "Delivery.City"; 

	/**
	* HourClose - Closing hour (Час закрытия) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const HourClose = "HourClose"; 

	/**
	* CloseTime - Closing time (Время закрытия) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Заказ</li><li>Order</li><li>Time</li></ul>
	*/
       const CloseTime = "CloseTime"; 

	/**
	* Delivery.CustomerComment - Comment on customer (Комментарий к клиенту) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Доставка</li><li>Delivery</li><li>Guests</li></ul>
	*/
       const DeliveryCustomerComment = "Delivery.CustomerComment"; 

	/**
	* CreditUser.Company - Contractor (Компания-контрагент) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Сотрудники</li><li>Employees</li><li>Payment</li></ul>
	*/
       const CreditUserCompany = "CreditUser.Company"; 

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
	* Delivery.CookingFinishTime - Cooking finished at (Время окончания приготовления) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Приготовление</li><li>Delivery</li><li>Preparation</li><li>Time</li></ul>
	*/
       const DeliveryCookingFinishTime = "Delivery.CookingFinishTime"; 

	/**
	* Delivery.AvgCourierMark - Driver rating, % (Оценка курьера, %) <br>
	* AMOUNT <br>
	* TAGS:<ul><li>Доставка</li><li>Отзывы клиентов</li><li>Customer feedback</li><li>Delivery</li></ul>
	*/
       const DeliveryAvgCourierMark = "Delivery.AvgCourierMark"; 

	/**
	* CardType - Credit card (Кредитная карта) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const CardType = "CardType"; 

	/**
	* CreditUser - Credited to... (В кредит на...) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Сотрудники</li><li>Employees</li><li>Payment</li></ul>
	*/
       const CreditUser = "CreditUser"; 

	/**
	* Currencies.Currency - Payment currency (Валюта оплаты) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const CurrenciesCurrency = "Currencies.Currency"; 

	/**
	* Currencies.CurrencyRate - Payment exchange rate (Курс валюты оплаты) <br>
	* MONEY <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const CurrenciesCurrencyRate = "Currencies.CurrencyRate"; 

	/**
	* Delivery.CustomerMarketingSource - Customer ad (Реклама клиента) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Доставка</li><li>Клиент доставки</li><li>Delivery</li><li>Delivery customer</li><li>Guests</li></ul>
	*/
       const DeliveryCustomerMarketingSource = "Delivery.CustomerMarketingSource"; 

	/**
	* Delivery.CustomerCardNumber - Customer card No. (Номер карты клиента) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Доставка</li><li>Клиент доставки</li><li>Delivery</li><li>Delivery customer</li><li>Guests</li></ul>
	*/
       const DeliveryCustomerCardNumber = "Delivery.CustomerCardNumber"; 

	/**
	* Delivery.CustomerCardType - Customer card type (Тип карты клиента) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Доставка</li><li>Клиент доставки</li><li>Delivery</li><li>Delivery customer</li><li>Guests</li></ul>
	*/
       const DeliveryCustomerCardType = "Delivery.CustomerCardType"; 

	/**
	* Delivery.CustomerCreatedDateTyped - Customer registration date (Дата создания клиента) <br>
	* DATE <br>
	* TAGS:<ul><li>Гости</li><li>Доставка</li><li>Клиент доставки</li><li>Delivery</li><li>Delivery customer</li><li>Guests</li></ul>
	*/
       const DeliveryCustomerCreatedDateTyped = "Delivery.CustomerCreatedDateTyped"; 

	/**
	* Delivery.CustomerName - Customer full name (ФИО клиента) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryCustomerName = "Delivery.CustomerName"; 

	/**
	* PriceCategory - Customer price category (Ценовая категория клиента) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const PriceCategory = "PriceCategory"; 

	/**
	* DayOfWeekOpen - Day of week (День недели) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const DayOfWeekOpen = "DayOfWeekOpen"; 

	/**
	* Delivery.IsDelivery - Delivery (Доставка) <br>
	* ENUM <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryIsDelivery = "Delivery.IsDelivery"; 

	/**
	* Delivery.CancelComment - Delivery cancellation comment (Комментарий к отмене доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryCancelComment = "Delivery.CancelComment"; 

	/**
	* Delivery.CancelCause - Delivery cancellation reason (Причина отмены доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryCancelCause = "Delivery.CancelCause"; 

	/**
	* Delivery.CloseTime - Delivery closing time (Время закрытия доставки) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryCloseTime = "Delivery.CloseTime"; 

	/**
	* Delivery.DeliveryComment - Delivery comment (Комментарий к доставке) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryDeliveryComment = "Delivery.DeliveryComment"; 

	/**
	* Delivery.Delay - Delivery delay (min) (Опоздание доставки(мин)) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryDelay = "Delivery.Delay"; 

	/**
	* Delivery.DiffBetweenActualDeliveryTimeAndPredictedDeliveryTime - Delivery delay, actual vs forecast (min) (Отклонение от сроков доставки, фактическое от прогнозируемого (мин)) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryDiffBetweenActualDeliveryTimeAndPredictedDeliveryTime = "Delivery.DiffBetweenActualDeliveryTimeAndPredictedDeliveryTime"; 

	/**
	* Delivery.SendTime - Delivery dispatch time (Время отправки доставки) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliverySendTime = "Delivery.SendTime"; 

	/**
	* Delivery.Email - Delivery email (e-mail доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Клиент доставки</li><li>Delivery</li><li>Delivery customer</li></ul>
	*/
       const DeliveryEmail = "Delivery.Email"; 

	/**
	* Delivery.DeliveryOperator - Delivery operator (Оператор доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryDeliveryOperator = "Delivery.DeliveryOperator"; 

	/**
	* Delivery.DeliveryOperator.Id - Delivery operator ID (ID оператора доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryDeliveryOperatorId = "Delivery.DeliveryOperator.Id"; 

	/**
	* Delivery.Phone - Delivery phone number (Телефон доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Клиент доставки</li><li>Delivery</li><li>Delivery customer</li></ul>
	*/
       const DeliveryPhone = "Delivery.Phone"; 

	/**
	* Delivery.PrintTime - Delivery print time (Время печати доставки) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryPrintTime = "Delivery.PrintTime"; 

	/**
	* Delivery.AvgMark - Delivery rating, % (Оценка доставки, %) <br>
	* AMOUNT <br>
	* TAGS:<ul><li>Доставка</li><li>Отзывы клиентов</li><li>Customer feedback</li><li>Delivery</li></ul>
	*/
       const DeliveryAvgMark = "Delivery.AvgMark"; 

	/**
	* Delivery.SourceKey - Delivery source (Источник доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliverySourceKey = "Delivery.SourceKey"; 

	/**
	* Delivery.ServiceType - Delivery type (Тип доставки) <br>
	* ENUM <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryServiceType = "Delivery.ServiceType"; 

	/**
	* Department.Id - Department ID (ID подразделения) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Организация</li><li>Company</li><li>Corporation</li></ul>
	*/
       const DepartmentId = "Department.Id"; 

	/**
	* DiscountPercent - Discount % (Процент скидки) <br>
	* PERCENT <br>
	* TAGS:<ul><li>Оплата</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Payment</li></ul>
	*/
       const DiscountPercent = "DiscountPercent"; 

	/**
	* OrderDiscount.Type - Discount type (Тип скидки) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const OrderDiscountType = "OrderDiscount.Type"; 

	/**
	* OrderDiscount.Type.IDs - Discount type (ID) (ID типов скидок) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const OrderDiscountTypeIDs = "OrderDiscount.Type.IDs"; 

	/**
	* Delivery.Courier - Driver (Курьер) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryCourier = "Delivery.Courier"; 

	/**
	* Delivery.Courier.Id - Driver ID (ID курьера) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryCourierId = "Delivery.Courier.Id"; 

	/**
	* CashRegisterName.CashRegisterSerialNumber - FCR serial No. (Серийный номер ФР) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const CashRegisterNameCashRegisterSerialNumber = "CashRegisterName.CashRegisterSerialNumber"; 

	/**
	* PayTypes.IsPrintCheque - Fiscal payment type (Фиск. тип оплаты) <br>
	* ENUM <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const PayTypesIsPrintCheque = "PayTypes.IsPrintCheque"; 

	/**
	* Delivery.PredictedDeliveryTime - Estimated delivery time (Прогнозируемое время доставки) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryPredictedDeliveryTime = "Delivery.PredictedDeliveryTime"; 

	/**
	* Delivery.PredictedCookingCompleteTime - Estimated order readiness time (Прогнозируемое время окончания готовки заказа) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryPredictedCookingCompleteTime = "Delivery.PredictedCookingCompleteTime"; 

	/**
	* Store.Name - From storage (Со склада) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const StoreName = "Store.Name"; 

	/**
	* DishFullName - Full name of item (Полное наименование блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishFullName = "DishFullName"; 

	/**
	* RestorauntGroup - Group (Группа) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const RestorauntGroup = "RestorauntGroup"; 

	/**
	* PrechequeTime - Guest bill time (Время пречека) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Заказ</li><li>Order</li><li>Time</li></ul>
	*/
       const PrechequeTime = "PrechequeTime"; 

	/**
	* OrderDiscount.GuestCard - Guest card (Гостевая карта) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const OrderDiscountGuestCard = "OrderDiscount.GuestCard"; 

	/**
	* CardOwner - Loyalty card holder (Владелец карты гостя) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Guests</li></ul>
	*/
       const CardOwner = "CardOwner"; 

	/**
	* DishTaxCategory.Id - ID tax bracket (ID налоговой категории) <br>
	* ID <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishTaxCategoryId = "DishTaxCategory.Id"; 

	/**
	* Delivery.BillTime - Invoice print time (Время печати накладной) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryBillTime = "Delivery.BillTime"; 

	/**
	* DishName - Item (Блюдо) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishName = "DishName"; 

	/**
	* DishId - Item ID (ID блюда) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishId = "DishId"; 

	/**
	* DishCategory.Accounting - Item accounting category (Бухгалтерская категория блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishCategoryAccounting = "DishCategory.Accounting"; 

	/**
	* DishCategory - Item category (Категория блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishCategory = "DishCategory"; 

	/**
	* DishCategory.Id - Item category ID (ID категории блюда) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishCategoryId = "DishCategory.Id"; 

	/**
	* DishCode - Item code (Код блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishCode = "DishCode"; 

	/**
	* Comment - Item comment (Комментарий к блюду) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const Comment = "Comment"; 

	/**
	* DeletedWithWriteoff - Item deleted (Блюдо удалено) <br>
	* ENUM <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DeletedWithWriteoff = "DeletedWithWriteoff"; 

	/**
	* DeletionComment - Item deletion comment (Комментарий к удалению блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const DeletionComment = "DeletionComment"; 

	/**
	* DishGroup - Item group (Группа блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishGroup = "DishGroup"; 

	/**
	* DishGroup.Num - Item group code (Код группы блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishGroupNum = "DishGroup.Num"; 

	/**
	* DishGroup.Hierarchy - Item hierarchy (Иерархия блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishGroupHierarchy = "DishGroup.Hierarchy"; 

	/**
	* DishForeignName - Item name in foreign language (Наименование блюда на иностранном языке) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishForeignName = "DishForeignName"; 

	/**
	* DishCode.Quick - Item quick code (Код быстрого набора блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishCodeQuick = "DishCode.Quick"; 

	/**
	* DishSize.Name - Item size (Размер блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishSizeName = "DishSize.Name"; 

	/**
	* DishSize.Id - Item size ID (ID размера блюда) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishSizeId = "DishSize.Id"; 

	/**
	* DishSize.ShortName - Item size code (Код размера блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishSizeShortName = "DishSize.ShortName"; 

	/**
	* DishSize.Scale.Id - Item size scale ID (ID шкалы размеров блюда) <br>
	* ID <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishSizeScaleId = "DishSize.Scale.Id"; 

	/**
	* DishSize.Priority - Item size No. (Порядковый номер размера блюда) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishSizePriority = "DishSize.Priority"; 

	/**
	* DishSize.Scale.Name - Item sizes scale (Шкала размеров блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishSizeScaleName = "DishSize.Scale.Name"; 

	/**
	* WaiterName - Item waiter (Официант блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const WaiterName = "WaiterName"; 

	/**
	* WaiterName.ID - Item waiter ID (ID официанта блюда) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const WaiterNameID = "WaiterName.ID"; 

	/**
	* Delivery.AvgFoodMark - Kitchen rating, % (Оценка кухни, %) <br>
	* AMOUNT <br>
	* TAGS:<ul><li>Доставка</li><li>Отзывы клиентов</li><li>Customer feedback</li><li>Delivery</li></ul>
	*/
       const DeliveryAvgFoodMark = "Delivery.AvgFoodMark"; 

	/**
	* JurName - Legal entity (Юридическое лицо) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Организация</li><li>Company</li><li>Corporation</li></ul>
	*/
       const JurName = "JurName"; 

	/**
	* DishGroup.TopParent - Level 1 item group (Группа блюда 1-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishGroupTopParent = "DishGroup.TopParent"; 

	/**
	* DishGroup.SecondParent - Level 2 item group (Группа блюда 2-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishGroupSecondParent = "DishGroup.SecondParent"; 

	/**
	* DishGroup.ThirdParent - Level 3 item group (Группа блюда 3-го уровня) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishGroupThirdParent = "DishGroup.ThirdParent"; 

	/**
	* SoldWithDish.Id - Main item ID (ID основного блюда) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const SoldWithDishId = "SoldWithDish.Id"; 

	/**
	* DishMeasureUnit - Measurement unit (Единица измерения) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishMeasureUnit = "DishMeasureUnit"; 

	/**
	* Mounth - Month (Месяц) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const Mounth = "Mounth"; 

	/**
	* NonCashPaymentType - Non-cash payment type (Безналичный тип оплаты) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const NonCashPaymentType = "NonCashPaymentType"; 

	/**
	* Delivery.Number - Delivery No. (Номер доставки) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryNumber = "Delivery.Number"; 

	/**
	* GuestNum - Number of guests (Количество гостей) <br>
	* AMOUNT <br>
	* TAGS:<ul><li>Гости</li><li>Guests</li></ul>
	*/
       const GuestNum = "GuestNum"; 

	/**
	* DishAmountInt - Number of ﻿items (Количество блюд) <br>
	* AMOUNT <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const DishAmountInt = "DishAmountInt"; 

	/**
	* HourOpen - Opening hour (Час открытия) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const HourOpen = "HourOpen"; 

	/**
	* OpenTime - Opening time (Время открытия) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Заказ</li><li>Order</li><li>Time</li></ul>
	*/
       const OpenTime = "OpenTime"; 

	/**
	* OperationType - Operation (Операция) <br>
	* ENUM <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const OperationType = "OperationType"; 

	/**
	* Delivery.AvgOperatorMark - Operator rating, % (Оценка оператора, %) <br>
	* AMOUNT <br>
	* TAGS:<ul><li>Доставка</li><li>Отзывы клиентов</li><li>Customer feedback</li><li>Delivery</li></ul>
	*/
       const DeliveryAvgOperatorMark = "Delivery.AvgOperatorMark"; 

	/**
	* UniqOrderId.Id - Order ID (ID заказа) <br>
	* ID <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const UniqOrderIdId = "UniqOrderId.Id"; 

	/**
	* OrderDeleted - Order deleted (Заказ удален) <br>
	* ENUM <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const OrderDeleted = "OrderDeleted"; 

	/**
	* OriginName - Order origin (Источник заказа) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const OriginName = "OriginName"; 

	/**
	* OrderType - Order type (Тип заказа) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const OrderType = "OrderType"; 

	/**
	* OrderWaiter.Id - Order waiter ID (ID официанта заказа) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Сотрудники</li><li>Employees</li><li>Order</li></ul>
	*/
       const OrderWaiterId = "OrderWaiter.Id"; 

	/**
	* Department - Store (Торговое предприятие) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Организация</li><li>Company</li><li>Corporation</li></ul>
	*/
       const Department = "Department"; 

	/**
	* CardNumber - Payment card No. (Номер карты оплаты) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const CardNumber = "CardNumber"; 

	/**
	* PayTypes.Group - Payment group (Группа оплаты) <br>
	* ENUM <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const PayTypesGroup = "PayTypes.Group"; 

	/**
	* PayTypes - Payment type (Тип оплаты) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const PayTypes = "PayTypes"; 

	/**
	* PayTypes.GUID - Payment type (ID) (ID типа оплаты) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const PayTypesGUID = "PayTypes.GUID"; 

	/**
	* PayTypes.Combo - Payment type (split) (Тип оплаты (комб.)) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const PayTypesCombo = "PayTypes.Combo"; 

	/**
	* Delivery.ExpectedTime - Planned delivery time (Планируемое время доставки) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryExpectedTime = "Delivery.ExpectedTime"; 

	/**
	* Delivery.Index - Postcode (Индекс адреса) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryIndex = "Delivery.Index"; 

	/**
	* PriceCategoryCard - Price Category Card No. (ЦК номер карты) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const PriceCategoryCard = "PriceCategoryCard"; 

	/**
	* PriceCategoryUserCardOwner - Price Category Contractor (ЦК контрагент) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const PriceCategoryUserCardOwner = "PriceCategoryUserCardOwner"; 

	/**
	* PriceCategoryDiscountCardOwner - Price Category Cardholder (ЦК владелец карты) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const PriceCategoryDiscountCardOwner = "PriceCategoryDiscountCardOwner"; 

	/**
	* CookingPlace - Production place (Место приготовления) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const CookingPlace = "CookingPlace"; 

	/**
	* QuarterOpen - Quarter (Квартал) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const QuarterOpen = "QuarterOpen"; 

	/**
	* RemovalType - Item deletion reason (Причина удаления блюда) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const RemovalType = "RemovalType"; 

	/**
	* OrderNum - Receipt No. (Номер чека) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const OrderNum = "OrderNum"; 

	/**
	* Delivery.Region - Zone (Район) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryRegion = "Delivery.Region"; 

	/**
	* RestaurantSection - Section (Отделение) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const RestaurantSection = "RestaurantSection"; 

	/**
	* @deprecated 
	* RestaurantGroup.Id - RestaurantGroup.Id (RestaurantGroup.Id) <br>
	* string <br>
	*/
       const RestaurantGroupId = "RestaurantGroup.Id"; 

	/**
	* DishServicePrintTime - Item service printing (Сервисная печать блюда) <br>
	* DATETIME <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const DishServicePrintTime = "DishServicePrintTime"; 

	/**
	* Cooking.ServeNumber - Course No. (Номер подачи) <br>
	* STRING <br>
	* TAGS:<ul><li>Приготовление</li><li>Preparation</li></ul>
	*/
       const CookingServeNumber = "Cooking.ServeNumber"; 

	/**
	* OrderTime.OrderLength - Serving time (min) (Время обслуживания (мин)) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Время</li><li>Заказ</li><li>Order</li><li>Time</li></ul>
	*/
       const OrderTimeOrderLength = "OrderTime.OrderLength"; 

	/**
	* SessionNum - Shift No. (Номер смены) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const SessionNum = "SessionNum"; 

	/**
	* SoldWithDish - Sold with item (Продано с блюдом) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const SoldWithDish = "SoldWithDish"; 

	/**
	* DishType - Stock list type (Тип товара) <br>
	* ENUM <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishType = "DishType"; 

	/**
	* Delivery.Street - Street (Улица) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryStreet = "Delivery.Street"; 

	/**
	* Department.Code - Subdivision code (Код подразделения) <br>
	* STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Организация</li><li>Company</li><li>Corporation</li></ul>
	*/
       const DepartmentCode = "Department.Code"; 

	/**
	* IncreaseSum - Surcharge amount (Сумма надбавки) <br>
	* MONEY <br>
	* TAGS:<ul><li>Оплата</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Payment</li></ul>
	*/
       const IncreaseSum = "IncreaseSum"; 

	/**
	* IncreasePercent - Surcharge % (Процент надбавки) <br>
	* PERCENT <br>
	* TAGS:<ul><li>Оплата</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Payment</li></ul>
	*/
       const IncreasePercent = "IncreasePercent"; 

	/**
	* TableNum - Table No. (Номер стола) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const TableNum = "TableNum"; 

	/**
	* DishTaxCategory.Name - Tax category (Налоговая категория) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishTaxCategoryName = "DishTaxCategory.Name"; 

	/**
	* OrderTime.PrechequeLength - Time in guest bill (min) (Время в пречеке (мин)) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Время</li><li>Заказ</li><li>Order</li><li>Time</li></ul>
	*/
       const OrderTimePrechequeLength = "OrderTime.PrechequeLength"; 

	/**
	* StoreTo - To storage (На склад) <br>
	* STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const StoreTo = "StoreTo"; 

	/**
	* Delivery.WayDuration - Travel time (min) (Время в пути(мин)) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Время</li><li>Доставка</li><li>Delivery</li><li>Time</li></ul>
	*/
       const DeliveryWayDuration = "Delivery.WayDuration"; 

	/**
	* CookingPlaceType - Production place type (Тип места приготовления) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const CookingPlaceType = "CookingPlaceType"; 

	/**
	* OrderIncrease.Type - Surcharge type (Тип надбавки) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const OrderIncreaseType = "OrderIncrease.Type"; 

	/**
	* OrderIncrease.Type.IDs - Type of surcharge (ID) (ID типов надбавок) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Guests</li></ul>
	*/
       const OrderIncreaseTypeIDs = "OrderIncrease.Type.IDs"; 

	/**
	* @deprecated 
	* VAT.Sum - VAT.Sum (VAT.Sum) <br>
	* string <br>
	*/
       const VATSum = "VAT.Sum"; 

	/**
	* VAT.Percent - VAT(%) (НДС(%)) <br>
	* PERCENT <br>
	* TAGS:<ul><li>НДС</li><li>Оплата</li><li>Payment</li><li>VAT</li></ul>
	*/
       const VATPercent = "VAT.Percent"; 

	/**
	* DishReturnSum - Refund amount (Сумма возврата) <br>
	* MONEY <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const DishReturnSum = "DishReturnSum"; 

	/**
	* Storned - Receipt voiding (Возврат чека) <br>
	* ENUM <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const Storned = "Storned"; 

	/**
	* OrderWaiter.Name - Waiter for the order (Официант заказа) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Сотрудники</li><li>Employees</li><li>Order</li></ul>
	*/
       const OrderWaiterName = "OrderWaiter.Name"; 

	/**
	* WeekInMonthOpen - Week of month (Неделя месяца) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const WeekInMonthOpen = "WeekInMonthOpen"; 

	/**
	* WeekInYearOpen - Week No. (Неделя года) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const WeekInYearOpen = "WeekInYearOpen"; 

	/**
	* WriteoffReason - Write-off reason (Причина списания) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const WriteoffReason = "WriteoffReason"; 

	/**
	* WriteoffUser - Written off to employee (Списано на сотрудника) <br>
	* STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const WriteoffUser = "WriteoffUser"; 

	/**
	* YearOpen - Year (Год) <br>
	* STRING <br>
	* TAGS:<ul><li>Время</li><li>Time</li></ul>
	*/
       const YearOpen = "YearOpen"; 

	/**
	* CardTypeName - Card type (Тип карты) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const CardTypeName = "CardTypeName"; 

	/**
	* Cashier.Code - Cashier ID (Табельный номер кассира) <br>
	* STRING <br>
	* TAGS:<ul><li>Сотрудники</li><li>Employees</li></ul>
	*/
       const CashierCode = "Cashier.Code"; 

	/**
	* Counteragent.Name - Contractor (Контрагент) <br>
	* STRING <br>
	* TAGS:<ul><li>Счета</li><li>Accounts</li></ul>
	*/
       const CounteragentName = "Counteragent.Name"; 

	/**
	* Delivery.CustomerOpinionComment - Customer feedback (Отзыв клиента) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Отзывы клиентов</li><li>Customer feedback</li><li>Delivery</li></ul>
	*/
       const DeliveryCustomerOpinionComment = "Delivery.CustomerOpinionComment"; 

	/**
	* Delivery.CustomerPhone - Customer phone number (Телефон клиента) <br>
	* STRING <br>
	* TAGS:<ul><li>Гости</li><li>Доставка</li><li>Клиент доставки</li><li>Delivery</li><li>Delivery customer</li><li>Guests</li></ul>
	*/
       const DeliveryCustomerPhone = "Delivery.CustomerPhone"; 

	/**
	* Delivery.Id - Delivery ID (ID доставки) <br>
	* ID <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryId = "Delivery.Id"; 

	/**
	* Delivery.EcsService - Delivery Service (Курьерская служба) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryEcsService = "Delivery.EcsService"; 

	/**
	* Delivery.Zone - Delivery area (Зона доставки) <br>
	* STRING <br>
	* TAGS:<ul><li>Доставка</li><li>Delivery</li></ul>
	*/
       const DeliveryZone = "Delivery.Zone"; 

	/**
	* ExternalNumber - External order No. (Внешний номер заказа) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const ExternalNumber = "ExternalNumber"; 

	/**
	* FiscalChequeNumber - Fiscal receipt No. (Номер фиск. чека) <br>
	* INTEGER <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const FiscalChequeNumber = "FiscalChequeNumber"; 

	/**
	* RestorauntGroup.Id - Group ID (ID группы) <br>
	* ID <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const RestorauntGroupId = "RestorauntGroup.Id"; 

	/**
	* DishCategory.Accounting.Id - Item accounting category ID (ID бухгалтерской категории блюда) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishCategoryAccountingId = "DishCategory.Accounting.Id"; 

	/**
	* DishGroup.Id - Item group ID (ID группы блюда) <br>
	* ID <br>
	* TAGS:<ul><li>Блюда</li><li>Items</li></ul>
	*/
       const DishGroupId = "DishGroup.Id"; 

	/**
	* ItemSaleEventDiscountType - Name of discount or surcharge (Наименование скидки, надбавки) <br>
	* STRING <br>
	* TAGS:<ul><li>Блюда</li><li>Скидки/надбавки</li><li>Discounts/surcharges</li><li>Items</li></ul>
	*/
       const ItemSaleEventDiscountType = "ItemSaleEventDiscountType"; 

	/**
	* OrderComment - Order comment (Комментарий заказа) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const OrderComment = "OrderComment"; 

	/**
	* ItemSaleEvent.Id - Order item ID (ID позиции заказа) <br>
	* ID <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const ItemSaleEventId = "ItemSaleEvent.Id"; 

	/**
	* SoldWithItem.Id - Order item ID of main item (ID позиции заказа основного блюда) <br>
	* ID <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const SoldWithItemId = "SoldWithItem.Id"; 

	/**
	* OrderType.Id - Order type ID (ID типа заказа) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const OrderTypeId = "OrderType.Id"; 

	/**
	* PaymentTransaction.Id - Payment transaction ID (ID проводки оплаты) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const PaymentTransactionId = "PaymentTransaction.Id"; 

	/**
	* PaymentTransaction.Ids - Payment transactions IDs (comb.) (ID проводок оплат (комб.)) <br>
	* STRING <br>
	* TAGS:<ul><li>Оплата</li><li>Payment</li></ul>
	*/
       const PaymentTransactionIds = "PaymentTransaction.Ids"; 

	/**
	* PublicExternalData - Plugin public data (Публичные данные плагинов) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const PublicExternalData = "PublicExternalData"; 

	/**
	* PublicExternalData.Xml - Plugin public data (XML) (Публичные данные плагинов (xml)) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const PublicExternalDataXml = "PublicExternalData.Xml"; 

	/**
	* CookingPlace.Id - Production place ID (ID места приготовления) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const CookingPlaceId = "CookingPlace.Id"; 

	/**
	* RestaurantSection.Id - Section ID (ID отделения) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Организация</li><li>Company</li></ul>
	*/
       const RestaurantSectionId = "RestaurantSection.Id"; 

	/**
	* OrderServiceType - Service mode (Режим обслуживания) <br>
	* ENUM <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const OrderServiceType = "OrderServiceType"; 

	/**
	* Store.Id - Storage ID (ID склада) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Корпорация</li><li>Организация</li><li>Company</li><li>Corporation</li></ul>
	*/
       const StoreId = "Store.Id"; 

	/**
	* WaiterTeam.Name - Waiter Team (Бригада официантов) <br>
	* STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Сотрудники</li><li>Employees</li><li>Order</li></ul>
	*/
       const WaiterTeamName = "WaiterTeam.Name"; 

	/**
	* WaiterTeam.Id - Waiter Team ID (ID бригады официантов) <br>
	* ID_STRING <br>
	* TAGS:<ul><li>Заказ</li><li>Сотрудники</li><li>Employees</li><li>Order</li></ul>
	*/
       const WaiterTeamId = "WaiterTeam.Id"; 

	/**
	* NonCashPaymentType.DocumentType - Write-off document type (Тип документа списания) <br>
	* ENUM <br>
	* TAGS:<ul><li>Заказ</li><li>Order</li></ul>
	*/
       const NonCashPaymentTypeDocumentType = "NonCashPaymentType.DocumentType"; 

}