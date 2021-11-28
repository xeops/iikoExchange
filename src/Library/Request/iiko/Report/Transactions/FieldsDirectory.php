<?php


namespace iikoExchangeBundle\Library\Request\iiko\Report\Transactions;


class FieldsDirectory
{
    public static $data = [
        "PercentOfSummary.ByCol" => [
            "name" => "% by column",
            "type" => "PERCENT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Payment"
            ]
        ],
        "PercentOfSummary.ByRow" => [
            "name" => "% by row",
            "type" => "PERCENT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Payment"
            ]
        ],
        "Sum.PartOfIncome" => [
            "name" => "% of revenue",
            "type" => "PERCENT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Finances"
            ]
        ],
        "Sum.PartOfSummaryByCol" => [
            "name" => "% of total by column",
            "type" => "PERCENT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Finances"
            ]
        ],
        "Sum.PartOfSummaryByRow" => [
            "name" => "% of total by row",
            "type" => "PERCENT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Finances"
            ]
        ],
        "Sum.PartOfTotalIncome" => [
            "name" => "% total revenue",
            "type" => "PERCENT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Finances",
                "P&L"
            ]
        ],
        "Account.Name" => [
            "name" => "Account",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts",
                "P&L"
            ]
        ],
        "Account.Id" => [
            "name" => "Account ID",
            "type" => "ID_STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Account.Code" => [
            "name" => "Account code",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts",
                "P&L"
            ]
        ],
        "Account.Group" => [
            "name" => "Account group",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts",
                "P&L"
            ]
        ],
        "Account.AccountHierarchyFull" => [
            "name" => "Account hierarchy",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Account.Type" => [
            "name" => "Account type",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts",
                "P&L"
            ]
        ],
        "Product.AccountingCategory" => [
            "name" => "Accounting category",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "DateTime.DateTyped" => [
            "name" => "Accounting day",
            "type" => "DATE",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "Contr-Product.AlcoholClass" => [
            "name" => "Alcohol product class",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Correspondent"
            ]
        ],
        "Product.AlcoholClass" => [
            "name" => "Alcohol product class",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Stock list"
            ]
        ],
        "Contr-Product.AlcoholClass.Group" => [
            "name" => "Alcohol product group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Correspondent"
            ]
        ],
        "Product.AlcoholClass.Group" => [
            "name" => "Alcohol product group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Stock list"
            ]
        ],
        "Sum.ResignedSum" => [
            "name" => "Amount",
            "type" => "MONEY",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Finances",
                "P&L"
            ]
        ],
        "Product.AvgSum" => [
            "name" => "Average price",
            "type" => "MONEY",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Stock list"
            ]
        ],
        "CashFlowCategory" => [
            "name" => "CF item",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Cash flow"
            ]
        ],
        "CashFlowCategory.Type" => [
            "name" => "CF item type",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Cash flow"
            ]
        ],
        "CashFlowCategory.Hierarchy" => [
            "name" => "CF items hierarchy",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Cash flow"
            ]
        ],
        "Session.CashRegister" => [
            "name" => "Cash register",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Department.Category1" => [
            "name" => "Category 1",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Department.Category2" => [
            "name" => "Category 2",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Department.Category3" => [
            "name" => "Category 3",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Department.Category4" => [
            "name" => "Category 4",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Department.Category5" => [
            "name" => "Category 5",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "FinalBalance.Money" => [
            "name" => "Closing cash balance",
            "type" => "MONEY",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "TBSH"
            ]
        ],
        "FinalBalance.Amount" => [
            "name" => "Closing stock balance",
            "type" => "AMOUNT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "TBSH"
            ]
        ],
        "Contr-Product.AlcoholClass.Code" => [
            "name" => "Code of alcohol product class",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Correspondent"
            ]
        ],
        "Product.AlcoholClass.Code" => [
            "name" => "Code of alcohol product class",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Stock list"
            ]
        ],
        "Comment" => [
            "name" => "Comment",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Transaction"
            ]
        ],
        "Conception" => [
            "name" => "Concept",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation",
                "Organization"
            ]
        ],
        "Conception.Code" => [
            "name" => "Concept code",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation",
                "Organization"
            ]
        ],
        "Amount.Out" => [
            "name" => "Consumption (qty)",
            "type" => "AMOUNT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Stock list",
                "TBSH"
            ]
        ],
        "Counteragent.Name" => [
            "name" => "Contractor",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Counteragent.Id" => [
            "name" => "Contractor ID",
            "type" => "ID_STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Account.CounteragentType" => [
            "name" => "Contractor type",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Contr-Account.Code" => [
            "name" => "Corr. Account Code",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Account.Group" => [
            "name" => "Corr. Account group",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Account.Type" => [
            "name" => "Corr. Account type",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Account.Name" => [
            "name" => "Corr. Account/Storage",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.AccountingCategory" => [
            "name" => "Corr. Accounting Category",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.TopParent" => [
            "name" => "Corr. Level 1 Stock List Group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.SecondParent" => [
            "name" => "Corr. Level 2 Stock List Group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.ThirdParent" => [
            "name" => "Corr. Level 3 Stock List Group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.MeasureUnit" => [
            "name" => "Corr. Measurement Unit",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Amount" => [
            "name" => "Corr. Quantity",
            "type" => "AMOUNT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.Num" => [
            "name" => "Corr. SKU of item",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.Category" => [
            "name" => "Corr. Stock List Category",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.Hierarchy" => [
            "name" => "Corr. Stock List Hierarchy",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.Name" => [
            "name" => "Corr. Stock list item",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.CookingPlaceType" => [
            "name" => "Corr. Type of Production Place",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.Type" => [
            "name" => "Corr. Type of stock list item",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.Id" => [
            "name" => "Corr. item list ID",
            "type" => "ID_STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "Contr-Product.Category.Id" => [
            "name" => "Corr. of item list category ID",
            "type" => "ID_STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Correspondent"
            ]
        ],
        "DateTime.Typed" => [
            "name" => "Date and time",
            "type" => "DATETIME",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "DateTime.DayOfWeak" => [
            "name" => "Day of week",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "TransactionSide" => [
            "name" => "Debit/Credit",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Transaction"
            ]
        ],
        "Document" => [
            "name" => "Document No.",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Transaction"
            ]
        ],
        "Sum.Outgoing" => [
            "name" => "Expenditure amount",
            "type" => "MONEY",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Finances",
                "TBSH"
            ]
        ],
        "Session.Group" => [
            "name" => "Group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Session.GroupId" => [
            "name" => "Group ID",
            "type" => "ID",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "DateTime.Hour" => [
            "name" => "Hour",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "Product.Category.Id" => [
            "name" => "Item list category ID",
            "type" => "ID_STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Product.Id" => [
            "name" => "Item list element ID",
            "type" => "ID_STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Department.JurPerson" => [
            "name" => "Legal entity",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "CashFlowCategory.HierarchyLevel1" => [
            "name" => "Level 1 CF item",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Cash flow"
            ]
        ],
        "Account.AccountHierarchyTop" => [
            "name" => "Level 1 account",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Product.TopParent" => [
            "name" => "Level 1 stock list group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "CashFlowCategory.HierarchyLevel2" => [
            "name" => "Level 2 CF item",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Cash flow"
            ]
        ],
        "Account.AccountHierarchySecond" => [
            "name" => "Level 2 account",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Product.SecondParent" => [
            "name" => "Level 2 stock list group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "CashFlowCategory.HierarchyLevel3" => [
            "name" => "Level 3 CF item",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Cash flow"
            ]
        ],
        "Account.AccountHierarchyThird" => [
            "name" => "Level 3 account",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Product.ThirdParent" => [
            "name" => "Level 3 stock list group",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Product.MeasureUnit" => [
            "name" => "Measurement unit",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "DateTime.Month" => [
            "name" => "Month",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "StartBalance.Money" => [
            "name" => "Opening cash balance",
            "type" => "MONEY",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "TBSH"
            ]
        ],
        "StartBalance.Amount" => [
            "name" => "Opening stock balance",
            "type" => "AMOUNT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "TBSH"
            ]
        ],
        "OrderId" => [
            "name" => "Order ID",
            "type" => "ID",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Transaction"
            ]
        ],
        "OrderNum" => [
            "name" => "Order number",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Transaction"
            ]
        ],
        "Department" => [
            "name" => "Outlet",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Account.IsCashFlowAccount" => [
            "name" => "Participates in cash flow",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts",
                "Cash flow"
            ]
        ],
        "Amount" => [
            "name" => "Quantity",
            "type" => "AMOUNT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Stock list",
                "TBSH"
            ]
        ],
        "DateTime.Quarter" => [
            "name" => "Quarter",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "Amount.In" => [
            "name" => "Receipt (qty)",
            "type" => "AMOUNT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Stock list",
                "TBSH"
            ]
        ],
        "Sum.Incoming" => [
            "name" => "Receipt amount",
            "type" => "MONEY",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Finances",
                "TBSH"
            ]
        ],
        "Product.Num" => [
            "name" => "SKU",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Session.RestaurantSection" => [
            "name" => "Section",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "Product.Category" => [
            "name" => "Stock list category",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Product.Hierarchy" => [
            "name" => "Stock list hierarchy",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Product.Name" => [
            "name" => "Stock list item",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Product.Type" => [
            "name" => "Stock list type",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "Store" => [
            "name" => "Storage",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Organization"
            ]
        ],
        "Account.StoreOrAccount" => [
            "name" => "Storage/account",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Accounts"
            ]
        ],
        "Department.Code" => [
            "name" => "Subdivision code",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Corporation"
            ]
        ],
        "TransactionType.Code" => [
            "name" => "Transaction code",
            "type" => "OBJECT",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Transaction"
            ]
        ],
        "DateSecondary.DateTyped" => [
            "name" => "Transaction date",
            "type" => "DATE",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "DateSecondary.DateTimeTyped" => [
            "name" => "Transaction date and time",
            "type" => "DATETIME",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "TransactionType" => [
            "name" => "Transaction type",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Transaction"
            ]
        ],
        "Amount.StoreInOutTyped" => [
            "name" => "Turnover of stock list items",
            "type" => "AMOUNT",
            "aggregationAllowed" => true,
            "groupingAllowed" => false,
            "filteringAllowed" => false,
            "tags" => [
                "Stock list",
                "TBSH"
            ]
        ],
        "Contr-Product.AlcoholClass.Type" => [
            "name" => "Type of alcohol products",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Correspondent"
            ]
        ],
        "Product.AlcoholClass.Type" => [
            "name" => "Type of alcohol products",
            "type" => "ENUM",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Alcohol",
                "Stock list"
            ]
        ],
        "Product.CookingPlaceType" => [
            "name" => "Type of production place",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Stock list"
            ]
        ],
        "DateTime.WeekInMonth" => [
            "name" => "Week of month",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "DateTime.WeekInYear" => [
            "name" => "Week of year",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ],
        "DateTime.Year" => [
            "name" => "Year",
            "type" => "STRING",
            "aggregationAllowed" => false,
            "groupingAllowed" => true,
            "filteringAllowed" => true,
            "tags" => [
                "Date and time"
            ]
        ]
    ];
}