<?php

namespace App\Providers;

// use DB;
use Illuminate\Support\ServiceProvider;
// use Log;
use App\Contract\Service\Post\PostServiceInterface;
use App\Service\Post\PostService;
use App\Contract\Service\User\UserServiceInterface;
use App\Service\User\UserService;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    
    // DB::listen(
    //   function ($sql) {
    //     foreach ($sql->bindings as $i => $binding) {
    //       if ($binding instanceof \DateTime) {
    //         $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
    //       } else {
    //         if (is_string($binding)) {
    //           $sql->bindings[$i] = "'$binding'";
    //         }
    //       }
    //     }
       
    //     $query = str_replace(array('%', '?'), array('%%', '%s'), $sql->sql);
    //     $query = vsprintf($query, $sql->bindings);
    //     Log::debug($query);
    //   }
    // );
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    // Dao Registration
    $this->app->bind(PostServiceInterface::class, PostService::class);
    $this->app->bind(UserServiceInterface::class, UserService::class);

    // Business logic registration
   
  }
}
