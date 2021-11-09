<?php 
namespace IikoApiBundle\Reports\Olap\Version52\Transactions; 
class FilterFields { 
       /** Account.Name STRING */ 
       /** Account */ 
       /** @var string AccountName */ 
       const AccountName = "Account.Name"; 

       /** Account.Code STRING */ 
       /** Account code */ 
       /** @var string AccountCode */ 
       const AccountCode = "Account.Code"; 

       /** Account.Group ENUM */ 
       /** Account group */ 
       /** @var string AccountGroup */ 
       const AccountGroup = "Account.Group"; 

       /** Account.AccountHierarchyFull STRING */ 
       /** Account hierarchy */ 
       /** @var string AccountAccountHierarchyFull */ 
       const AccountAccountHierarchyFull = "Account.AccountHierarchyFull"; 

       /** Account.Type ENUM */ 
       /** Account type */ 
       /** @var string AccountType */ 
       const AccountType = "Account.Type"; 

       /** Product.AccountingCategory STRING */ 
       /** Accounting category */ 
       /** @var string ProductAccountingCategory */ 
       const ProductAccountingCategory = "Product.AccountingCategory"; 

       /** DateTime.DateTyped DATE */ 
       /** Accounting day */ 
       /** @var string DateTimeDateTyped */ 
       const DateTimeDateTyped = "DateTime.DateTyped"; 

       /** ContrProduct.AlcoholClass STRING */ 
       /** Alcohol product class */ 
       /** @var string ContrProductAlcoholClass */ 
       const ContrProductAlcoholClass = "ContrProduct.AlcoholClass"; 

       /** Product.AlcoholClass STRING */ 
       /** Alcohol product class */ 
       /** @var string ProductAlcoholClass */ 
       const ProductAlcoholClass = "Product.AlcoholClass"; 

       /** ContrProduct.AlcoholClass.Group STRING */ 
       /** Alcohol product group */ 
       /** @var string ContrProductAlcoholClassGroup */ 
       const ContrProductAlcoholClassGroup = "ContrProduct.AlcoholClass.Group"; 

       /** Product.AlcoholClass.Group STRING */ 
       /** Alcohol product group */ 
       /** @var string ProductAlcoholClassGroup */ 
       const ProductAlcoholClassGroup = "Product.AlcoholClass.Group"; 

       /** CashFlowCategory STRING */ 
       /** CF article */ 
       /** @var string CashFlowCategory */ 
       const CashFlowCategory = "CashFlowCategory"; 

       /** CashFlowCategory.Type ENUM */ 
       /** CF article type */ 
       /** @var string CashFlowCategoryType */ 
       const CashFlowCategoryType = "CashFlowCategory.Type"; 

       /** CashFlowCategory.Hierarchy STRING */ 
       /** CF articles hierarchy */ 
       /** @var string CashFlowCategoryHierarchy */ 
       const CashFlowCategoryHierarchy = "CashFlowCategory.Hierarchy"; 

       /** Session.CashRegister STRING */ 
       /** Cash register */ 
       /** @var string SessionCashRegister */ 
       const SessionCashRegister = "Session.CashRegister"; 

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

       /** ContrProduct.AlcoholClass.Code STRING */ 
       /** Code of alcohol product class */ 
       /** @var string ContrProductAlcoholClassCode */ 
       const ContrProductAlcoholClassCode = "ContrProduct.AlcoholClass.Code"; 

       /** Product.AlcoholClass.Code STRING */ 
       /** Code of alcohol product class */ 
       /** @var string ProductAlcoholClassCode */ 
       const ProductAlcoholClassCode = "Product.AlcoholClass.Code"; 

       /** Comment STRING */ 
       /** Comment */ 
       /** @var string Comment */ 
       const Comment = "Comment"; 

       /** Conception STRING */ 
       /** Concept */ 
       /** @var string Conception */ 
       const Conception = "Conception"; 

       /** Conception.Code STRING */ 
       /** Concept code */ 
       /** @var string ConceptionCode */ 
       const ConceptionCode = "Conception.Code"; 

