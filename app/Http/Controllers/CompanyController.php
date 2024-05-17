<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    /**
     * @var CompanyService
     */
    private CompanyService $companyService;

    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->companyService = new CompanyService();
    }

    public function index()
    {
        return 'Company list method';
    }

    /**
     * @param CompanyRequest $request
     *
     * @return Company
     */
    public function store(CompanyRequest $request)
    {
        $company = $this->companyService->create($request->validated());

        return $company;
    }

    /**
     * @param string $ids
     *
     * @return mixed
     */
    public function show($ids)
    {
        return $this->companyService->getByIds(explode(',', $ids));
    }

    /**
     * @param Company $company
     * @param CompanyRequest $request
     *
     * @return Company
     */
    public function update(Company $company, CompanyRequest $request)
    {
        return $this->companyService->update($company, $request->validated());
    }

    public function destroy($id)
    {
        return 'Company destroy method';
    }
}