<?php

namespace App\Http\Requests\Response;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionFormRequest extends FormRequest
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
          'answer_id' => 'required|int',
          'question_id' => 'required|int',
          'email' => 'required|email',
          'username' => 'required|String|min:5',
        ];
    }
}
