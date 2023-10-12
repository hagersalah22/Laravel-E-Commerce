<?php

namespace App\Policies;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\Category;
class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }         function update(User $user, Category $category){
        {
  return $user->can('is-admin');
}
  


        }
    
    }

