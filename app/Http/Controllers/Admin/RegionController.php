<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\RegionRequest;
use App\WebRepositories\Interfaces\IRegionRepositoryInterface;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    private $regionRepository;
    public function __construct(IRegionRepositoryInterface $regionRepository){
        $this->regionRepository = $regionRepository;
    }
    public function index()
    {
       return $this->regionRepository->index();
    }


    public function create()
    {
        return $this->regionRepository->create();
    }

    public function store(RegionRequest $request)
    {
        return $this->regionRepository->store($request);
    }

    public function show($id)
    {
        return $this->regionRepository->show($id);
    }

    public function edit($id)
    {
        return $this->regionRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->regionRepository->update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->regionRepository->destroy_temp($request, $id);
    }

    public function locationDetails($id)
    {
        return $this->regionRepository->locationDetails($id);
    }
}
