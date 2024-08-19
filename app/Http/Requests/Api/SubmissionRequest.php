<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class SubmissionRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"    => "required",
            "email"   => "required|email:rfc,dns",
            "message" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required"    => "Name field is required",
            "email.required"   => "Email field is required",
            "email.email"      => "Please provide valid email address",
            "message.required" => "Message field is required"
        ];
    }
}
