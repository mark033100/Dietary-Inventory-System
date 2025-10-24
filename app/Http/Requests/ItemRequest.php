<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'sku' => 'required|string|unique:items,sku',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:3',
            'unit_qty' => 'required|numeric',
            'unit_id' => 'required|string',
            'description' => 'nullable|string',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'created_by' => 'required|string',
            'updated_by' => 'nullable|string',
        ];
    }
}
