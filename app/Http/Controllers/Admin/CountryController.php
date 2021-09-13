<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\StoreCountryRequest;
use App\Http\Requests\Location\UpdateCountryRequest;
use App\Models\Country;
use App\WebRepositories\Interfaces\ICountryRepositoryInterface;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $countryRepository;
   public function __construct(ICountryRepositoryInterface $countryRepository){
       $this->countryRepository = $countryRepository;
   }
    public function index()
    {
        return $this->countryRepository->index();
    }

    public function create()
    {
        return $this->countryRepository->create();
    }

    public function store(StoreCountryRequest $storeCountryRequest)
    {
        return $this->countryRepository->store($storeCountryRequest);
    }


    public function show(Country $country)
    {
        return $this->countryRepository->show($country);
    }


    public function edit(Country $country)
    {
        return $this->countryRepository->edit($country);
    }


    public function update(Request $request, Country $country)
    {
        return $this->countryRepository->update($request, $country);
    }


    public function destroy(Request $request, $id)
    {
//        dd('ddd');
      return  $this->countryRepository->destroy_temp($request, $id);
    }
}
