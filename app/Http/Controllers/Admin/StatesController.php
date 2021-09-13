<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Location\StateRequest;
use App\WebRepositories\Interfaces\IStateRepositoryInterface;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    private $stateRepository;
    public function __construct(IStateRepositoryInterface $stateRepository){
        return $this->stateRepository = $stateRepository;
    }
    public function index()
    {
        return $this->stateRepository->index();
    }


    public function create()
    {
        return $this->stateRepository->create();
    }


    public function store(StateRequest $request)
    {
        return $this->stateRepository->store($request);
    }


    public function show($id)
    {
        return $this->stateRepository->show($id);
    }


    public function edit($id)
    {
        return $this->stateRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->stateRepository->update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->stateRepository->destroy_temp($request, $id);
    }
}
