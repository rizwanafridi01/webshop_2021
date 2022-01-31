<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\SubCategoryRequest;
use App\WebRepositories\Interfaces\ISubCategoryRepositoryInterface;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $subCategoryRepository;
    public function __construct(ISubCategoryRepositoryInterface $subCategoryRepository){
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function index()
    {
        return $this->subCategoryRepository->index();
    }

    public function create()
    {
        return $this->subCategoryRepository->create();
    }

    public function store(SubCategoryRequest $request)
    {
        return $this->subCategoryRepository->store($request);
    }

    public function show($id)
    {
        return $this->subCategoryRepository->show($id);
    }

    public function edit($id)
    {
        return $this->subCategoryRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->subCategoryRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
