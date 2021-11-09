<?php


namespace IikoApiBundle\Reports\Olap\Version52\Transactions;


class AggregateFunctions
{
    public static $sumFields = [


       /** Sum.ResignedSum MONEY */ 
       /** Amount */ 
       /** @var string SumResignedSum */ 
       "Sum.ResignedSum",

       /** FinalBalance.Money MONEY */ 
       /** Cash closing balance */ 
       /** @var string FinalBalanceMoney */ 
       "FinalBalance.Money",

       /** StartBalance.Money MONEY */ 
       /** Cash opening balance */ 
       /** @var string StartBalanceMoney */ 
       "StartBalance.Money",

       /** Amount.Out AMOUNT */ 
       /** Consumption (qty) */ 
       /** @var string AmountOut */ 
       "Amount.Out",

       /** Contr-Amount AMOUNT */ 
       /** Corr. Quantity */ 
       /** @var string Contr-Amount */ 
       "Contr-Amount",

       /** Sum.Outgoing MONEY */ 
       /** Expenditure amount */ 
       /** @var string SumOutgoing */ 
       "Sum.Outgoing",

       /** FinalBalance.Amount AMOUNT */ 
       /** Product closing balance */ 
       /** @var string FinalBalanceAmount */ 
       "FinalBalance.Amount",

       /** StartBalance.Amount AMOUNT */ 
       /** Product opening balance */ 
       /** @var string StartBalanceAmount */ 
       "StartBalance.Amount",

       /** Amount AMOUNT */ 
       /** Quantity */ 
       /** @var string Amount */ 
       "Amount",

       /** Amount.In AMOUNT */ 
       /** Receipt (qty) */ 
       /** @var string AmountIn */ 
       "Amount.In",

       /** Sum.Incoming MONEY */ 
       /** Receipt amount */ 
       /** @var string SumIncoming */ 
       "Sum.Incoming",

       /** Amount.StoreInOutTyped AMOUNT */ 
       /** Turnover of stock list items */ 
       /** @var string AmountStoreInOutTyped */ 
       "Amount.StoreInOutTyped",

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