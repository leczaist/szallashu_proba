<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
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
        $company = new Company($request->validated());
        $company->save();

        return $company;
    }

    /**
     * @param string $ids
     *
     * @return mixed
     */
    public function show($ids)
    {
        return Company::whereIn('companyId', explode(',', $ids))
            ->get();
    }

    /**
     * @param Company $company
     * @param CompanyRequest $request
     *
     * @return Company
     */
    public function update(Company $company, CompanyRequest $request)
    {
        $company->update($request->validated());

        return $company;
    }

    public function destroy($id)
    {
        return 'Company destroy method';
    }
}