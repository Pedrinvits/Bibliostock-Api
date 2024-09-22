<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        $author_id = $request->author_id;
        $genre = $request->genre_id;
        $publisher = $request->publisher_id;
    
        return [
            'title' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'author_id' => 'required|integer',
            'genre_id' => 'required|integer',
            'publisher_id' => 'required|integer',
           
            // 'author_id' => 'required|exists:authors,id',      // Verifica se o autor já existe no banco
            // 'genre_id' => 'required|exists:genres,id',        // Verifica se o gênero já existe no banco
            // 'publisher_id' => 'required|exists:publishers,id',// Verifica se a editora já existe no banco
            // 'title' => 'required|string|max:255',             // Valida o título
            // 'release_year' => 'required|integer|min:1500|max:'
        ];
    }

    public function messages(): array
    {
        return [
            'author_id.required' => 'O campo autor é obrigatório.',
            'author_id.exists' => 'O autor selecionado é inválido.',
            'genre_id.required' => 'O campo gênero literário é obrigatório.',
            'genre_id.exists' => 'O gênero literário selecionado é inválido.',
            'publisher_id.required' => 'O campo editora é obrigatório.',
            'publisher_id.exists' => 'A editora selecionada é inválida.',
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser uma string.',
            'title.max' => 'O título não pode ter mais que 255 caracteres.',
            'release_year.required' => 'O ano de lançamento é obrigatório.',
            'release_year.integer' => 'O ano de lançamento deve ser um número inteiro.',
            'release_year.min' => 'O ano de lançamento deve ser no mínimo 1500.',
            'release_year.max' => 'O ano de lançamento não pode ser maior que o ano atual.',
        ];
    }
}
