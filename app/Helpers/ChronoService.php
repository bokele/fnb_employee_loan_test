<?php

namespace App\Helpers;

use App\Models\Loan;


class ChronoService
{
    function zerofill($num, $zerofill = 6)
    {
        return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
    }
    function loan_number()
    {
        $year    = date("Y");
        $month    = date("m");
        $code = '';
        do {
            $code = random_int(10000, 99999);
            $code_check = $year . $month .  $code;
        } while (Loan::where("loan_reference_number", $code_check)->first());

        return $year . $month . $code;
    }
}
