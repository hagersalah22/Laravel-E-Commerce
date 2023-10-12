<?php

namespace App\Policies;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\Product;
class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }       public function destroy(User $user, Product $product): bool{
             
             return $user->id === $product->user_id;
       
    }


    
    public function update(User $user, Product $product): bool{
             
        return $user->id === $product->user_id;
  
}
}