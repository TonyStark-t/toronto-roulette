<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlotsRequest extends FormRequest
{
    public function rules()
    {
        return [
            "element" => "required",
            "status" => "required"
        ];
    }
}
