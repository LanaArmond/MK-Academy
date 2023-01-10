<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\Admin;
use App\Models\Card;
use App\Models\Client;
use App\Models\Equipament;
use App\Models\Exercise;
use App\Models\Personal;
use App\Policies\AdminPolicy;
use App\Policies\CardPolicy;
use App\Policies\ClientPolicy;
use App\Policies\EquipamentPolicy;
use App\Policies\ExercisePolicy;
use App\Policies\PersonalPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Client::class => ClientPolicy::class,
        Admin::class => AdminPolicy::class,
        Personal::class => PersonalPolicy::class,
        Exercise::class => ExercisePolicy::class,
        Card::class => CardPolicy::class,
        Equipament::class => EquipamentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::guessPolicyNamesUsing(function ($modelClass) {
            // Return the name of the policy class for the given model...
            return 'App\\Policies\\User\\Policy';
        });
    }
}
