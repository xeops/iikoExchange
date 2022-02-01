<?php 

namespace iikoExchangeBundle\Library\Request\iiko\Report\Transactions;
class AggregateFields { 
       /** PercentOfSummary.ByCol PERCENT */ 
       /** % by column */ 
       /** @var string PercentOfSummaryByCol */ 
       const PercentOfSummaryByCol = "PercentOfSummary.ByCol"; 

       /** PercentOfSummary.ByRow PERCENT */ 
       /** % by row */ 
       /** @var string PercentOfSummaryByRow */ 
       const PercentOfSummaryByRow = "PercentOfSummary.ByRow"; 

       /** Sum.PartOfIncome PERCENT */ 
       /** % of revenue */ 
       /** @var string SumPartOfIncome */ 
       const SumPartOfIncome = "Sum.PartOfIncome"; 

       /** Sum.PartOfSummaryByCol PERCENT */ 
       /** % of total by column */ 
       /** @var string SumPartOfSummaryByCol */ 
       const SumPartOfSummaryByCol = "Sum.PartOfSummaryByCol"; 

       /** Sum.PartOfSummaryByRow PERCENT */ 
       /** % of total by row */ 
       /** @var string SumPartOfSummaryByRow */ 
       const SumPartOfSummaryByRow = "Sum.PartOfSummaryByRow"; 

       /** Sum.PartOfTotalIncome PERCENT */ 
       /** % total revenue */ 
       /** @var string SumPartOfTotalIncome */ 
       const SumPartOfTotalIncome = "Sum.PartOfTotalIncome"; 

       /** Sum.ResignedSum MONEY */ 
       /** Amount */ 
       /** @var string SumResignedSum */ 
       const SumResignedSum = "Sum.ResignedSum"; 

       /** Product.AvgSum MONEY */ 
       /** Average price */ 
       /** @var string ProductAvgSum */ 
       const ProductAvgSum = "Product.AvgSum"; 

       /** FinalBalance.Money MONEY */ 
       /** Cash closing balance */ 
       /** @var string FinalBalanceMoney */ 
       const FinalBalanceMoney = "FinalBalance.Money"; 

       /** StartBalance.Money MONEY */ 
       /** Cash opening balance */ 
       /** @var string StartBalanceMoney */ 
       const StartBalanceMoney = "StartBalance.Money"; 

       /** Amount.Out AMOUNT */ 
       /** Consumption (qty) */ 
       /** @var string AmountOut */ 
       const AmountOut = "Amount.Out"; 

       /** Contr-Amount AMOUNT */ 
       /** Corr. Quantity */ 
       /** @var string Contr-Amount */ 
       const ContrAmount = "Contr-Amount";

       /** Sum.Outgoing MONEY */ 
       /** Expenditure amount */ 
       /** @var string SumOutgoing */ 
       const SumOutgoing = "Sum.Outgoing"; 

       /** FinalBalance.Amount AMOUNT */ 
       /** Product closing balance */ 
       /** @var string FinalBalanceAmount */ 
       const FinalBalanceAmount = "FinalBalance.Amount"; 

       /** StartBalance.Amount AMOUNT */ 
       /** Product opening balance */ 
       /** @var string StartBalanceAmount */ 
       const StartBalanceAmount = "StartBalance.Amount"; 

       /** Amount AMOUNT */ 
       /** Quantity */ 
       /** @var string Amount */ 
       const Amount = "Amount"; 

       /** Amount.In AMOUNT */ 
       /** Receipt (qty) */ 
       /** @var string AmountIn */ 
       const AmountIn = "Amount.In"; 

       /** Sum.Incoming MONEY */ 
       /** Receipt amount */ 
       /** @var string SumIncoming */ 
       const SumIncoming = "Sum.Incoming"; 

       /** Amount.StoreInOutTyped AMOUNT */ 
       /** Turnover of stock list items */ 
       /** @var string AmountStoreInOutTyped */ 
       const AmountStoreInOutTyped = "Amount.StoreInOutTyped"; 

}

