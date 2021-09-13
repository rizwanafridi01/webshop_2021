<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\CityRequest;
use App\WebRepositories\Interfaces\ICityRepositoryInterface;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    private $cityRepository;
    public function __construct(ICityRepositoryInterface $cityRepository){
        $this->cityRepository = $cityRepository;
    }
    public function index()
    {
        return $this->cityRepository->index();
    }

    public function create()
    {
        return $this->cityRepository->create();
    }

    public function store(CityRequest $request)
    {
        return $this->cityRepository->store($request);
    }


    public function show($id)
    {
        return $this->cityRepository->show($id);
    }


    public function edit($id)
    {
        return $this->cityRepository->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->cityRepository->update($request, $id);
    }


    public function destroy(Request $request, $id)
    {
        return $this->cityRepository->destroy_temp($request, $id);
    }
}
