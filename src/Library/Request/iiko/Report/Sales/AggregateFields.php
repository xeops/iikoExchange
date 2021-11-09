<?php 
namespace IikoApiBundle\Reports\Olap\Version52\Sales; 
class AggregateFields { 
       /** PercentOfSummary.ByCol PERCENT */ 
       /** % by column */ 
       /** @var string PercentOfSummaryByCol */ 
       const PercentOfSummaryByCol = "PercentOfSummary.ByCol"; 

       /** PercentOfSummary.ByRow PERCENT */ 
       /** % by row */ 
       /** @var string PercentOfSummaryByRow */ 
       const PercentOfSummaryByRow = "PercentOfSummary.ByRow"; 

       /** fullSum MONEY */ 
       /** Amount excl. VAT not included in the cost */ 
       /** @var string fullSum */ 
       const fullSum = "fullSum"; 

       /** Currencies.SumInCurrency OBJECT */ 
       /** Amount in currency of payment/order */ 
       /** @var string CurrenciesSumInCurrency */ 
       const CurrenciesSumInCurrency = "Currencies.SumInCurrency"; 

       /** DishDiscountSumInt MONEY */ 
       /** Amount with discount */ 
       /** @var string DishDiscountSumInt */ 
       const DishDiscountSumInt = "DishDiscountSumInt"; 

       /** DishDiscountSumInt.withoutVAT MONEY */ 
       /** Amount with discount VAT exclusive */ 
       /** @var string DishDiscountSumIntwithoutVAT */ 
       const DishDiscountSumIntwithoutVAT = "DishDiscountSumInt.withoutVAT"; 

       /** sumAfterDiscountWithoutVAT MONEY */ 
       /** Amount with discount excl. VAT not included in the cost */ 
       /** @var string sumAfterDiscountWithoutVAT */ 
       const sumAfterDiscountWithoutVAT = "sumAfterDiscountWithoutVAT"; 

       /** DishSumInt MONEY */ 
       /** Amount without discount */ 
       /** @var string DishSumInt */ 
       const DishSumInt = "DishSumInt"; 

       /** DishAmountInt.PerOrder AMOUNT */ 
       /** Ave. quantity of items per receipt */ 
       /** @var string DishAmountIntPerOrder */ 
       const DishAmountIntPerOrder = "DishAmountInt.PerOrder"; 

       /** DishDiscountSumInt.average MONEY */ 
       /** Average bill amount */ 
       /** @var string DishDiscountSumIntaverage */ 
       const DishDiscountSumIntaverage = "DishDiscountSumInt.average"; 

       /** Delivery.AggregatedAvgCourierMark AMOUNT */ 
       /** Average courier rating, % */ 
       /** @var string DeliveryAggregatedAvgCourierMark */ 
       const DeliveryAggregatedAvgCourierMark = "Delivery.AggregatedAvgCourierMark"; 

       /** Delivery.AggregatedAvgMark AMOUNT */ 
       /** Average delivery rating, % */ 
       /** @var string DeliveryAggregatedAvgMark */ 
       const DeliveryAggregatedAvgMark = "Delivery.AggregatedAvgMark"; 

       /** Delivery.AggregatedAvgFoodMark AMOUNT */ 
       /** Average kitchen rating, % */ 
       /** @var string DeliveryAggregatedAvgFoodMark */ 
       const DeliveryAggregatedAvgFoodMark = "Delivery.AggregatedAvgFoodMark"; 

       /** Delivery.AggregatedAvgOperatorMark AMOUNT */ 
       /** Average operator rating, % */ 
       /** @var string DeliveryAggregatedAvgOperatorMark */ 
       const DeliveryAggregatedAvgOperatorMark = "Delivery.AggregatedAvgOperatorMark"; 

       /** DishDiscountSumInt.averagePrice MONEY */ 
       /** Average price (VAT exclusive) */ 
       /** @var string DishDiscountSumIntaveragePrice */ 
       const DishDiscountSumIntaveragePrice = "DishDiscountSumInt.averagePrice"; 

       /** DishDiscountSumInt.averageByGuest MONEY */ 
       /** Average revenue per guest */ 
       /** @var string DishDiscountSumIntaverageByGuest */ 
       const DishDiscountSumIntaverageByGuest = "DishDiscountSumInt.averageByGuest"; 

       /** OrderTime.AveragePrechequeTime AMOUNT */ 
       /** Avg time in guest bill (min) */ 
       /** @var string OrderTimeAveragePrechequeTime */ 
       const OrderTimeAveragePrechequeTime = "OrderTime.AveragePrechequeTime"; 

       /** Delivery.DelayAvg AMOUNT */ 
       /** Avg. delay in delivery (min) */ 
       /** @var string DeliveryDelayAvg */ 
       const DeliveryDelayAvg = "Delivery.DelayAvg"; 

