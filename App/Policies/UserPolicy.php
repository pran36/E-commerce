<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function dashboard(User $user){
        // return $user;
        return $user->role !== "user";
    }
    public function categories(User $user){
        return $user->role == "admin";
    }
}
