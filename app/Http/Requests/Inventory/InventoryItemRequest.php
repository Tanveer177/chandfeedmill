<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class InventoryItemRequest extends FormRequest
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
        $id = $this->route('inventory_item') instanceof \App\Models\Inventory\InventoryItem
            ? $this->route('inventory_item')->id
            : $this->route('inventory_item');
        return [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:inventory_items,sku,' . $id,
            'category' => 'nullable|string|max:255',
            'unit' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'min_quantity' => 'required|numeric|min:0',
            'cost_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }
}
