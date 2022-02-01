<?php


namespace iikoExchangeBundle\Library\Request\iiko\Report\Sales;


class FieldsDirectory
{

    public static $data =

        [
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
            "CloseTime.Minutes15" => [
                "name" => "15-minutes closing interval",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "OpenTime.Minutes15" => [
                "name" => "15-minutes opening interval",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "OpenDate.Typed" => [
                "name" => "Accounting day",
                "type" => "DATE",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "Delivery.ActualTime" => [
                "name" => "Actual delivery time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.MarketingSource" => [
                "name" => "Ad",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.Address" => [
                "name" => "Address",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.ExternalCartographyId" => [
                "name" => "Address ID",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "fullSum" => [
                "name" => "Amount excl. VAT not included in the cost",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Discounts/surcharges",
                    "Payment",
                    "VAT"
                ]
            ],
            "Currencies.SumInCurrency" => [
                "name" => "Amount in currency of payment/order",
                "type" => "OBJECT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "sumAfterDiscountWithoutVAT" => [
                "name" => "Amount with discount excl. VAT not included in the cost",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Discounts/surcharges",
                    "Payment",
                    "VAT"
                ]
            ],
            "Card" => [
                "name" => "Authentication card",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "AuthUser" => [
                "name" => "Authorised by",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "AuthUser.Id" => [
                "name" => "Authorised by ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "DishAmountInt.PerOrder" => [
                "name" => "Ave. quantity of items per receipt",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Order"
                ]
            ],
            "DishDiscountSumInt.average" => [
                "name" => "Average bill amount",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "Delivery.AggregatedAvgMark" => [
                "name" => "Average delivery rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "Delivery.AggregatedAvgCourierMark" => [
                "name" => "Average driver rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "Delivery.AggregatedAvgFoodMark" => [
                "name" => "Average kitchen rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "Delivery.AggregatedAvgOperatorMark" => [
                "name" => "Average operator rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "DishDiscountSumInt.averagePriceWithVAT" => [
                "name" => "Average price",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "DishDiscountSumInt.averagePrice" => [
                "name" => "Average price (VAT exclusive)",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "DishSumInt.averagePriceWithVAT" => [
                "name" => "Average price before discount",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "DishDiscountSumInt.averageByGuest" => [
                "name" => "Average revenue per guest",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "OrderTime.AveragePrechequeTime" => [
                "name" => "Avg time in guest bill (min)",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "Delivery.DelayAvg" => [
                "name" => "Avg. delay in delivery (min)",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Delivery",
                    "Time intervals"
                ]
            ],
            "GuestNum.Avg" => [
                "name" => "AvgNumber of guests per receipt",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Customers"
                ]
            ],
            "OrderTime.AverageOrderTime" => [
                "name" => "AvgServing time (min)",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "Delivery.WayDurationAvg" => [
                "name" => "AvgTravel time (min)",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Delivery",
                    "Time intervals"
                ]
            ],
            "Banquet" => [
                "name" => "Banquet",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "UniqOrderId" => [
                "name" => "Bills",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Order"
                ]
            ],
            "Bonus.Sum" => [
                "name" => "Bonus amount",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Bonuses"
                ]
            ],
            "Bonus.CardNumber" => [
                "name" => "Bonus card number",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Bonuses"
                ]
            ],
            "Bonus.Type" => [
                "name" => "Bonus type",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Bonuses"
                ]
            ],
            "CardOwner" => [
                "name" => "Cardholder",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers"
                ]
            ],
            "CashRegisterName" => [
                "name" => "Cash register",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "CashLocation" => [
                "name" => "Cash register location",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "CashRegisterName.Number" => [
                "name" => "Cash register number",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "Cashier" => [
                "name" => "Cashier",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "Cashier.Id" => [
                "name" => "Cashier ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
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
            "Delivery.City" => [
                "name" => "City",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "HourClose" => [
                "name" => "Closing hour",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "CloseTime" => [
                "name" => "Closing time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "ProductCostBase.PercentWithoutVAT" => [
                "name" => "CoG w/out VAT(%)",
                "type" => "PERCENT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Cost"
                ]
            ],
            "Delivery.CustomerComment" => [
                "name" => "Comment to client",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Delivery"
                ]
            ],
            "CreditUser.Company" => [
                "name" => "Company-contractor",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees",
                    "Payment"
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
            "Cooking.CookingLateTime.Avg" => [
                "name" => "Cooking delay (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "Delivery.CookingFinishTime" => [
                "name" => "Cooking finish time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Cooking.StartDelayTime.Avg" => [
                "name" => "Cooking start delay (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "Cooking.CookingDuration.Avg" => [
                "name" => "Cooking time (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "Cooking.Cooking1Duration.Avg" => [
                "name" => "Cooking time 1 (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "Cooking.Cooking2Duration.Avg" => [
                "name" => "Cooking time 2 (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "Cooking.Cooking3Duration.Avg" => [
                "name" => "Cooking time 3 (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "Cooking.Cooking4Duration.Avg" => [
                "name" => "Cooking time 4 (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "ProductCostBase.ProductCost" => [
                "name" => "Cost",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Cost"
                ]
            ],
            "ProductCostBase.OneItem" => [
                "name" => "Cost per unit",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Cost"
                ]
            ],
            "ProductCostBase.Percent" => [
                "name" => "Cost(%)",
                "type" => "PERCENT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Cost"
                ]
            ],
            "Cooking.ServeNumber" => [
                "name" => "Course number",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Preparation"
                ]
            ],
            "CardType" => [
                "name" => "Credit card",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "CreditUser" => [
                "name" => "Credited to...",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees",
                    "Payment"
                ]
            ],
            "Currencies.Currency" => [
                "name" => "Currency of payment",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "Currencies.CurrencyRate" => [
                "name" => "Currency of payment",
                "type" => "MONEY",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "Delivery.CustomerMarketingSource" => [
                "name" => "Customer ad",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "Delivery.CustomerCardNumber" => [
                "name" => "Customer card number",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "Delivery.CustomerCardType" => [
                "name" => "Customer card type",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "Delivery.CustomerCreatedDateTyped" => [
                "name" => "Customer creation date",
                "type" => "DATE",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "Delivery.CustomerOpinionComment" => [
                "name" => "Customer feedback",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "Delivery.CustomerName" => [
                "name" => "Customer full name",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "Delivery.CustomerPhone" => [
                "name" => "Customer phone number",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "PriceCategory" => [
                "name" => "Customer price category",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "DayOfWeekOpen" => [
                "name" => "Day of week",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "Delivery.IsDelivery" => [
                "name" => "Delivery",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.CancelComment" => [
                "name" => "Delivery cancellation comment",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.CancelCause" => [
                "name" => "Delivery cancellation reason",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.CloseTime" => [
                "name" => "Delivery closing time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.DeliveryComment" => [
                "name" => "Delivery comments",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.Delay" => [
                "name" => "Delivery delay (min)",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.DiffBetweenActualDeliveryTimeAndPredictedDeliveryTime" => [
                "name" => "Delivery delay, actual vs forecast (min)",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.SendTime" => [
                "name" => "Delivery dispatch time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.Email" => [
                "name" => "Delivery email",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "Delivery.DeliveryOperator" => [
                "name" => "Delivery operator",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.DeliveryOperator.Id" => [
                "name" => "Delivery operator ID",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.Phone" => [
                "name" => "Delivery phone number",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Delivery customer"
                ]
            ],
            "Delivery.PrintTime" => [
                "name" => "Delivery print time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.AvgMark" => [
                "name" => "Delivery rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "Delivery.SourceKey" => [
                "name" => "Delivery source",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.ServiceType" => [
                "name" => "Delivery type",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Department.Id" => [
                "name" => "Department ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Corporation",
                    "Organization"
                ]
            ],
            "DiscountSum" => [
                "name" => "Discount amount",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Discounts/surcharges",
                    "Payment"
                ]
            ],
            "discountWithoutVAT" => [
                "name" => "Discount amount excl. VAT not included in the cost",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Discounts/surcharges",
                    "Payment",
                    "VAT"
                ]
            ],
            "DiscountPercent" => [
                "name" => "Discount rate",
                "type" => "PERCENT",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Discounts/surcharges",
                    "Payment"
                ]
            ],
            "OrderDiscount.Type" => [
                "name" => "Discount type",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "OrderDiscount.Type.IDs" => [
                "name" => "Discount type (ID)",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "Delivery.Courier" => [
                "name" => "Driver",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.Courier.Id" => [
                "name" => "Driver ID",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.AvgCourierMark" => [
                "name" => "Driver rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "Delivery.CookingToSendDuration" => [
                "name" => "Duration => latest serv. print-sending",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "DishServicePrintTime.OpenToLastPrintDuration" => [
                "name" => "Duration => open latest serv. print.",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Time"
                ]
            ],
            "CashRegisterName.CashRegisterSerialNumber" => [
                "name" => "FCR serial number",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "PayTypes.IsPrintCheque" => [
                "name" => "Fisc. payment type",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "Delivery.PredictedDeliveryTime" => [
                "name" => "Forecast delivery time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.PredictedCookingCompleteTime" => [
                "name" => "Forecast of the order cooking completion time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Store.Name" => [
                "name" => "From storage",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "DishFullName" => [
                "name" => "Full name of item",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishDiscountSumInt" => [
                "name" => "Gross Sales (after discount)",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "DishSumInt" => [
                "name" => "Gross Sales (before discount)",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "RestorauntGroup" => [
                "name" => "Group",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "RestorauntGroup.Id" => [
                "name" => "Group ID",
                "type" => "ID",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "PrechequeTime" => [
                "name" => "Guest bill time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "OrderDiscount.GuestCard" => [
                "name" => "Guest card",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "DishTaxCategory.Id" => [
                "name" => "ID tax bracket",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "IncentiveSumBase.Sum" => [
                "name" => "Incentive bonus",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Bonuses"
                ]
            ],
            "Delivery.BillTime" => [
                "name" => "Invoice print time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "DishName" => [
                "name" => "Item",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishId" => [
                "name" => "Item ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishCategory.Accounting" => [
                "name" => "Item accounting category",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishCategory" => [
                "name" => "Item category",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishCategory.Id" => [
                "name" => "Item category ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishCode" => [
                "name" => "Item code",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "Comment" => [
                "name" => "Item comment",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "DeletedWithWriteoff" => [
                "name" => "Item deleted",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DeletionComment" => [
                "name" => "Item deletion comment",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "DishGroup" => [
                "name" => "Item group",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishGroup.Id" => [
                "name" => "Item group ID",
                "type" => "ID",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishGroup.Num" => [
                "name" => "Item group code",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishGroup.Hierarchy" => [
                "name" => "Item hierarchy",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishForeignName" => [
                "name" => "Item name in foreign language",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishCode.Quick" => [
                "name" => "Item quick code",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishSize.Name" => [
                "name" => "Item size",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishSize.Id" => [
                "name" => "Item size ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishSize.ShortName" => [
                "name" => "Item size code",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishSize.Scale.Id" => [
                "name" => "Item size scale ID",
                "type" => "ID",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishSize.Priority" => [
                "name" => "Item size sequence number",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishSize.Scale.Name" => [
                "name" => "Item sizes scale",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "WaiterName" => [
                "name" => "Item waiter",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "WaiterName.ID" => [
                "name" => "Item waiter ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "Delivery.AvgFoodMark" => [
                "name" => "Kitchen rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "Cooking.KitchenTime.Avg" => [
                "name" => "Kitchen work hours (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "JurName" => [
                "name" => "Legal entity",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Corporation",
                    "Organization"
                ]
            ],
            "DishGroup.TopParent" => [
                "name" => "Level 1 item group",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishGroup.SecondParent" => [
                "name" => "Level 2 item group",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishGroup.ThirdParent" => [
                "name" => "Level 3 item group",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "SoldWithDish.Id" => [
                "name" => "Main item ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "ProductCostBase.Profit" => [
                "name" => "Markup",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Cost"
                ]
            ],
            "ProductCostBase.MarkUp" => [
                "name" => "Markup (%)",
                "type" => "PERCENT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Cost"
                ]
            ],
            "DishMeasureUnit" => [
                "name" => "Measurement unit",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "Mounth" => [
                "name" => "Month",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "ItemSaleEventDiscountType" => [
                "name" => "Name of discount, markup",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Discounts/surcharges",
                    "Items"
                ]
            ],
            "DishDiscountSumInt.withoutVAT" => [
                "name" => "Net Sales (after discount)",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "NonCashPaymentType" => [
                "name" => "Non-cash payment type",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "ItemSaleEventDiscountType.ComboAmount" => [
                "name" => "Number of combo discounts",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Discounts/surcharges",
                    "Items"
                ]
            ],
            "Delivery.Number" => [
                "name" => "Number of delivery",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "GuestNum" => [
                "name" => "Number of guests",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers"
                ]
            ],
            "DishAmountInt" => [
                "name" => "Number of items",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "ItemSaleEventDiscountType.DiscountAmount" => [
                "name" => "Number of items with discounts",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Discounts/surcharges",
                    "Items"
                ]
            ],
            "PayTypes.VoucherNum" => [
                "name" => "Number of vouchers",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Payment"
                ]
            ],
            "HourOpen" => [
                "name" => "Opening hour",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "OpenTime" => [
                "name" => "Opening time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "OperationType" => [
                "name" => "Operation",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "Delivery.AvgOperatorMark" => [
                "name" => "Operator rating, %",
                "type" => "AMOUNT",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customer feedback",
                    "Delivery"
                ]
            ],
            "UniqOrderId.Id" => [
                "name" => "Order ID",
                "type" => "ID",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "OrderDeleted" => [
                "name" => "Order deleted",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "OrderItems" => [
                "name" => "Order items",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Order"
                ]
            ],
            "OriginName" => [
                "name" => "Order origin",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "OrderType" => [
                "name" => "Order type",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "OrderWaiter.Id" => [
                "name" => "Order waiter ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees",
                    "Order"
                ]
            ],
            "UniqOrderId.OrdersCount" => [
                "name" => "Orders",
                "type" => "AMOUNT",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Order"
                ]
            ],
            "Department" => [
                "name" => "Outlet",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Corporation",
                    "Organization"
                ]
            ],
            "CardNumber" => [
                "name" => "Pay card type",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "PayTypes.Group" => [
                "name" => "Payment group",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "PayTypes" => [
                "name" => "Payment type",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "PayTypes.GUID" => [
                "name" => "Payment type (ID)",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "PayTypes.Combo" => [
                "name" => "Payment type (comb.)",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment"
                ]
            ],
            "Delivery.ExpectedTime" => [
                "name" => "Planned delivery time",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "Delivery.Index" => [
                "name" => "Postcode",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "PriceCategoryCard" => [
                "name" => "Price Category Card Number",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "PriceCategoryUserCardOwner" => [
                "name" => "Price Category Card Owner",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "PriceCategoryDiscountCardOwner" => [
                "name" => "Price Category Cardholder",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "CookingPlace" => [
                "name" => "Production place",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "QuarterOpen" => [
                "name" => "Quarter",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "RemovalType" => [
                "name" => "Reason for item deletion",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "OrderNum" => [
                "name" => "Receipt number",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "Storned" => [
                "name" => "Receipt voiding",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "DishReturnSum" => [
                "name" => "Refund amount",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "RestaurantSection" => [
                "name" => "Section",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "DishServicePrintTime" => [
                "name" => "Service printing item",
                "type" => "DATETIME",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "DishServicePrintTime.Max" => [
                "name" => "Service printing latest item",
                "type" => "DATETIME",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Time"
                ]
            ],
            "Cooking.FeedLateTime.Avg" => [
                "name" => "Serving delay (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "Cooking.ServeTime.Avg" => [
                "name" => "Serving time (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "OrderTime.OrderLength" => [
                "name" => "Serving time (min)",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "OrderTime.OrderLengthSum" => [
                "name" => "Serving time (min)",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "SessionNum" => [
                "name" => "Shift number",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "SoldWithDish" => [
                "name" => "Sold with item",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "DishType" => [
                "name" => "Stock list type",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "Store.Id" => [
                "name" => "Storage ID",
                "type" => "ID_STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Corporation",
                    "Organization"
                ]
            ],
            "Department.Code" => [
                "name" => "Subdivision code",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Corporation",
                    "Organization"
                ]
            ],
            "IncreaseSum" => [
                "name" => "Surcharge amount",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Discounts/surcharges",
                    "Payment"
                ]
            ],
            "IncreasePercent" => [
                "name" => "Surcharge rate",
                "type" => "PERCENT",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Discounts/surcharges",
                    "Payment"
                ]
            ],
            "TableNum" => [
                "name" => "Table number",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "DishTaxCategory.Name" => [
                "name" => "Tax category",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "SessionID" => [
                "name" => "Till shift ID",
                "type" => "ID",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "OrderTime.PrechequeLength" => [
                "name" => "Time in guest bill (min)",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order",
                    "Time"
                ]
            ],
            "StoreTo" => [
                "name" => "To storage",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Organization"
                ]
            ],
            "Delivery.WayDurationSum" => [
                "name" => "Tot. travel time (min)",
                "type" => "INTEGER",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Delivery",
                    "Time intervals"
                ]
            ],
            "Delivery.WayDuration" => [
                "name" => "Travel time (min)",
                "type" => "INTEGER",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery",
                    "Time"
                ]
            ],
            "CookingPlaceType" => [
                "name" => "Type of production place",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Items"
                ]
            ],
            "OrderIncrease.Type" => [
                "name" => "Type of surcharge",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "OrderIncrease.Type.IDs" => [
                "name" => "Type of surcharge (ID)",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Customers",
                    "Discounts/surcharges"
                ]
            ],
            "VAT.Sum" => [
                "name" => "VAT by bill (Amount)",
                "type" => "MONEY",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment",
                    "VAT"
                ]
            ],
            "VAT.Percent" => [
                "name" => "VAT(%)",
                "type" => "PERCENT",
                "aggregationAllowed" => true,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Payment",
                    "VAT"
                ]
            ],
            "OrderWaiter.Name" => [
                "name" => "Waiter for the order",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees",
                    "Order"
                ]
            ],
            "Cooking.GuestWaitTime.Avg" => [
                "name" => "Waiting time to be served (average)",
                "type" => "DURATION_IN_SECONDS",
                "aggregationAllowed" => true,
                "groupingAllowed" => false,
                "filteringAllowed" => false,
                "tags" => [
                    "Preparation",
                    "Time intervals"
                ]
            ],
            "WeekInMonthOpen" => [
                "name" => "Week of month",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "WeekInYearOpen" => [
                "name" => "Week of year",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "NonCashPaymentType.DocumentType" => [
                "name" => "Write-off document type",
                "type" => "ENUM",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "WriteoffReason" => [
                "name" => "Write-off reason",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Order"
                ]
            ],
            "WriteoffUser" => [
                "name" => "Written off to employee",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Employees"
                ]
            ],
            "YearOpen" => [
                "name" => "Year",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Time"
                ]
            ],
            "Delivery.Region" => [
                "name" => "Zone",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ],
            "Delivery.Street" => [
                "name" => "Zone",
                "type" => "STRING",
                "aggregationAllowed" => false,
                "groupingAllowed" => true,
                "filteringAllowed" => true,
                "tags" => [
                    "Delivery"
                ]
            ]
        ];

}