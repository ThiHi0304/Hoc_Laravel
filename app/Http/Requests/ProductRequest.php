<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name'=>'required|min:6',
            'product_price'=>'required|integer'
        ];
    }
    public function messages()
    {
        return[
            'product_name.required'=>':attribute bắt buộc phải nhập',
            'product_name.min'=>':attribute không đưuọc nhỏ hơn :min kí tự',
            'product_price.required'=>':attribute bắt buộc phải nhập',
            'product_price.integer'=>':attribute phải là con số'
        ];
    }
    public function attributes()
    {
        return [
            'product_name'=>'Tên sản phẩm',
            'product_price'=>'Giá sản phẩm'
        ];
    }
    protected function withValidator($validator){
        $validator->after(function($validator){
            // if($this->somethingElseIsInvalid()){
            //     $validator->errors()->add ('msg','Đã có lỗi xảy ra, Vui lòng kiểm tra lại');
            // }
            if($validator->errors()->count()>0){
                $validator->errors()->add ('msg','Đã có lỗi xảy ra, Vui lòng kiểm tra lại');
            }
            // dd('ok nhá');
        });
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'create_at'=>date('Y-m-d H:i:s'),
        ]);
    }
    protected function failedAuthorization()
    {
        // throw new AuthorizationException('Bạn đang truy cập vào khu vực cấm');
        //throw new HttpResponseException(redirect('/')->with('msg','Bạn không có quyền truy cập')->with('type','danger'));
        throw new HttpResponseException(abort(404));
    }
}
