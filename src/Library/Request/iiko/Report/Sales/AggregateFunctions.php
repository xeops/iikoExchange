<?php

    namespace IikoApiBundle\Reports\Olap\Version52\Sales;
    
    class AggregateFunctions {
        
        public static $sumFields = [


            /** fullSum MONEY */
            /** Amount excl. VAT not included in the cost */
            /** @var string fullSum */
            "fullSum",

            /** Currencies.SumInCurrency OBJECT */
            /** Amount in currency of payment/order */
            /** @var string CurrenciesSumInCurrency */
            "Currencies.SumInCurrency",

            /** DishDiscountSumInt MONEY */
            /** Amount with discount */
            /** @var string DishDiscountSumInt */
            "DishDiscountSumInt",

            /** DishDiscountSumInt.withoutVAT MONEY */
            /** Amount with discount VAT exclusive */
            /** @var string DishDiscountSumIntwithoutVAT */
            "DishDiscountSumInt.withoutVAT",

            /** sumAfterDiscountWithoutVAT MONEY */
            /** Amount with discount excl. VAT not included in the cost */
            /** @var string sumAfterDiscountWithoutVAT */
            "sumAfterDiscountWithoutVAT",

            /** DishSumInt MONEY */
            /** Amount without discount */
            /** @var string DishSumInt */
            "DishSumInt",
            

            /** Bonus.Sum MONEY */
            /** Bonus amount */
            /** @var string BonusSum */
            "Bonus.Sum",

            /** ProductCostBase.ProductCost MONEY */
            /** Cost */
            /** @var string ProductCostBaseProductCost */
            "ProductCostBase.ProductCost",
            

            /** DiscountSum MONEY */
            /** Discount amount */
            /** @var string DiscountSum */
            "DiscountSum",

            /** discountWithoutVAT MONEY */
            /** Discount amount excl. VAT not included in the cost */
            /** @var string discountWithoutVAT */
            "discountWithoutVAT",

            /** discountWithoutVAT MONEY */
            /** Amount with discount VAT exclusive */
            /** @var string dishDiscountSumInt.withoutVAT */
            "DishDiscountSumInt.WithoutVAT",

            /** Delivery.CookingToSendDuration INTEGER */
            /** Duration: latest serv. print-sending */
            /** @var string DeliveryCookingToSendDuration */
            "Delivery.CookingToSendDuration",

            /** DishServicePrintTime.OpenToLastPrintDuration INTEGER */
            /** Duration: open latest serv. print. */
            /** @var string DishServicePrintTimeOpenToLastPrintDuration */
            "DishServicePrintTime.OpenToLastPrintDuration",

            /** IncentiveSumBase.Sum MONEY */
            /** Incentive payment */
            /** @var string IncentiveSumBaseSum */
            "IncentiveSumBase.Sum",

            /** ProductCostBase.Profit MONEY */
            /** Markup */
            /** @var string ProductCostBaseProfit */
            "ProductCostBase.Profit",

            /** GuestNum AMOUNT */
            /** Number of guests */
            /** @var string GuestNum */
            "GuestNum",

            /** PayTypes.VoucherNum INTEGER */
            /** Number of vouchers */
            /** @var string PayTypesVoucherNum */
            "PayTypes.VoucherNum",

            /** DishAmountInt AMOUNT */
            /** Number of ﻿items */
            /** @var string DishAmountInt */
            "DishAmountInt",

            /** OrderItems INTEGER */
            /** Order items */
            /** @var string OrderItems */
            "OrderItems",


            /** UniqOrderId.OrdersCount AMOUNT */
            /** Orders */
            /** @var string UniqOrderIdOrdersCount */
            "UniqOrderId.OrdersCount",


            /** OrderTime.OrderLengthSum INTEGER */
            /** Serving time (min) */
            /** @var string OrderTimeOrderLengthSum */
            "OrderTime.OrderLengthSum",

            /** IncreaseSum MONEY */
            /** Surcharge amount */
            /** @var string IncreaseSum */
            "IncreaseSum",

            /** Delivery.WayDurationSum INTEGER */
            /** Tot. travel time (min) */
            /** @var string DeliveryWayDurationSum */
            "Delivery.WayDurationSum",

            /** VAT.Sum MONEY */
            /** VAT by bill (Amount) */
            /** @var string VATSum */
            "VAT.Sum",

            /** DishReturnSum MONEY */
            /** Void amount */
            /** @var string DishReturnSum */
            "DishReturnSum",
        ];


        /**
         * Tells if a total SUM makes sense for the field
         * @param $fieldName
         * @return bool
         */
        public static function canSum($fieldName) {
            return in_array($fieldName, AggregateFunctions::$sumFields);
        }
    }