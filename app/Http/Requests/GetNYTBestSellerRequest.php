<?php

namespace App\Http\Requests;

use App\Rules\ISBNRule;
use Illuminate\Foundation\Http\FormRequest;

class GetNYTBestSellerRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'author' => 'string',
            'isbn' => ['string', new ISBNRule],
            'title' => 'string',
            'offset' => 'integer',
            'age-group' => 'string',
            'contributor' => 'string',
            'price' => 'string',
            'publisher' => 'string',
        ];
    }
}
