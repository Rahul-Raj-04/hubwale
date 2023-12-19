<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MatchPanNumber implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $alpha = substr($value, 0, 5);
        $numeric = substr($value, 5, 4);
        $lastAlpha = substr($value, 9, 1);
        if(!preg_match("/^[0-9]+$/", $numeric)){
            return false;
        } elseif (!preg_match("/^[a-z]+$/", $alpha) && !preg_match("/^[A-Z]+$/", $alpha)){
            return false;
        }  elseif (!preg_match("/^[a-z]+$/", $lastAlpha) && !preg_match("/^[A-Z]+$/", $lastAlpha)){
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please Enter Valid PAN.';
    }
}
