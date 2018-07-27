<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Credit;

class CreateCreditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'interestRate' => 'required|numeric|min:1|max:30',
            'paymentsNumber' => 'required|numeric|min:1|max:600',
            'creditAmount' => 'required|numeric|min:1|max:10000000',
            'paymentDate' => 'required|date'
        ];
    }
    public function messages()
    {
        return [
            'interestRate.required' => 'Įveskite Metinių palūkanų normą.',
            'interestRate.numeric' => 'Palūkanų normą įveskite skaičiais.',
            'interestRate.min' => 'Palūkanų norma turi būti teigiama',
            'interestRate.max' => 'Palūkanų norma negali būti didesnė kaip 30',
            'paymentsNumber.required' => 'Įveskite paskolos trukmę mėnesiais.',
            'paymentsNumber.numeric' => 'Paskolos trukmę mėnesiais įveskite skaičiais.',
            'paymentsNumber.min' => 'Paskolos trukmė turi būti teigiama',
            'paymentsNumber.max' => 'Paskolos trukmė negali būti ilgesnė kaip 600',
            'creditAmount.required' => 'Įveskite Paskolos sumą.',
            'creditAmount.numeric' => 'Paskolos sumą įveskite skaičiais.',
            'creditAmount.min' => 'Paskolos suma turi būti teigiama',
            'creditAmount.max' => 'Paskolos suma negali būti didesnė nei 10.000.000!',
            'paymentDate.required' => 'Įveskite paskolos pradžios datą.',
            'paymentDate.numeric' => 'Paskolos datą įveskite skaičiais.'
         ];
    }
}
