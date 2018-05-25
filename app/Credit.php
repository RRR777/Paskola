<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Credit extends Model
{
    protected $fillable = ['paymentDate', 'creditAmount', 'interestRate', 'paymentsNumber'];

    public function scopeInterestToMonth($query, $interestRate)
    {
        $rate = $interestRate/12/100;

        return $rate;
    }

    public function scopeAnnuityCoefficientCount($query, $interestMonthly, $paymentsNumber)
    {
        $annuityCoefficient = ($interestMonthly*((1+$interestMonthly)**$paymentsNumber))
            /(((1+$interestMonthly)**$paymentsNumber)-1);

        return $annuityCoefficient;
    }

    public function scopeTotalPaymentPerMonthCount($query, $annuityCoefficient, $creditAmount)
    {
        $totalPaymentPerMonth = bcdiv(($annuityCoefficient * $creditAmount), 1, 2);

        return $totalPaymentPerMonth;
    }

    public function scopeAnnuityCreditCount($query, $credit)
    {
        $inputs[0] = [
            "Payment #",
            "Payment date",
            "Remaining amount",
            "Principal payment",
            "Interest payment",
            "Total payment",
            "Interest rate"
        ];

        $principalPayment = 0;
        $remainingAmount = $credit->creditAmount;

        for ($i=1; $i <= $credit->paymentsNumber; $i++){
            if ($i < $credit->paymentsNumber){
                $remainingAmount -= $principalPayment;
                $interestPayment = round(($credit->interestMonthly * $remainingAmount),2);
                $principalPayment = $credit->totalPaymentPerMonth - $interestPayment;
                $credit->paymentDate = Carbon::parse($credit->paymentDate)->addMonths(1);
                
                $inputs[$i] = [
                    $i,
                    $credit->paymentDate->format('m/d/Y'),
                    $remainingAmount,
                    $principalPayment,
                    $interestPayment,
                    $credit->totalPaymentPerMonth,
                    $credit->interestRate
                ];

            } else if ($i = $credit->paymentsNumber) {
                $remainingAmount -= $principalPayment;
                $interestPayment = round(($credit->interestMonthly * $remainingAmount),2);
                $principalPayment = $remainingAmount;
                $credit->totalPaymentPerMonth = $principalPayment + $interestPayment;
                $credit->paymentDate = Carbon::parse($credit->paymentDate)->addMonths(1);

                $inputs[$i] = [
                    $i,
                    $credit->paymentDate->format('m/d/Y'),
                    $remainingAmount,
                    $principalPayment,
                    $interestPayment,
                    $credit->totalPaymentPerMonth ,
                    $credit->interestRate
                ];
            }
        }
        return $inputs;
    }
}
