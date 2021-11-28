<?php
namespace iikoExchangeBundle\Library\Request\iiko\Report\Delco;
class GroupFields { 
       /** CloseTime.Minutes15 STRING */ 
       /** 15-minutes closing interval */ 
       /** @var string CloseTimeMinutes15 */ 
       const CloseTimeMinutes15 = "CloseTime.Minutes15"; 

       /** OpenTime.Minutes15 STRING */ 
       /** 15-minutes opening interval */ 
       /** @var string OpenTimeMinutes15 */ 
       const OpenTimeMinutes15 = "OpenTime.Minutes15"; 

       /** OpenDate.Typed DATE */ 
       /** Accounting day */ 
       /** @var string OpenDateTyped */ 
       const OpenDateTyped = "OpenDate.Typed"; 

       /** Delivery.ActualTime DATETIME */ 
       /** Actual delivery time */ 
       /** @var string DeliveryActualTime */ 
       const DeliveryActualTime = "Delivery.ActualTime"; 

       /** Delivery.Address STRING */ 
       /** Address */ 
       /** @var string DeliveryAddress */ 
       const DeliveryAddress = "Delivery.Address"; 

       /** Delivery.ExternalCartographyId STRING */ 
       /** Address ID */ 
       /** @var string DeliveryExternalCartographyId */ 
       const DeliveryExternalCartographyId = "Delivery.ExternalCartographyId"; 

       /** Delivery.MarketingSource STRING */ 
       /** Advertising */ 
       /** @var string DeliveryMarketingSource */ 
       const DeliveryMarketingSource = "Delivery.MarketingSource"; 

       /** Card STRING */ 
       /** Authorisation card */ 
       /** @var string Card */ 
       const Card = "Card"; 

       /** AuthUser STRING */ 
       /** Authorised by */ 
       /** @var string AuthUser */ 
       const AuthUser = "AuthUser"; 

       /** AuthUser.Id ID */ 
       /** Authorised by ID */ 
       /** @var string AuthUserId */ 
       const AuthUserId = "AuthUser.Id"; 

       /** Banquet ENUM */ 
       /** Banquet */ 
       /** @var string Banquet */ 
       const Banquet = "Banquet"; 

       /** Bonus.CardNumber STRING */ 
       /** Bonus card number */ 
       /** @var string BonusCardNumber */ 
       const BonusCardNumber = "Bonus.CardNumber"; 

       /** Bonus.Type STRING */ 
       /** Bonus type */ 
       /** @var string BonusType */ 
       const BonusType = "Bonus.Type"; 

       /** CashRegisterName STRING */ 
       /** Cash register */ 
       /** @var string CashRegisterName */ 
       const CashRegisterName = "CashRegisterName"; 

       /** CashLocation STRING */ 
       /** Cash register location */ 
       /** @var string CashLocation */ 
       const CashLocation = "CashLocation"; 

       /** CashRegisterName.Number INTEGER */ 
       /** Cash register number */ 
       /** @var string CashRegisterNameNumber */ 
       const CashRegisterNameNumber = "CashRegisterName.Number"; 

       /** SessionID ID */ 
       /** Cash register shift ID */ 
       /** @var string SessionID */ 
       const SessionID = "SessionID"; 

       /** Cashier STRING */ 
       /** Cashier */ 
       /** @var string Cashier */ 
       const Cashier = "Cashier"; 

       /** Cashier.Id ID */ 
       /** Cashier ID */ 
       /** @var string CashierId */ 
       const CashierId = "Cashier.Id"; 

       /** Department.Category1 STRING */ 
       /** Category 1 */ 
       /** @var string DepartmentCategory1 */ 
       const DepartmentCategory1 = "Department.Category1"; 

       /** Department.Category2 STRING */ 
       /** Category 2 */ 
       /** @var string DepartmentCategory2 */ 
       const DepartmentCategory2 = "Department.Category2"; 

