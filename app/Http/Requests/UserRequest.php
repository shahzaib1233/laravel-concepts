<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    //adding validation rule
    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'age'   => 'required|integer|min:18|max:100',
            'city'  => 'required|string',
        ];
    }
    //changing attribute name
    public function attributes()
    {
        return[
            'name'=>'Name',
            'email'=>'Email',
            'age'=>'Age',
            'city'=>'City',

        ];
    }

    public function messages()
    {
        return[
            'name.required'  => 'User Name is Required',
            'email.requried' => 'Bhai Email Dal do Please',
            'age.required'   => 'bhai Age Dal do Nhi Batae ga ksi ko maa kasam',
            'city.required'  => 'Bhai City bata do please',
        ];
    }

    //used to perform operation before validation and before database transaction
    protected function prepareForValidation():void
    {
        $this->merge([
            'name' => strtoupper($this->name),
        ]);
    }

protected $stopOnFirstFailure = true;
}
