<?php

namespace App\Providers;

use App\WebRepositories\BankRepository;
use App\WebRepositories\CategoryRepository;
use App\WebRepositories\CityRepository;
use App\WebRepositories\CompanyRepository;
use App\WebRepositories\CountryRepository;
use App\WebRepositories\Interfaces\IBankRepositoryInterface;
use App\WebRepositories\Interfaces\ICategoryRepositoryInterface;
use App\WebRepositories\Interfaces\ICityRepositoryInterface;
use App\WebRepositories\Interfaces\ICompanyRepositoryInterface;
use App\WebRepositories\Interfaces\ICountryRepositoryInterface;
use App\WebRepositories\Interfaces\IProductGalleryRepositoryInterface;
use App\WebRepositories\Interfaces\IProductRepositoryInterface;
use App\WebRepositories\Interfaces\IRegionRepositoryInterface;
use App\WebRepositories\Interfaces\IStateRepositoryInterface;
use App\WebRepositories\Interfaces\ISubCategoryRepositoryInterface;
use App\WebRepositories\Interfaces\IUnitRepositoryInterface;
use App\WebRepositories\Interfaces\ProductGalleryRepository;
use App\WebRepositories\ProductRepository;
use App\WebRepositories\RegionRepository;
use App\WebRepositories\StateRepository;
use App\WebRepositories\SubCategoryRepository;
use App\WebRepositories\UnitRepository;
use Illuminate\Support\ServiceProvider;

class WebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(IStateRepositoryInterface::class, StateRepository::class);
        $this->app->bind(ICityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(IRegionRepositoryInterface::class, RegionRepository::class);
        $this->app->bind(ICountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(ICompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(IBankRepositoryInterface::class, BankRepository::class);
        $this->app->bind(IProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(IUnitRepositoryInterface::class, UnitRepository::class);
        $this->app->bind(ICategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ISubCategoryRepositoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(IProductGalleryRepositoryInterface::class, ProductGalleryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
