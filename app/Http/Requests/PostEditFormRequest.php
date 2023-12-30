<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PostEditFormRequest extends FormRequest
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
        return ['post_title'=>'required|max:100|string',
                'post_body'=>'required|max:5000|string',
        ];
    }
    public function messages()
    {
        return [
            'post_title.required'=>'タイトルは入力必須です。',
            'post_title.max:100'=>'タイトルは100文字以内で入力してください。',
            'post_body.required'=>'内容は入力必須です。',
                'post_body.max:5000'=>'内容は5000文字以内で入力してください。',
        ];
    }
}
