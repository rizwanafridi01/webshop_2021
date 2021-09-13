<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UniteRequest;
use App\WebRepositories\Interfaces\IUnitRepositoryInterface;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    private $unitRepository;
    public function __construct(IUnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }
    public function index()
    {
        return $this->unitRepository->index();
    }


    public function create()
    {
        return $this->unitRepository->create();
    }

    public function store(UniteRequest $request)
    {
        return $this->unitRepository->store($request);
    }

    public function show($id)
    {
        return $this->unitRepository->show($id);
    }

    public function edit($id)
    {
        return $this->unitRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->unitRepository->update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->unitRepository->destroy_temp($request, $id);
    }
}
