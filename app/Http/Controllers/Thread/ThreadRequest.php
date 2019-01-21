<?php


namespace App\Http\Controllers\Thread;


use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->has('content')){
            if (strlen($this->get('content')) > 0 && !ends_with($this->get('content'), '.')){
                $all = $this->all();
                $all['content'] .= '.';
                $this->replace($all);
            }
        }
        return [
            'title' => 'required|min:3|max:255|unique:threads,title,'.$this->thread,
            'content' => 'max:255'
        ];

    }
}