       /** Counteragent.Name STRING */ 
       /** Contractor */ 
       /** @var string CounteragentName */ 
       const CounteragentName = "Counteragent.Name"; 

       /** Counteragent.Id ID */ 
       /** Contractor ID */ 
       /** @var string CounteragentId */ 
       const CounteragentId = "Counteragent.Id"; 

       /** Account.CounteragentType ENUM */ 
       /** Contractor type */ 
       /** @var string AccountCounteragentType */ 
       const AccountCounteragentType = "Account.CounteragentType"; 

       /** ContrAccount.Code STRING */ 
       /** Corr. Account Code */ 
       /** @var string ContrAccountCode */ 
       const ContrAccountCode = "Contr-Account.Code";

       /** ContrAccount.Group ENUM */ 
       /** Corr. Account group */ 
       /** @var string ContrAccountGroup */ 
       const ContrAccountGroup = "ContrAccount.Group"; 

       /** ContrAccount.Type ENUM */ 
       /** Corr. Account type */ 
       /** @var string ContrAccountType */ 
       const ContrAccountType = "ContrAccount.Type"; 

       /** ContrAccount.Name STRING */ 
       /** Corr. Account/Storage */ 
       /** @var string ContrAccountName */ 
       const ContrAccountName = "ContrAccount.Name"; 

       /** ContrProduct.AccountingCategory STRING */ 
       /** Corr. Accounting Category */ 
       /** @var string ContrProductAccountingCategory */ 
       const ContrProductAccountingCategory = "ContrProduct.AccountingCategory"; 

       /** ContrProduct.TopParent STRING */ 
       /** Corr. Level 1 Stock List Group */ 
       /** @var string ContrProductTopParent */ 
       const ContrProductTopParent = "ContrProduct.TopParent"; 

       /** ContrProduct.SecondParent STRING */ 
       /** Corr. Level 2 Stock List Group */ 
       /** @var string ContrProductSecondParent */ 
       const ContrProductSecondParent = "ContrProduct.SecondParent"; 

       /** ContrProduct.ThirdParent STRING */ 
       /** Corr. Level 3 Stock List Group */ 
       /** @var string ContrProductThirdParent */ 
       const ContrProductThirdParent = "ContrProduct.ThirdParent"; 

       /** ContrProduct.MeasureUnit STRING */ 
       /** Corr. Measurement Unit */ 
       /** @var string ContrProductMeasureUnit */ 
       const ContrProductMeasureUnit = "ContrProduct.MeasureUnit"; 

       /** ContrProduct.Num STRING */ 
       /** Corr. SKU of item */ 
       /** @var string ContrProductNum */ 
       const ContrProductNum = "ContrProduct.Num"; 

       /** ContrProduct.Category STRING */ 
       /** Corr. Stock List Category */ 
       /** @var string ContrProductCategory */ 
       const ContrProductCategory = "ContrProduct.Category"; 

       /** ContrProduct.Hierarchy STRING */ 
       /** Corr. Stock List Hierarchy */ 
       /** @var string ContrProductHierarchy */ 
       const ContrProductHierarchy = "ContrProduct.Hierarchy"; 

       /** ContrProduct.Name STRING */ 
       /** Corr. Stock list item */ 
       /** @var string ContrProductName */ 
       const ContrProductName = "ContrProduct.Name"; 

       /** ContrProduct.CookingPlaceType STRING */ 
       /** Corr. Type of Production Place */ 
       /** @var string ContrProductCookingPlaceType */ 
       const ContrProductCookingPlaceType = "ContrProduct.CookingPlaceType"; 

       /** ContrProduct.Type ENUM */ 
       /** Corr. Type of stock list item */ 
       /** @var string ContrProductType */ 
       const ContrProductType = "ContrProduct.Type"; 

       /** ContrProduct.Id ID */ 
       /** Corr. item list ID */ 
       /** @var string ContrProductId */ 
       const ContrProductId = "ContrProduct.Id"; 