       /** Department.Category3 STRING */ 
       /** Category 3 */ 
       /** @var string DepartmentCategory3 */ 
       const DepartmentCategory3 = "Department.Category3"; 

       /** Department.Category4 STRING */ 
       /** Category 4 */ 
       /** @var string DepartmentCategory4 */ 
       const DepartmentCategory4 = "Department.Category4"; 

       /** Department.Category5 STRING */ 
       /** Category 5 */ 
       /** @var string DepartmentCategory5 */ 
       const DepartmentCategory5 = "Department.Category5"; 

       /** Delivery.City STRING */ 
       /** City */ 
       /** @var string DeliveryCity */ 
       const DeliveryCity = "Delivery.City"; 

       /** HourClose STRING */ 
       /** Closing hour */ 
       /** @var string HourClose */ 
       const HourClose = "HourClose"; 

       /** CloseTime DATETIME */ 
       /** Closing time */ 
       /** @var string CloseTime */ 
       const CloseTime = "CloseTime"; 

       /** Delivery.CustomerComment STRING */ 
       /** Comment to client */ 
       /** @var string DeliveryCustomerComment */ 
       const DeliveryCustomerComment = "Delivery.CustomerComment"; 

       /** CreditUser.Company STRING */ 
       /** Company-contractor */ 
       /** @var string CreditUserCompany */ 
       const CreditUserCompany = "CreditUser.Company"; 

       /** Conception STRING */ 
       /** Concept */ 
       /** @var string Conception */ 
       const Conception = "Conception"; 

       /** Conception.Code STRING */ 
       /** Concept code */ 
       /** @var string ConceptionCode */ 
       const ConceptionCode = "Conception.Code"; 

       /** Delivery.CookingFinishTime DATETIME */ 
       /** Cooking finish time */ 
       /** @var string DeliveryCookingFinishTime */ 
       const DeliveryCookingFinishTime = "Delivery.CookingFinishTime"; 

       /** Delivery.AvgCourierMark AMOUNT */ 
       /** Courier rating, % */ 
       /** @var string DeliveryAvgCourierMark */ 
       const DeliveryAvgCourierMark = "Delivery.AvgCourierMark"; 

       /** CardType STRING */ 
       /** Credit card */ 
       /** @var string CardType */ 
       const CardType = "CardType"; 

       /** CreditUser STRING */ 
       /** Credited to... */ 
       /** @var string CreditUser */ 
       const CreditUser = "CreditUser"; 

       /** Currencies.Currency STRING */ 
       /** Currency of payment */ 
       /** @var string CurrenciesCurrency */ 
       const CurrenciesCurrency = "Currencies.Currency"; 

       /** Currencies.CurrencyRate MONEY */ 
       /** Currency of payment */ 
       /** @var string CurrenciesCurrencyRate */ 
       const CurrenciesCurrencyRate = "Currencies.CurrencyRate"; 

       /** Delivery.CustomerMarketingSource STRING */ 
       /** Customer advertising */ 
       /** @var string DeliveryCustomerMarketingSource */ 
       const DeliveryCustomerMarketingSource = "Delivery.CustomerMarketingSource"; 

       /** Delivery.CustomerCardNumber STRING */ 
       /** Customer card number */ 
       /** @var string DeliveryCustomerCardNumber */ 
       const DeliveryCustomerCardNumber = "Delivery.CustomerCardNumber"; 

       /** Delivery.CustomerCardType STRING */ 
       /** Customer card type */ 
       /** @var string DeliveryCustomerCardType */ 
       const DeliveryCustomerCardType = "Delivery.CustomerCardType"; 

       /** Delivery.CustomerCreatedDateTyped DATE */ 
       /** Customer creation date */ 
       /** @var string DeliveryCustomerCreatedDateTyped */ 
       const DeliveryCustomerCreatedDateTyped = "Delivery.CustomerCreatedDateTyped"; 

       /** Delivery.CustomerName STRING */ 
       /** Customer full name */ 
       /** @var string DeliveryCustomerName */ 
       const DeliveryCustomerName = "Delivery.CustomerName"; 

