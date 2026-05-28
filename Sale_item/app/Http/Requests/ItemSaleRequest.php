<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ItemSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'item_code'    => 'required|alpha_num|max:6',
            'item_name'    => 'required|max:50',
            'quantity'     => 'nullable|numeric|min:0',
            'expried_date' => 'nullable|date',
            'note'         => 'nullable|max:60',
        ];
    }

    /**
     * Kiểm tra thêm item_name không chứa ký tự đặc biệt
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $itemName = $this->input('item_name');
            if ($itemName && !preg_match('/^[A-Za-z0-9 ]+$/', $itemName)) {
                $validator->errors()->add(
                    'item_name',
                    'Tên hàng không được chứa ký tự đặc biệt.'
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            'item_code.required'  => 'Mã hàng là bắt buộc.',
            'item_code.alpha_num' => 'Mã hàng không được chứa ký tự đặc biệt.',
            'item_code.max'       => 'Mã hàng không được quá 6 ký tự.',
            'item_name.required'  => 'Tên hàng là bắt buộc.',
            'item_name.max'       => 'Tên hàng không được quá 50 ký tự.',
            'quantity.numeric'    => 'Số lượng phải là số.',
            'expried_date.date'   => 'Ngày hết hạn không hợp lệ.',
            'note.max'            => 'Ghi chú không được quá 60 ký tự.',
        ];
    }
}
