<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lesson_name' => 'max:255',
            'grade_id' => '',
            'video_url' => 'max:255',
            'description' => 'max:2000',
        ];
    }
    
    public function attributes()
    {
        return [
            'lesson_name' => '授業名',
            'grade_id' => '学年',
            'video_url' => '動画URL',
            'description' => '授業概要'
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'lesson_name.required' => '授業名は必須項目です',
        'lesson_name.max' => '授業名は255文字以内で入力してください',
        'grade_id.required' => '学年は必須項目です',
        'video_url.required' => '動画URLは必須項目です',
        'video_url.max' => '動画URLは255文字以内で入力してください',
        'description.required' => '授業概要は必須項目です',
        'description.string' => '授業概要は文字列で入力してください',
        'description.max' => '授業概要は1000文字以内で入力してください',
            
        ];
    }
}
