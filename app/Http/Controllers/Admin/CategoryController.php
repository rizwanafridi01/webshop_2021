<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\categoryRequest;
use App\WebRepositories\Interfaces\ICategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(ICategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
      return  $this->categoryRepository->index();
    }

    public function create()
    {
        return $this->categoryRepository->create();
    }

    public function store(categoryRequest $request)
    {
       return $this->categoryRepository->store($request);
    }

    public function show($id)
    {
        return $this->categoryRepository->show($id);
    }

    public function edit($id)
    {
        return $this->categoryRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->categoryRepository->update($request, $id);
    }


    public function destroy(Request $request, $id)
    {
        return $this->categoryRepository->destroy_temp($request, $id);
    }
}
