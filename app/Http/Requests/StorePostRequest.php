<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Livewire\WithFileUploads;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    use WithFileUploads;

    public function authorize()
    {
        if($this->user_id == auth()->user()->id){
           return true; 
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
     
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file.*' => 'image'
        ];
        if($this->status == 2){
                $rules = array_merge($rules,[
                    'category_id' => 'required',
                    'tags' => 'required',
                    'extract' => 'required',
                    'body' => 'required'
                ]);
        }

        return $rules;
    }
}
