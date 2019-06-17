<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Checkoutrequest extends Request
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
            'txttenkhach'=>'max:50',
            'txtsdtkh'=>'numeric|min:0',
            
        ];
    }
    public function messages()
{
    return [
        'txttenkhach.max'=>'Tên không lớn hơn 50 ký tự',
        'txtsdtkh.min'=>'số điện thoại chưa đúng định dạng',
        'txtsdtkh.numeric'=>'số điện thoại không chứ ký tự',
        
    ];
}
}
