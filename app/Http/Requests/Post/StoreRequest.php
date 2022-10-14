<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        //manipular el request
        $this->merge([
            'slug' => str($this->title)->slug()
        ]);
    }
    static public function myRules()
    {
        return [
            //Aquí van las reglas de validación de datos para sanear los datos
            //que vienen de los formularios a la BD
            "title" => "required|min:5|max:500",
            "slug" => "required|min:5|max:500",
            "content" => "required|min:5",
            "category_id" => "required|integer",
            "description" => "required|min:5",
            "posted" => "required"
        ];
    }
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
        return $this->myRules();
    }
}
