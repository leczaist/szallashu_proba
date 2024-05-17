<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Models\Company;

class CompanyService
{
    /**
     * @var CompanyRepository $companyRepository
     */
    private CompanyRepository $companyRepository;

    /**
     * CompanyService constructor.
     */
    public function __construct()
    {
        $this->companyRepository = new CompanyRepository();
    }

    /**
     * @param array $validated
     *
     * @return Company
     */
    public function create(array $validated)
    {
        return $this->companyRepository->create($validated);
    }

    /**
     * @param array $ids
     *
     * @return mixed
     */
    public function getByIds(array $ids)
    {
        return $this->companyRepository->getByIds($ids);
    }

    /**
     * @param Company $company
     * @param array $validated
     *
     * @return Company
     */
    public function update(Company $company, array $validated)
    {
        return $this->companyRepository->update($company, $validated);
    }
}