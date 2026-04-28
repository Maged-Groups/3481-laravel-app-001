<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|between:2,500',
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id'
        ];
    }


    public function messages ():array {
        return [
            'comment.required' => 'لابد من كتابة تعليقك هنا',
            'comment.between' => 'التعليق مابين حرفان و خمسمائة حرف',
            'post_id.required' => 'حدد اي بوست فيهم',
            'user_id.exists' => 'This user does not exists '
        ];
    }
}
