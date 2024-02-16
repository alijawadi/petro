<?php

namespace App\AppLayer\Requests;

use App\DomainLayer\UserDomain\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'integer'],
            'fuel_name' => ['required', 'string', 'max:50'],
            'client' => [
                'required',
                Rule::exists('clients', 'id')->where('user_id', $this->user()->id)
            ],
        ];
    }
}
