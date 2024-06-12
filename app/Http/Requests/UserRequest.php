<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends Request
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
           'fname' => 'required|string',
           'lname' => 'required|string',
           'email' => 'required|string|unique:users',
           'password' => 'required|string',
           'addressline1' => 'required|string',
           'addressline2' => 'nullable',
           'pincode' => 'required|integer',
           'phone_number' => 'required|integer'
        ];
    }
}