       /** ContrProduct.Category.Id ID */ 
       /** Corr. of item list category ID */ 
       /** @var string ContrProductCategoryId */ 
       const ContrProductCategoryId = "ContrProduct.Category.Id"; 

       /** DateTime.Typed DATETIME */ 
       /** Date and time */ 
       /** @var string DateTimeTyped */ 
       const DateTimeTyped = "DateTime.Typed"; 

       /** DateTime.DayOfWeak STRING */ 
       /** Day of week */ 
       /** @var string DateTimeDayOfWeak */ 
       const DateTimeDayOfWeak = "DateTime.DayOfWeak"; 

       /** TransactionSide ENUM */ 
       /** Debit/Credit */ 
       /** @var string TransactionSide */ 
       const TransactionSide = "TransactionSide"; 

       /** Document STRING */ 
       /** Document number */ 
       /** @var string Document */ 
       const Document = "Document"; 

       /** Session.Group STRING */ 
       /** Group */ 
       /** @var string SessionGroup */ 
       const SessionGroup = "Session.Group"; 

       /** DateTime.Hour STRING */ 
       /** Hour */ 
       /** @var string DateTimeHour */ 
       const DateTimeHour = "DateTime.Hour"; 

       /** Product.Category.Id ID */ 
       /** Item list category ID */ 
       /** @var string ProductCategoryId */ 
       const ProductCategoryId = "Product.Category.Id"; 

       /** Product.Id ID */ 
       /** Item list element ID */ 
       /** @var string ProductId */ 
       const ProductId = "Product.Id"; 

       /** Department.JurPerson STRING */ 
       /** Legal entity */ 
       /** @var string DepartmentJurPerson */ 
       const DepartmentJurPerson = "Department.JurPerson"; 

       /** CashFlowCategory.HierarchyLevel1 STRING */ 
       /** Level 1 CF article */ 
       /** @var string CashFlowCategoryHierarchyLevel1 */ 
       const CashFlowCategoryHierarchyLevel1 = "CashFlowCategory.HierarchyLevel1"; 

       /** Account.AccountHierarchyTop STRING */ 
       /** Level 1 account */ 
       /** @var string AccountAccountHierarchyTop */ 
       const AccountAccountHierarchyTop = "Account.AccountHierarchyTop"; 

       /** Product.TopParent STRING */ 
       /** Level 1 stock list group */ 
       /** @var string ProductTopParent */ 
       const ProductTopParent = "Product.TopParent"; 

       /** CashFlowCategory.HierarchyLevel2 STRING */ 
       /** Level 2 CF article */ 
       /** @var string CashFlowCategoryHierarchyLevel2 */ 
       const CashFlowCategoryHierarchyLevel2 = "CashFlowCategory.HierarchyLevel2"; 

       /** Account.AccountHierarchySecond STRING */ 
       /** Level 2 account */ 
       /** @var string AccountAccountHierarchySecond */ 
       const AccountAccountHierarchySecond = "Account.AccountHierarchySecond"; 

       /** Product.SecondParent STRING */ 
       /** Level 2 stock list group */ 
       /** @var string ProductSecondParent */ 
       const ProductSecondParent = "Product.SecondParent"; 

       /** CashFlowCategory.HierarchyLevel3 STRING */ 
       /** Level 3 CF article */ 
       /** @var string CashFlowCategoryHierarchyLevel3 */ 
       const CashFlowCategoryHierarchyLevel3 = "CashFlowCategory.HierarchyLevel3"; 

       /** Account.AccountHierarchyThird STRING */ 
       /** Level 3 account */ 
       /** @var string AccountAccountHierarchyThird */ 
       const AccountAccountHierarchyThird = "Account.AccountHierarchyThird"; 

       /** Product.ThirdParent STRING */ 
       /** Level 3 stock list group */ 
       /** @var string ProductThirdParent */ 
       const ProductThirdParent = "Product.ThirdParent"; 

       /** Product.MeasureUnit STRING */ 
       /** Measurement unit */ 
       /** @var string ProductMeasureUnit */ 
       const ProductMeasureUnit = "Product.MeasureUnit"; 

