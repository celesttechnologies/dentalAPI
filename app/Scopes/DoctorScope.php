<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class DoctorScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();
        if ($user && $user->role && strtolower($user->role->RoleName) === 'doctor') {
            // Only show records for the logged-in doctor
            $builder->where($model->getTable() . '.ProviderID', $user->UserID);
        }
        // Admins and other roles see all records
    }
}