       /** PriceCategory STRING */ 
       /** Customer price category */ 
       /** @var string PriceCategory */ 
       const PriceCategory = "PriceCategory"; 

       /** DayOfWeekOpen STRING */ 
       /** Day of week */ 
       /** @var string DayOfWeekOpen */ 
       const DayOfWeekOpen = "DayOfWeekOpen"; 

       /** Delivery.IsDelivery ENUM */ 
       /** Delivery */ 
       /** @var string DeliveryIsDelivery */ 
       const DeliveryIsDelivery = "Delivery.IsDelivery"; 

       /** Delivery.CancelComment STRING */ 
       /** Delivery cancellation comment */ 
       /** @var string DeliveryCancelComment */ 
       const DeliveryCancelComment = "Delivery.CancelComment"; 

       /** Delivery.CancelCause STRING */ 
       /** Delivery cancellation reason */ 
       /** @var string DeliveryCancelCause */ 
       const DeliveryCancelCause = "Delivery.CancelCause"; 

       /** Delivery.CloseTime DATETIME */ 
       /** Delivery closing time */ 
       /** @var string DeliveryCloseTime */ 
       const DeliveryCloseTime = "Delivery.CloseTime"; 

       /** Delivery.DeliveryComment STRING */ 
       /** Delivery comments */ 
       /** @var string DeliveryDeliveryComment */ 
       const DeliveryDeliveryComment = "Delivery.DeliveryComment"; 

       /** Delivery.Delay INTEGER */ 
       /** Delivery delay (min) */ 
       /** @var string DeliveryDelay */ 
       const DeliveryDelay = "Delivery.Delay"; 

       /** Delivery.DiffBetweenActualDeliveryTimeAndPredictedDeliveryTime INTEGER */ 
       /** Delivery delay, actual vs forecast (min) */ 
       /** @var string DeliveryDiffBetweenActualDeliveryTimeAndPredictedDeliveryTime */ 
       const DeliveryDiffBetweenActualDeliveryTimeAndPredictedDeliveryTime = "Delivery.DiffBetweenActualDeliveryTimeAndPredictedDeliveryTime"; 

       /** Delivery.SendTime DATETIME */ 
       /** Delivery dispatch time */ 
       /** @var string DeliverySendTime */ 
       const DeliverySendTime = "Delivery.SendTime"; 

       /** Delivery.Email STRING */ 
       /** Delivery email */ 
       /** @var string DeliveryEmail */ 
       const DeliveryEmail = "Delivery.Email"; 

       /** Delivery.DeliveryOperator STRING */ 
       /** Delivery operator */ 
       /** @var string DeliveryDeliveryOperator */ 
       const DeliveryDeliveryOperator = "Delivery.DeliveryOperator"; 

       /** Delivery.DeliveryOperator.Id STRING */ 
       /** Delivery operator ID */ 
       /** @var string DeliveryDeliveryOperatorId */ 
       const DeliveryDeliveryOperatorId = "Delivery.DeliveryOperator.Id"; 

       /** Delivery.Phone STRING */ 
       /** Delivery phone number */ 
       /** @var string DeliveryPhone */ 
       const DeliveryPhone = "Delivery.Phone"; 

       /** Delivery.PrintTime DATETIME */ 
       /** Delivery print time */ 
       /** @var string DeliveryPrintTime */ 
       const DeliveryPrintTime = "Delivery.PrintTime"; 

       /** Delivery.AvgMark AMOUNT */ 
       /** Delivery rating, % */ 
       /** @var string DeliveryAvgMark */ 
       const DeliveryAvgMark = "Delivery.AvgMark"; 

       /** Delivery.SourceKey STRING */ 
       /** Delivery source */ 
       /** @var string DeliverySourceKey */ 
       const DeliverySourceKey = "Delivery.SourceKey"; 

