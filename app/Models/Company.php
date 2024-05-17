<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $primaryKey = 'companyId';

    protected $fillable = [
        'companyId',
        'companyName',
        'companyRegistrationNumber',
        'companyFoundationDate',
        'country',
        'zipCode',
        'city',
        'streetAddress',
        'latitude',
        'longitude',
        'companyOwner',
        'employees',
        'activity',
        'active',
        'email',
        'password',
    ];
}
