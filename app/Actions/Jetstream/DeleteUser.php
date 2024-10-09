<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(Authenticatable $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
