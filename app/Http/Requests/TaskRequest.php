<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
        // kita bisa menambahkan rules unique untuk suatu field tertentu
        // jika methodnya selain POST, maka ignore rule unique by id task
        $rule_task_unique = Rule::unique('tasks');
        if ($this->method() !== 'POST') {
            // get id task from route parameter
            $id = $this->route()->parameter('id');
            $rule_task_unique->ignore($id);
        }

        return [
            "task" => ['required', $rule_task_unique],
            "user" => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field :attribute harus diisi!',
            'user.required' => 'Nama pengguna tidak boleh kosong!'
        ];
    }
}
