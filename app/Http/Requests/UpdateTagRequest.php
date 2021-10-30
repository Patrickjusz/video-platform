<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd($this->id);
        return [
            'name' => 'unique:tags,name,' . $this->id . '|required|max:255',
            'slug' => 'unique:tags,slug,' . $this->id . '|required|max:255'
        ];
    }
}
