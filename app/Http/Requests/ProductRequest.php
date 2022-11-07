<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class ProductRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function formatErrors(Validator $validator): JsonResponse
    {
        return new JsonResponse([
            'success' => false,
            'data' => null,
            'error' => $validator->getMessageBag()->toArray()
        ], 400);
    }


    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk harus di isi',
            'price.required' => 'Harga produk harus di isi',
            'quantity.required' => 'Kuantitas produk harus di isi',
        ];
    }

    public function data(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
        ]; 
    }
}
