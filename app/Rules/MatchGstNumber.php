<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Account;

class MatchGstNumber implements Rule
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
        $firstTwoNumeric = substr($value, 0, 2);
        $panNo = substr($value, 2, 10);
        $numeric = substr($value, 12, 1);
        $alpha = substr($value, 13, 1);
        $lastnumeric = substr($value, 14, 1);

        $panAlpha = substr($panNo, 0, 5);
        $panNumeric = substr($panNo, 5, 4);
        $panLastAlpha = substr($panNo, 9, 1);
        
        if(!preg_match("/^[0-9]+$/", $panNumeric)){
            return false;
        } elseif (!preg_match("/^[a-z]+$/", $panAlpha) && !preg_match("/^[A-Z]+$/", $panAlpha)){
            return false;
        }  elseif (!preg_match("/^[a-z]+$/", $panLastAlpha) && !preg_match("/^[A-Z]+$/", $panLastAlpha)){
            return false;
        } elseif (!preg_match("/^[0-9]+$/", $firstTwoNumeric)){
            return false;
        } elseif (!preg_match("/^[0-9]+$/", $numeric)){
            return false;
        }  elseif (!preg_match("/^[a-z]+$/", $alpha) && !preg_match("/^[A-Z]+$/", $alpha)){
            return false;
        } elseif (!preg_match("/^[0-9]+$/", $lastnumeric)){
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
        return 'Please Enter Valid GST No.';
    }
}
