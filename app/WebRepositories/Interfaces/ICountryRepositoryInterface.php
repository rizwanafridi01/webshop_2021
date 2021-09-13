<?php


namespace App\WebRepositories\Interfaces;

use App\Http\Requests\Location\StoreCountryRequest;
use App\Http\Requests\Location\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

interface ICountryRepositoryInterface
{

    public function index();

    public function create();

    public function store(StoreCountryRequest $storeCountryRequest);

    public function update(Request $request, Country $country);

    public function getById($Id);

    public function show(Country $country);

    public function edit(Country $country);

    public function destroy_temp(Request $request, $id);

    public function  restore($Id);

    public function trashed();

}