       /** GuestNum.Avg AMOUNT */ 
       /** AvgNumber of guests per receipt */ 
       /** @var string GuestNumAvg */ 
       const GuestNumAvg = "GuestNum.Avg"; 

       /** OrderTime.AverageOrderTime AMOUNT */ 
       /** AvgServing time (min) */ 
       /** @var string OrderTimeAverageOrderTime */ 
       const OrderTimeAverageOrderTime = "OrderTime.AverageOrderTime"; 

       /** Delivery.WayDurationAvg AMOUNT */ 
       /** AvgTravel time (min) */ 
       /** @var string DeliveryWayDurationAvg */ 
       const DeliveryWayDurationAvg = "Delivery.WayDurationAvg"; 

       /** Bonus.Sum MONEY */ 
       /** Bonus amount */ 
       /** @var string BonusSum */ 
       const BonusSum = "Bonus.Sum"; 

       /** ProductCostBase.PercentWithoutVAT PERCENT */ 
       /** CoG w/out VAT(%) */ 
       /** @var string ProductCostBasePercentWithoutVAT */ 
       const ProductCostBasePercentWithoutVAT = "ProductCostBase.PercentWithoutVAT"; 

       /** Cooking.CookingLateTime.Avg DURATION_IN_SECONDS */ 
       /** Cooking delay (average) */ 
       /** @var string CookingCookingLateTimeAvg */ 
       const CookingCookingLateTimeAvg = "Cooking.CookingLateTime.Avg"; 

       /** ProductCostBase.ProductCost MONEY */ 
       /** Cost */ 
       /** @var string ProductCostBaseProductCost */ 
       const ProductCostBaseProductCost = "ProductCostBase.ProductCost"; 

       /** ProductCostBase.OneItem MONEY */ 
       /** Cost per unit */ 
       /** @var string ProductCostBaseOneItem */ 
       const ProductCostBaseOneItem = "ProductCostBase.OneItem"; 

       /** ProductCostBase.Percent PERCENT */ 
       /** Cost(%) */ 
       /** @var string ProductCostBasePercent */ 
       const ProductCostBasePercent = "ProductCostBase.Percent"; 

       /** Cooking.StartDelayTime.Avg DURATION_IN_SECONDS */ 
       /** Delay of start of cooking (average) */ 
       /** @var string CookingStartDelayTimeAvg */ 
       const CookingStartDelayTimeAvg = "Cooking.StartDelayTime.Avg"; 

       /** DiscountSum MONEY */ 
       /** Discount amount */ 
       /** @var string DiscountSum */ 
       const DiscountSum = "DiscountSum"; 

       /** discountWithoutVAT MONEY */ 
       /** Discount amount excl. VAT not included in the cost */ 
       /** @var string discountWithoutVAT */ 
       const discountWithoutVAT = "discountWithoutVAT";

		/** discountWithoutVAT MONEY */
		/** Amount with discount VAT exclusive */
		/** @var string dishDiscountSumInt.withoutVAT */
		const DishDiscountSumIntWithoutVAT = "DishDiscountSumInt.withoutVAT";

       /** DiscountPercent PERCENT */ 
       /** Discount rate */ 
       /** @var string DiscountPercent */ 
       const DiscountPercent = "DiscountPercent"; 

       /** Cooking.CookingDuration.Avg DURATION_IN_SECONDS */ 
       /** Duration of cooking (average) */ 
       /** @var string CookingCookingDurationAvg */ 
       const CookingCookingDurationAvg = "Cooking.CookingDuration.Avg"; 

       /** Cooking.Cooking1Duration.Avg DURATION_IN_SECONDS */ 
       /** Duration of cooking 1 (average) */ 
       /** @var string CookingCooking1DurationAvg */ 
       const CookingCooking1DurationAvg = "Cooking.Cooking1Duration.Avg"; 

       /** Cooking.Cooking2Duration.Avg DURATION_IN_SECONDS */ 
       /** Duration of cooking 2 (average) */ 
       /** @var string CookingCooking2DurationAvg */ 
       const CookingCooking2DurationAvg = "Cooking.Cooking2Duration.Avg"; 

       /** Cooking.Cooking3Duration.Avg DURATION_IN_SECONDS */ 
       /** Duration of cooking 3 (average) */ 
       /** @var string CookingCooking3DurationAvg */ 
       const CookingCooking3DurationAvg = "Cooking.Cooking3Duration.Avg"; 

       /** Cooking.Cooking4Duration.Avg DURATION_IN_SECONDS */ 
       /** Duration of cooking 4 (average) */ 
       /** @var string CookingCooking4DurationAvg */ 
       const CookingCooking4DurationAvg = "Cooking.Cooking4Duration.Avg"; 

