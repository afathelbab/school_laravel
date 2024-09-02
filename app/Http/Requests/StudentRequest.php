<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class StudentRequest extends FormRequest
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
    
    
    protected function onUpdate(){
        return [
            'name'=>['required'],
            'email'=>['required', 'email', 'unique:students,code'],
            'phone'=>['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/', 'unique:students,code'],
            'department_id'=>['integer', 'integer', 'exists:departments,department_id']
        ];
    } 

    protected function onCreate(){
        return [
            'code'=>['required', 'integer', 'unique: students,code'],
            'name'=>['required'],
            'email'=>['required', 'email', 'unique: students,code'],
            'phone'=>['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/', 'unique:students,code'],
            'department_id'=>['integer', 'integer', 'exists:departments,department_id']
        ];
    }

     public function rules(){
        if(request()->isMethod('put')){
            return $this->onUpdate();
        } else {
            return $this->onCreate();
        }
    }

    public function messages(){
        return [
            'code.required'=>'Please Enter a Student Code.',
            'code.integer'=>'Please Enter a Valid Student Code.'
        ];
    }
}