       /** Delivery.ServiceType ENUM */ 
       /** Delivery type */ 
       /** @var string DeliveryServiceType */ 
       const DeliveryServiceType = "Delivery.ServiceType"; 

       /** Department.Id ID */ 
       /** Department ID */ 
       /** @var string DepartmentId */ 
       const DepartmentId = "Department.Id"; 

       /** DiscountPercent PERCENT */ 
       /** Discount rate */ 
       /** @var string DiscountPercent */ 
       const DiscountPercent = "DiscountPercent"; 

       /** OrderDiscount.Type STRING */ 
       /** Discount type */ 
       /** @var string OrderDiscountType */ 
       const OrderDiscountType = "OrderDiscount.Type"; 

       /** OrderDiscount.Type.IDs STRING */ 
       /** Discount type (ID) */ 
       /** @var string OrderDiscountTypeIDs */ 
       const OrderDiscountTypeIDs = "OrderDiscount.Type.IDs"; 

       /** Delivery.Courier STRING */ 
       /** Driver */ 
       /** @var string DeliveryCourier */ 
       const DeliveryCourier = "Delivery.Courier"; 

       /** Delivery.Courier.Id STRING */ 
       /** Driver ID */ 
       /** @var string DeliveryCourierId */ 
       const DeliveryCourierId = "Delivery.Courier.Id"; 

       /** CashRegisterName.CashRegisterSerialNumber STRING */ 
       /** FCR serial number */ 
       /** @var string CashRegisterNameCashRegisterSerialNumber */ 
       const CashRegisterNameCashRegisterSerialNumber = "CashRegisterName.CashRegisterSerialNumber"; 

       /** PayTypes.IsPrintCheque ENUM */ 
       /** Fisc. payment type */ 
       /** @var string PayTypesIsPrintCheque */ 
       const PayTypesIsPrintCheque = "PayTypes.IsPrintCheque"; 

       /** Delivery.PredictedDeliveryTime DATETIME */ 
       /** Forecast delivery time */ 
       /** @var string DeliveryPredictedDeliveryTime */ 
       const DeliveryPredictedDeliveryTime = "Delivery.PredictedDeliveryTime"; 

       /** Delivery.PredictedCookingCompleteTime DATETIME */ 
       /** Forecast of the order cooking completion time */ 
       /** @var string DeliveryPredictedCookingCompleteTime */ 
       const DeliveryPredictedCookingCompleteTime = "Delivery.PredictedCookingCompleteTime"; 

       /** Store.Name STRING */ 
       /** From storage */ 
       /** @var string StoreName */ 
       const StoreName = "Store.Name"; 

       /** DishFullName STRING */ 
       /** Full name of the item */ 
       /** @var string DishFullName */ 
       const DishFullName = "DishFullName"; 

       /** RestorauntGroup STRING */ 
       /** Group */ 
       /** @var string RestorauntGroup */ 
       const RestorauntGroup = "RestorauntGroup"; 

       /** PrechequeTime DATETIME */ 
       /** Guest bill time */ 
       /** @var string PrechequeTime */ 
       const PrechequeTime = "PrechequeTime"; 

       /** OrderDiscount.GuestCard STRING */ 
       /** Guest card */ 
       /** @var string OrderDiscountGuestCard */ 
       const OrderDiscountGuestCard = "OrderDiscount.GuestCard"; 

       /** CardOwner STRING */ 
       /** Guest cardholder */ 
       /** @var string CardOwner */ 
       const CardOwner = "CardOwner"; 

       /** DishTaxCategory.Id ID */ 
       /** ID tax bracket */ 
       /** @var string DishTaxCategoryId */ 
       const DishTaxCategoryId = "DishTaxCategory.Id"; 

       /** Delivery.BillTime DATETIME */ 
       /** Invoice print time */ 
       /** @var string DeliveryBillTime */ 
       const DeliveryBillTime = "Delivery.BillTime"; 

       /** DishName STRING */ 
       /** Item */ 
       /** @var string DishName */ 
       const DishName = "DishName"; 

