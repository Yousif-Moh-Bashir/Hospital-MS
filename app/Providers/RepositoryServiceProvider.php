<?php

namespace App\Providers;

use App\Interface\Doctors\DoctorRepositoryInterface;
use App\Interface\Sections\SectionRepositoryInterface;
use App\Interface\Services\SingleServiceRepositoryInterface;
use App\Interface\InsuranceCompanies\InsuranceCompaniesRepositoryInterface;
use App\Interface\Ambulance\AmbulanceRepositoryInterface;
use App\Interface\Patients\PatientRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Services\SingleServiceRepository;
use App\Repository\InsuranceCompanies\InsuranceCompaniesRepository;
use App\Repository\Ambulance\AmbulanceRepository;
use App\Repository\Patients\PatientRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
        $this->app->bind(InsuranceCompaniesRepositoryInterface::class, InsuranceCompaniesRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
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
