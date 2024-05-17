<?php

namespace App\Formatters;

use Carbon\Carbon;

class CompanyDataFormatter
{
    public static function format(array $company)
    {
        $company['companyFoundationDate'] = Carbon::parse($company['companyFoundationDate'])->format('Y-m-d');
        $company['employees'] = (int) $company['employees'];
        $company['active'] = $company['active'] === 'true';

        return $company;
    }
}