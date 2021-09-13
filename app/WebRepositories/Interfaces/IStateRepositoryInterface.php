<?php


namespace App\WebRepositories\Interfaces;


use App\Http\Requests\Location\StateRequest;
use App\Http\Requests\Location\StoreCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

interface IStateRepositoryInterface
{
    public function index();

    public function create();

    public function store(StateRequest $request);

    public function update(Request $request, $id);

    public function getById($id);

    public function show($id);

    public function edit($id);

    public function destroy_temp(Request $request, $id);

    public function restore($Id);

    public function trashed();
}
