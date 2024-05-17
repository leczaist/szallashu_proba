<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    /**
     * @param array $validated
     *
     * @return mixed
     */
    public function create(array $validated)
    {
        return Company::create($validated);
    }

    /**
     * @param array $ids
     *
     * @return mixed
     */
    public function getByIds(array $ids)
    {
        return Company::whereIn('companyId', $ids)->get();
    }

    /**
     * @param Company $company
     * @param array $validated
     *
     * @return Company
     */
    public function update(Company $company, array $validated)
    {
        $company->update($validated);

        return $company;
    }
}