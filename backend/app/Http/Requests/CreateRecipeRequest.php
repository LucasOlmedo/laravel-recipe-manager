<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'preparation_time' => 'nullable|integer',
            'steps' => 'required|array',
            'ingredients' => 'required|array',
            'tags' => 'nullable|array',
            'image_url' => 'nullable|string',
            'integration' => 'nullable|string',
            'integration_ref_id' => 'nullable|string',
        ];
    }
}
