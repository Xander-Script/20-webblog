<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class Policy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }
}
