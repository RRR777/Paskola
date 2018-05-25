<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCreditRequest;
use App\Credit;
use Carbon\Carbon;

class CreditController extends Controller
{
    public function create()
    {
        return view('home');
    }
    public function store(CreateCreditRequest $request)
    {
        $credit = new Credit;
        $credit->paymentDate = $request->input('paymentDate');
        $credit->creditAmount = $request->input('creditAmount');
        $credit->interestRate = $request->input('interestRate');
        $credit->paymentsNumber = $request->input('paymentsNumber');
        $credit->interestMonthly = Credit::interestToMonth($credit->interestRate);
        $credit->annuityCoefficient = Credit::annuityCoefficientCount(
            $credit->interestMonthly, 
            $credit->paymentsNumber);
        $credit->totalPaymentPerMonth = Credit::totalPaymentPerMonthCount(
            $credit->annuityCoefficient,
            $credit->creditAmount);

        $paymentsData = Credit::annuityCreditCount($credit);

        self::writeToFile($paymentsData);

        return view('/payments', compact('paymentsData'));
    }

    public function writeToFile($data)
    {
        $file = fopen('payments.csv', 'w');
        foreach($data as $line){
            fputcsv($file, $line, '|');
        }
        fclose($file);
    }
}