       /** DishId ID */ 
       /** Item ID */ 
       /** @var string DishId */ 
       const DishId = "DishId"; 

       /** DishCategory.Accounting STRING */ 
       /** Item accounting category */ 
       /** @var string DishCategoryAccounting */ 
       const DishCategoryAccounting = "DishCategory.Accounting"; 

       /** DishCategory STRING */ 
       /** Item category */ 
       /** @var string DishCategory */ 
       const DishCategory = "DishCategory"; 

       /** DishCategory.Id ID */ 
       /** Item category ID */ 
       /** @var string DishCategoryId */ 
       const DishCategoryId = "DishCategory.Id"; 

       /** DishCode STRING */ 
       /** Item code */ 
       /** @var string DishCode */ 
       const DishCode = "DishCode"; 

       /** Comment STRING */ 
       /** Item comment */ 
       /** @var string Comment */ 
       const Comment = "Comment"; 

       /** DeletedWithWriteoff ENUM */ 
       /** Item deleted */ 
       /** @var string DeletedWithWriteoff */ 
       const DeletedWithWriteoff = "DeletedWithWriteoff"; 

       /** DeletionComment STRING */ 
       /** Item deletion comment */ 
       /** @var string DeletionComment */ 
       const DeletionComment = "DeletionComment"; 

       /** DishGroup STRING */ 
       /** Item group */ 
       /** @var string DishGroup */ 
       const DishGroup = "DishGroup"; 

       /** DishGroup.Num STRING */ 
       /** Item group code */ 
       /** @var string DishGroupNum */ 
       const DishGroupNum = "DishGroup.Num"; 

       /** DishGroup.Hierarchy STRING */ 
       /** Item hierarchy */ 
       /** @var string DishGroupHierarchy */ 
       const DishGroupHierarchy = "DishGroup.Hierarchy"; 

       /** DishForeignName STRING */ 
       /** Item name in a foreign language */ 
       /** @var string DishForeignName */ 
       const DishForeignName = "DishForeignName"; 

       /** DishCode.Quick STRING */ 
       /** Item quick code */ 
       /** @var string DishCodeQuick */ 
       const DishCodeQuick = "DishCode.Quick"; 

       /** DishSize.Name STRING */ 
       /** Item size */ 
       /** @var string DishSizeName */ 
       const DishSizeName = "DishSize.Name"; 

       /** DishSize.Id ID */ 
       /** Item size ID */ 
       /** @var string DishSizeId */ 
       const DishSizeId = "DishSize.Id"; 

       /** DishSize.ShortName STRING */ 
       /** Item size code */ 
       /** @var string DishSizeShortName */ 
       const DishSizeShortName = "DishSize.ShortName"; 

       /** DishSize.Scale.Id ID */ 
       /** Item size scale ID */ 
       /** @var string DishSizeScaleId */ 
       const DishSizeScaleId = "DishSize.Scale.Id"; 

       /** DishSize.Priority INTEGER */ 
       /** Item size sequence number */ 
       /** @var string DishSizePriority */ 
       const DishSizePriority = "DishSize.Priority"; 

       /** DishSize.Scale.Name STRING */ 
       /** Item sizes scale */ 
       /** @var string DishSizeScaleName */ 
       const DishSizeScaleName = "DishSize.Scale.Name"; 

       /** WaiterName STRING */ 
       /** Item waiter */ 
       /** @var string WaiterName */ 
       const WaiterName = "WaiterName"; 

       /** WaiterName.ID ID */ 
       /** Item waiter ID */ 
       /** @var string WaiterNameID */ 
       const WaiterNameID = "WaiterName.ID"; 

       /** Delivery.AvgFoodMark AMOUNT */ 
       /** Kitchen rating, % */ 
       /** @var string DeliveryAvgFoodMark */ 
       const DeliveryAvgFoodMark = "Delivery.AvgFoodMark"; 

