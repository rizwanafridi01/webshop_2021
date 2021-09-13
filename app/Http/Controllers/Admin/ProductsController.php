<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\WebRepositories\Interfaces\IProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepository;
    public function __construct(IProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return $this->productRepository->index();
    }

    public function create()
    {
        return $this->productRepository->create();
    }

    public function store(ProductRequest $request)
    {
        return $this->productRepository->store($request);
    }

    public function show($id)
    {
        return $this->productRepository->show($id);
    }

    public function edit($id)
    {
        return $this->productRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->productRepository->update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->productRepository->destroy_temp($request, $id);
    }
}
