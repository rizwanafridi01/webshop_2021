<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyRequest;
use App\WebRepositories\Interfaces\ICompanyRepositoryInterface;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    private $companyRepository;
    public function __construct(ICompanyRepositoryInterface $companyRepository){
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        return $this->companyRepository->index();
    }


    public function create()
    {
        return $this->companyRepository->create();
    }

    public function store(CompanyRequest $request)
    {
        return $this->companyRepository->store($request);
    }

    public function show($id)
    {
        return $this->companyRepository->show($id);
    }

    public function edit($id)
    {
        return $this->companyRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->companyRepository->update($request, $id);
    }


    public function destroy(Request $request, $id)
    {
        return $this->companyRepository->destroy_temp($request, $id);
    }
}