       /** JurName STRING */ 
       /** Legal entity */ 
       /** @var string JurName */ 
       const JurName = "JurName"; 

       /** DishGroup.TopParent STRING */ 
       /** Level 1 item group */ 
       /** @var string DishGroupTopParent */ 
       const DishGroupTopParent = "DishGroup.TopParent"; 

       /** DishGroup.SecondParent STRING */ 
       /** Level 2 item group */ 
       /** @var string DishGroupSecondParent */ 
       const DishGroupSecondParent = "DishGroup.SecondParent"; 

       /** DishGroup.ThirdParent STRING */ 
       /** Level 3 item group */ 
       /** @var string DishGroupThirdParent */ 
       const DishGroupThirdParent = "DishGroup.ThirdParent"; 

       /** SoldWithDish.Id ID */ 
       /** Main item ID */ 
       /** @var string SoldWithDishId */ 
       const SoldWithDishId = "SoldWithDish.Id"; 

       /** DishMeasureUnit STRING */ 
       /** Measurement unit */ 
       /** @var string DishMeasureUnit */ 
       const DishMeasureUnit = "DishMeasureUnit"; 

       /** Mounth STRING */ 
       /** Month */ 
       /** @var string Mounth */ 
       const Mounth = "Mounth"; 

       /** NonCashPaymentType STRING */ 
       /** Non-cash payment type */ 
       /** @var string NonCashPaymentType */ 
       const NonCashPaymentType = "NonCashPaymentType"; 

       /** Delivery.Number INTEGER */ 
       /** Number of delivery */ 
       /** @var string DeliveryNumber */ 
       const DeliveryNumber = "Delivery.Number"; 

       /** GuestNum AMOUNT */ 
       /** Number of guests */ 
       /** @var string GuestNum */ 
       const GuestNum = "GuestNum"; 

       /** DishAmountInt AMOUNT */ 
       /** Number of ﻿items */ 
       /** @var string DishAmountInt */ 
       const DishAmountInt = "DishAmountInt"; 

       /** HourOpen STRING */ 
       /** Opening hour */ 
       /** @var string HourOpen */ 
       const HourOpen = "HourOpen"; 

       /** OpenTime DATETIME */ 
       /** Opening time */ 
       /** @var string OpenTime */ 
       const OpenTime = "OpenTime"; 

       /** OperationType ENUM */ 
       /** Operation */ 
       /** @var string OperationType */ 
       const OperationType = "OperationType"; 

       /** Delivery.AvgOperatorMark AMOUNT */ 
       /** Operator rating, % */ 
       /** @var string DeliveryAvgOperatorMark */ 
       const DeliveryAvgOperatorMark = "Delivery.AvgOperatorMark"; 

       /** UniqOrderId.Id ID */ 
       /** Order ID */ 
       /** @var string UniqOrderIdId */ 
       const UniqOrderIdId = "UniqOrderId.Id"; 

       /** OrderDeleted ENUM */ 
       /** Order deleted */ 
       /** @var string OrderDeleted */ 
       const OrderDeleted = "OrderDeleted"; 

       /** OriginName STRING */ 
       /** Order origin */ 
       /** @var string OriginName */ 
       const OriginName = "OriginName"; 

       /** OrderType STRING */ 
       /** Order type */ 
       /** @var string OrderType */ 
       const OrderType = "OrderType"; 

       /** OrderWaiter.Id ID */ 
       /** Order waiter ID */ 
       /** @var string OrderWaiterId */ 
       const OrderWaiterId = "OrderWaiter.Id"; 

       /** Department STRING */ 
       /** Outlet */ 
       /** @var string Department */ 
       const Department = "Department"; 

       /** CardNumber STRING */ 
       /** Pay card type */ 
       /** @var string CardNumber */ 
       const CardNumber = "CardNumber"; 

       /** PayTypes.Group ENUM */ 
       /** Payment group */ 
       /** @var string PayTypesGroup */ 
       const PayTypesGroup = "PayTypes.Group"; 

