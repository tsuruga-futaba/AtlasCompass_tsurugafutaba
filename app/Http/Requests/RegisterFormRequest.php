<?php

namespace App\Http\Requests;

use App\Models\Users\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    protected $fillable = [
        'over_name',
        'under_name',
        'over_name_kana',
        'under_name_kana',
        'mail_address',
        'sex',
        'old_year',
        'old_month',
        'old_day',
        'birth_day',
        'role',
        'password'
    ];

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
        return ['over_name'=>'required|max:10|string',
                'under_name'=>'required|max:10|string',
                'over_name_kana'=>'required|max:30|string|katakana',
                'under_name_kana'=>'required|max:30|string|katakana',
                'mail_address'=>'required|email|unique:users,mail_address|max:100',
                'sex'=>'required|in:1,2,3',
                'old_year'=>'required',
                'old_month'=>'required',
                'old_day'=>'required',
                'birth_day'=>'required|date|after:2000-01-01|before:today',
                'role'=>'required|in:1,2,3,4',
                'password'=>'required|between:8,30|confirmed',
            ];
    }
    public function messages()
    {
    return ['over_name.required'=>'姓は入力必須です。',
            'over_name.max:10'=>'姓は10文字以内で入力してください。',
            'under_name.required'=>'名は入力必須です。',
            'under_name.max:10'=>'名は10文字以内で入力してください。',
            'over_name_kana.required'=>'セイは入力必須です。',
            'over_name_kana.max:30'=>'セイは30文字以内で入力してください。',
            'over_name_kana.katakana'=>'セイはカタカナで入力してください。',
            'under_name_kana.required'=>'メイは入力必須です。',
            'under_name_kana.max:30'=>'メイは30文字以内で入力してください。',
            'under_name_kana.katakana'=>'メイはカタカナで入力してください。',
            'mail_address.required'=>'メールアドレスは入力必須です。',
            'mail_address.email'=>'メールアドレスを正しく入力してください。',
            'mail_address.unique:users,mail_address'=>'こちらのメールアドレスはすでに使用されています',
            'mail_address.max:100'=>'メールアドレスは100文字以下で入力してください。',
            'sex.required'=>'性別は入力必須です。',
            'birth_day.required'=>'生年月日は入力必須です。',
            'birth_day.before:today'=>'生年月日を正しく入力してください。',
            'role.required'=>'役職は入力必須です。',
            'password.required'=>'パスワードは入力必須です。',
            'password.between'=>'パスワードは8文字以上30文字以下で入力してください。',
            'password.confirmed'=>'パスワードが一致しません。'
        ];
    }
}
