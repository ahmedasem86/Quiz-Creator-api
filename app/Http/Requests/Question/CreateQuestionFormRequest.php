<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionFormRequest extends FormRequest
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
        $rules =  [
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'answers' => 'required|array',
            'answers.*.text' => 'required|min:5',
            'answers.*.answer_type' => 'required|string|in:"0","1"',
            'answers.*.image' => 'nullable|mimes:jpeg,jpg,png,bmp',
            'answers.*.answer_sumbit_response' => 'required_without:answers.*.answer_sumbit_response_html',
            'answers.*.answer_sumbit_response_html' => 'required_without:answers.*.answer_sumbit_response',
            'answers.*.answer_sumbit_response_type' => 'required|string|in:"0","1"',
        ];

        // if (!empty($this->file('image'))) {
        //     $rules['image'] = 'mimes:jpeg,jpg,png,bmp';
        // }

        return $rules;
    }
}