       /** PayTypes STRING */ 
       /** Payment type */ 
       /** @var string PayTypes */ 
       const PayTypes = "PayTypes"; 

       /** PayTypes.GUID ID */ 
       /** Payment type (ID) */ 
       /** @var string PayTypesGUID */ 
       const PayTypesGUID = "PayTypes.GUID"; 

       /** PayTypes.Combo STRING */ 
       /** Payment type (comb.) */ 
       /** @var string PayTypesCombo */ 
       const PayTypesCombo = "PayTypes.Combo"; 

       /** Delivery.ExpectedTime DATETIME */ 
       /** Planned delivery time */ 
       /** @var string DeliveryExpectedTime */ 
       const DeliveryExpectedTime = "Delivery.ExpectedTime"; 

       /** Delivery.Index STRING */ 
       /** Postcode */ 
       /** @var string DeliveryIndex */ 
       const DeliveryIndex = "Delivery.Index"; 

       /** PriceCategoryCard STRING */ 
       /** Price Category Card Number */ 
       /** @var string PriceCategoryCard */ 
       const PriceCategoryCard = "PriceCategoryCard"; 

       /** PriceCategoryUserCardOwner STRING */ 
       /** Price Category Card Owner */ 
       /** @var string PriceCategoryUserCardOwner */ 
       const PriceCategoryUserCardOwner = "PriceCategoryUserCardOwner"; 

       /** PriceCategoryDiscountCardOwner STRING */ 
       /** Price Category Cardholder */ 
       /** @var string PriceCategoryDiscountCardOwner */ 
       const PriceCategoryDiscountCardOwner = "PriceCategoryDiscountCardOwner"; 

       /** CookingPlace STRING */ 
       /** Production place */ 
       /** @var string CookingPlace */ 
       const CookingPlace = "CookingPlace"; 

       /** QuarterOpen STRING */ 
       /** Quarter */ 
       /** @var string QuarterOpen */ 
       const QuarterOpen = "QuarterOpen"; 

       /** RemovalType STRING */ 
       /** Reason for item deletion */ 
       /** @var string RemovalType */ 
       const RemovalType = "RemovalType"; 

       /** OrderNum INTEGER */ 
       /** Receipt number */ 
       /** @var string OrderNum */ 
       const OrderNum = "OrderNum"; 

       /** Delivery.Region STRING */ 
       /** Region */ 
       /** @var string DeliveryRegion */ 
       const DeliveryRegion = "Delivery.Region"; 

       /** RestaurantSection STRING */ 
       /** Room */ 
       /** @var string RestaurantSection */ 
       const RestaurantSection = "RestaurantSection";

		/** RestaurantGroup.Id STRING */
	    /** Room  */
	    /** @var string RestaurantGroup.Id */
       const RestaurantGroupId = "RestaurantGroup.Id";

       /** DishServicePrintTime DATETIME */ 
       /** Service printing item */ 
       /** @var string DishServicePrintTime */ 
       const DishServicePrintTime = "DishServicePrintTime"; 

       /** Cooking.ServeNumber STRING */ 
       /** Serving number */ 
       /** @var string CookingServeNumber */ 
       const CookingServeNumber = "Cooking.ServeNumber"; 

       /** OrderTime.OrderLength INTEGER */ 
       /** Serving time (min) */ 
       /** @var string OrderTimeOrderLength */ 
       const OrderTimeOrderLength = "OrderTime.OrderLength"; 

       /** SessionNum INTEGER */ 
       /** Shift number */ 
       /** @var string SessionNum */ 
       const SessionNum = "SessionNum"; 

       /** SoldWithDish STRING */ 
       /** Sold with item */ 
       /** @var string SoldWithDish */ 
       const SoldWithDish = "SoldWithDish"; 

       /** DishType ENUM */ 
       /** Stock list type */ 
       /** @var string DishType */ 
       const DishType = "DishType"; 

