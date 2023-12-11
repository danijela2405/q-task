<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'author' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'release_date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'max:255'],
            'format' => ['required', 'string', 'max:255'],
            'number_of_pages' => ['required', 'integer'],
        ];
    }

    public function formatRequestData(array $data): array
    {
        return [
            'author' => [
                'id' => (int)$data['author']
            ],
            'title' => $data['title'],
            'release_date' => $data['release_date'],
            'description' => $data['description'],
            'isbn' => $data['isbn'],
            'format' => $data['format'],
            'number_of_pages' => (int)$data['number_of_pages'],
        ];
    }
}
