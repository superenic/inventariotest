<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Producto;

class ProductoUpdateRequest extends FormRequest
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
            'sku' => ['required'],
            'nombre' => ['required'],
            'categoria_id' => ['required'], // exists:producto,producto_id
            'descripcion' => ['required'],
            'precio' => ['required|decimal:8,2'],
            'cantidad' => ['required|numeric'],
            'estado' => ['required', Rule::in(Producto::ESTADO_VALIDO)],
        ];
    }
}
