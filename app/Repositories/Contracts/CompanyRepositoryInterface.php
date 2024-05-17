<?php

namespace App\Repositories\Contracts;

use App\Models\Company;

interface CompanyRepositoryInterface
{
    public function create(array $validated);

    public function getByIds(array $ids);

    public function update(Company $company, array $validated);
}