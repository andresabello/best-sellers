<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ISBNRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool|int
     */
    public function passes($attribute, $value): bool|int
    {
        $regex = '/\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b/i';
        if (!preg_match($regex, str_replace('-', '', $value))) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The ISBN is incorrect, enter again.';
    }
}