       /** Cooking.ServeTime.Avg DURATION_IN_SECONDS */ 
       /** Duration of guest serving (average) */ 
       /** @var string CookingServeTimeAvg */ 
       const CookingServeTimeAvg = "Cooking.ServeTime.Avg"; 

       /** Cooking.GuestWaitTime.Avg DURATION_IN_SECONDS */ 
       /** Duration of guest waiting time (average) */ 
       /** @var string CookingGuestWaitTimeAvg */ 
       const CookingGuestWaitTimeAvg = "Cooking.GuestWaitTime.Avg"; 

       /** Cooking.KitchenTime.Avg DURATION_IN_SECONDS */ 
       /** Duration of kitchen work (average) */ 
       /** @var string CookingKitchenTimeAvg */ 
       const CookingKitchenTimeAvg = "Cooking.KitchenTime.Avg"; 

       /** Delivery.CookingToSendDuration INTEGER */ 
       /** Duration: latest serv. print-sending */ 
       /** @var string DeliveryCookingToSendDuration */ 
       const DeliveryCookingToSendDuration = "Delivery.CookingToSendDuration"; 

       /** DishServicePrintTime.OpenToLastPrintDuration INTEGER */ 
       /** Duration: open latest serv. print. */ 
       /** @var string DishServicePrintTimeOpenToLastPrintDuration */ 
       const DishServicePrintTimeOpenToLastPrintDuration = "DishServicePrintTime.OpenToLastPrintDuration"; 

       /** IncentiveSumBase.Sum MONEY */ 
       /** Incentive payment */ 
       /** @var string IncentiveSumBaseSum */ 
       const IncentiveSumBaseSum = "IncentiveSumBase.Sum"; 

       /** ProductCostBase.Profit MONEY */ 
       /** Markup */ 
       /** @var string ProductCostBaseProfit */ 
       const ProductCostBaseProfit = "ProductCostBase.Profit"; 

       /** ProductCostBase.MarkUp PERCENT */ 
       /** Markup (%) */ 
       /** @var string ProductCostBaseMarkUp */ 
       const ProductCostBaseMarkUp = "ProductCostBase.MarkUp"; 

       /** GuestNum AMOUNT */ 
       /** Number of guests */ 
       /** @var string GuestNum */ 
       const GuestNum = "GuestNum"; 

       /** PayTypes.VoucherNum INTEGER */ 
       /** Number of vouchers */ 
       /** @var string PayTypesVoucherNum */ 
       const PayTypesVoucherNum = "PayTypes.VoucherNum"; 

       /** DishAmountInt AMOUNT */ 
       /** Number of ﻿items */ 
       /** @var string DishAmountInt */ 
       const DishAmountInt = "DishAmountInt"; 

       /** OrderItems INTEGER */ 
       /** Order items */ 
       /** @var string OrderItems */ 
       const OrderItems = "OrderItems"; 

       /** UniqOrderId INTEGER */ 
       /** Orders */ 
       /** @var string UniqOrderId */ 
       const UniqOrderId = "UniqOrderId"; 

       /** UniqOrderId.OrdersCount AMOUNT */ 
       /** Orders */ 
       /** @var string UniqOrderIdOrdersCount */ 
       const UniqOrderIdOrdersCount = "UniqOrderId.OrdersCount"; 

       /** OrderNum INTEGER */ 
       /** Receipt number */ 
       /** @var string OrderNum */ 
       const OrderNum = "OrderNum"; 

       /** DishServicePrintTime.Max DATETIME */ 
       /** Service printing latest item */ 
       /** @var string DishServicePrintTimeMax */ 
       const DishServicePrintTimeMax = "DishServicePrintTime.Max"; 

       /** Cooking.FeedLateTime.Avg DURATION_IN_SECONDS */ 
       /** Serving delay (average) */ 
       /** @var string CookingFeedLateTimeAvg */ 
       const CookingFeedLateTimeAvg = "Cooking.FeedLateTime.Avg"; 

       /** OrderTime.OrderLengthSum INTEGER */ 
       /** Serving time (min) */ 
       /** @var string OrderTimeOrderLengthSum */ 
       const OrderTimeOrderLengthSum = "OrderTime.OrderLengthSum"; 

       /** IncreaseSum MONEY */ 
       /** Surcharge amount */ 
       /** @var string IncreaseSum */ 
       const IncreaseSum = "IncreaseSum"; 

       /** IncreasePercent PERCENT */ 
       /** Surcharge rate */ 
       /** @var string IncreasePercent */ 
       const IncreasePercent = "IncreasePercent"; 

       /** Delivery.WayDurationSum INTEGER */ 
       /** Tot. travel time (min) */ 
       /** @var string DeliveryWayDurationSum */ 
       const DeliveryWayDurationSum = "Delivery.WayDurationSum"; 

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

}

