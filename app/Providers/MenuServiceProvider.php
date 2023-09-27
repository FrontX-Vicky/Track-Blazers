<?php

namespace App\Providers;

use App\Models\Meets;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);

    $meetData = Meets::all()->toArray();
    // $meetData = compact('meetData');
    // Share all menuData to all the views
    \View::share('meetData', [$meetData]);
    \View::share('menuData', [$verticalMenuData]);
  }
}
