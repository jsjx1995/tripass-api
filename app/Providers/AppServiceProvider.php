<?php

namespace App\Providers;

use App\FacilityMetaRepository;
use App\FacilityRepository;
use App\Repository\FacilityMetaRepositoryInterface;
use App\Repository\FacilityRepositoryInterface;
use App\Repository\UserMetaRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\UserMetaRepository;
use App\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    //
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //以下、リポジトリインターフェースのbind
    $this->app->bind(FacilityRepositoryInterface::class,
                     FacilityRepository::class);

    $this->app->bind(FacilityMetaRepositoryInterface::class,
                     FacilityMetaRepository::class);

    $this->app->bind(UserRepositoryInterface::class,
                     UserRepository::class);

    $this->app->bind(UserMetaRepositoryInterface::class,
                     UserMetaRepository::class);

  }
}
