<?php

namespace App\Http\Requests\Budget;

use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


    public function rules(): array
    {
        return [
            'amount' => ['required'],
            'start_date' => ['required', 'date'], // start_date deve ser antes da end_date
            'end_date' => ['required', 'date'], // end_date deve ser depois da start_date
            'category_id' => ['required']
        ];
    }

    public function attributes(): array
    {
        return [
            'amount' => 'Quantia',
            'start_date' => 'data de início',
            'end_date' => 'data de término',
            'category_id' => 'categoria'
        ];
    }
}
