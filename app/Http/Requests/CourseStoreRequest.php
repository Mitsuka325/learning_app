<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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
            'lesson_name' => 'required|max:255',
            'grade_id' => 'required',
            'video_url' => 'required|max:255',
            'description' => 'required|max:2000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 例: 画像ファイルで、許可する拡張子は jpeg, png, jpg, gif, svg、最大ファイルサイズは 2048 KB
            'always_delivery_flg' => 'accepted',
        ];
    }

    public function attributes()
    {
        return [
            'lesson_name' => '授業名',
            'grade_id' => '学年',
            'video_url' => '動画URL',
            'description' => '授業概要',
            'image'=>'画像',
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
            'lesson_name.required' => '授業名は必須項目です。',
            'lesson_name.max' => '授業名は255文字以内で入力してください。',
            'grade_id.required' => '学年は必須項目です。',
            'video_url.max' => '動画URLは255文字以内で入力してください。',
            'description.max' => '授業概要は2000文字以内で入力してください。',
            'image.image' => '画像ファイルを選択してください。',
            'image.mimes' => '画像ファイルはjpeg, png, jpg, gif, svg形式のいずれかを選択してください。',
            'image.max' => '画像ファイルのサイズは2048KB以内でアップロードしてください。',
            'always_delivery_flg.accepted' => '常時公開フラグは必須項目です。',
        ];
            
}
}
