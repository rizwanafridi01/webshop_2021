<?php

namespace App\WebRepositories\Interfaces;

use App\Http\Requests\Product\categoryRequest;
use App\Http\Requests\Product\SubCategoryRequest;
use Illuminate\Http\Request;

interface ISubCategoryRepositoryInterface
{
    public function index();

    public function create();

    public function store(SubCategoryRequest $request);

    public function update(Request $request, $id);

    public function getById($id);

    public function show($id);

    public function edit($id);

    public function destroy_temp(Request $request, $id);

    public function restore($Id);

    public function trashed();
}