       /** DateTime.Month STRING */ 
       /** Month */ 
       /** @var string DateTimeMonth */ 
       const DateTimeMonth = "DateTime.Month"; 

       /** OrderId ID */ 
       /** Order ID */ 
       /** @var string OrderId */ 
       const OrderId = "OrderId"; 

       /** Department STRING */ 
       /** Outlet */ 
       /** @var string Department */ 
       const Department = "Department"; 

       /** Account.IsCashFlowAccount ENUM */ 
       /** Participates in cash flow */ 
       /** @var string AccountIsCashFlowAccount */ 
       const AccountIsCashFlowAccount = "Account.IsCashFlowAccount"; 

       /** DateTime.Quarter STRING */ 
       /** Quarter */ 
       /** @var string DateTimeQuarter */ 
       const DateTimeQuarter = "DateTime.Quarter"; 

       /** Session.RestaurantSection STRING */ 
       /** Room */ 
       /** @var string SessionRestaurantSection */ 
       const SessionRestaurantSection = "Session.RestaurantSection"; 

       /** Product.Num STRING */ 
       /** SKU */ 
       /** @var string ProductNum */ 
       const ProductNum = "Product.Num"; 

       /** Product.Category STRING */ 
       /** Stock list category */ 
       /** @var string ProductCategory */ 
       const ProductCategory = "Product.Category"; 

       /** Product.Hierarchy STRING */ 
       /** Stock list hierarchy */ 
       /** @var string ProductHierarchy */ 
       const ProductHierarchy = "Product.Hierarchy"; 

       /** Product.Name STRING */ 
       /** Stock list item */ 
       /** @var string ProductName */ 
       const ProductName = "Product.Name"; 

       /** Product.Type ENUM */ 
       /** Stock list type */ 
       /** @var string ProductType */ 
       const ProductType = "Product.Type"; 

       /** Store STRING */ 
       /** Storage */ 
       /** @var string Store */ 
       const Store = "Store"; 

       /** Account.StoreOrAccount ENUM */ 
       /** Storage/account */ 
       /** @var string AccountStoreOrAccount */ 
       const AccountStoreOrAccount = "Account.StoreOrAccount"; 

       /** Department.Code STRING */ 
       /** Subdivision code */ 
       /** @var string DepartmentCode */ 
       const DepartmentCode = "Department.Code"; 

       /** TransactionType.Code OBJECT */ 
       /** Transaction code */ 
       /** @var string TransactionTypeCode */ 
       const TransactionTypeCode = "TransactionType.Code"; 

       /** TransactionType ENUM */ 
       /** Transaction type */ 
       /** @var string TransactionType */ 
       const TransactionType = "TransactionType"; 

       /** ContrProduct.AlcoholClass.Type ENUM */ 
       /** Type of alcohol products */ 
       /** @var string ContrProductAlcoholClassType */ 
       const ContrProductAlcoholClassType = "ContrProduct.AlcoholClass.Type"; 

       /** Product.AlcoholClass.Type ENUM */ 
       /** Type of alcohol products */ 
       /** @var string ProductAlcoholClassType */ 
       const ProductAlcoholClassType = "Product.AlcoholClass.Type"; 

       /** Product.CookingPlaceType STRING */ 
       /** Type of production place */ 
       /** @var string ProductCookingPlaceType */ 
       const ProductCookingPlaceType = "Product.CookingPlaceType"; 

       /** DateTime.WeekInMonth STRING */ 
       /** Week of month */ 
       /** @var string DateTimeWeekInMonth */ 
       const DateTimeWeekInMonth = "DateTime.WeekInMonth"; 

       /** DateTime.WeekInYear STRING */ 
       /** Week of year */ 
       /** @var string DateTimeWeekInYear */ 
       const DateTimeWeekInYear = "DateTime.WeekInYear"; 

       /** DateTime.Year STRING */ 
       /** Year */ 
       /** @var string DateTimeYear */ 
       const DateTimeYear = "DateTime.Year"; 

}

