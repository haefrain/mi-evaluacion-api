<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Group;
use App\Models\Question;
use App\Models\SubVariable;
use App\Models\User;
use App\Models\Variable;
use App\Policies\GroupPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\SubVariablePolicy;
use App\Policies\UserPolicy;
use App\Policies\VariablePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\RolePolicy;
use App\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Group::class => GroupPolicy::class,
        Variable::class => VariablePolicy::class,
        SubVariable::class => SubVariablePolicy::class,
        Question::class => QuestionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