       /** Delivery.Street STRING */ 
       /** Street */ 
       /** @var string DeliveryStreet */ 
       const DeliveryStreet = "Delivery.Street"; 

       /** Department.Code STRING */ 
       /** Subdivision code */ 
       /** @var string DepartmentCode */ 
       const DepartmentCode = "Department.Code"; 

       /** IncreaseSum MONEY */ 
       /** Surcharge amount */ 
       /** @var string IncreaseSum */ 
       const IncreaseSum = "IncreaseSum"; 

       /** IncreasePercent PERCENT */ 
       /** Surcharge rate */ 
       /** @var string IncreasePercent */ 
       const IncreasePercent = "IncreasePercent"; 

       /** TableNum INTEGER */ 
       /** Table number */ 
       /** @var string TableNum */ 
       const TableNum = "TableNum"; 

       /** DishTaxCategory.Name STRING */ 
       /** Tax category */ 
       /** @var string DishTaxCategoryName */ 
       const DishTaxCategoryName = "DishTaxCategory.Name"; 

       /** OrderTime.PrechequeLength INTEGER */ 
       /** Time in guest bill (min) */ 
       /** @var string OrderTimePrechequeLength */ 
       const OrderTimePrechequeLength = "OrderTime.PrechequeLength"; 

       /** StoreTo STRING */ 
       /** To storage */ 
       /** @var string StoreTo */ 
       const StoreTo = "StoreTo"; 

       /** Delivery.WayDuration INTEGER */ 
       /** Travel time (min) */ 
       /** @var string DeliveryWayDuration */ 
       const DeliveryWayDuration = "Delivery.WayDuration"; 

       /** CookingPlaceType STRING */ 
       /** Type of production place */ 
       /** @var string CookingPlaceType */ 
       const CookingPlaceType = "CookingPlaceType"; 

       /** OrderIncrease.Type STRING */ 
       /** Type of surcharge */ 
       /** @var string OrderIncreaseType */ 
       const OrderIncreaseType = "OrderIncrease.Type"; 

       /** OrderIncrease.Type.IDs STRING */ 
       /** Type of surcharge (ID) */ 
       /** @var string OrderIncreaseTypeIDs */ 
       const OrderIncreaseTypeIDs = "OrderIncrease.Type.IDs"; 

       /** VAT.Sum MONEY */ 
       /** VAT by bill (Amount) */ 
       /** @var string VATSum */ 
       const VATSum = "VAT.Sum"; 

       /** VAT.Percent PERCENT */ 
       /** VAT(%) */ 
       /** @var string VATPercent */ 
       const VATPercent = "VAT.Percent"; 

       /** DishReturnSum MONEY */ 
       /** Void amount */ 
       /** @var string DishReturnSum */ 
       const DishReturnSum = "DishReturnSum"; 

       /** Storned ENUM */ 
       /** Void receipt */ 
       /** @var string Storned */ 
       const Storned = "Storned"; 

       /** OrderWaiter.Name STRING */ 
       /** Waiter for the order */ 
       /** @var string OrderWaiterName */ 
       const OrderWaiterName = "OrderWaiter.Name"; 

       /** WeekInMonthOpen STRING */ 
       /** Week of month */ 
       /** @var string WeekInMonthOpen */ 
       const WeekInMonthOpen = "WeekInMonthOpen"; 

       /** WeekInYearOpen STRING */ 
       /** Week of year */ 
       /** @var string WeekInYearOpen */ 
       const WeekInYearOpen = "WeekInYearOpen"; 

       /** WriteoffReason STRING */ 
       /** Write-off reason */ 
       /** @var string WriteoffReason */ 
       const WriteoffReason = "WriteoffReason"; 

       /** WriteoffUser STRING */ 
       /** Written off to employee */ 
       /** @var string WriteoffUser */ 
       const WriteoffUser = "WriteoffUser"; 

       /** YearOpen STRING */ 
       /** Year */ 
       /** @var string YearOpen */ 
       const YearOpen = "YearOpen"; 

}

