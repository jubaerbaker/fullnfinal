<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'=>'required|unique:posts',
            'description'=>'required',
            'content'=>'required',
            'category'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000'
            
            
        ];
    }
}
