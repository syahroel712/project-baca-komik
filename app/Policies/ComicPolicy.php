<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Comic;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComicPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Comic');
    }

    public function view(AuthUser $authUser, Comic $comic): bool
    {
        return $authUser->can('View:Comic');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Comic');
    }

    public function update(AuthUser $authUser, Comic $comic): bool
    {
        return $authUser->can('Update:Comic');
    }

    public function delete(AuthUser $authUser, Comic $comic): bool
    {
        return $authUser->can('Delete:Comic');
    }

    public function restore(AuthUser $authUser, Comic $comic): bool
    {
        return $authUser->can('Restore:Comic');
    }

    public function forceDelete(AuthUser $authUser, Comic $comic): bool
    {
        return $authUser->can('ForceDelete:Comic');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Comic');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Comic');
    }

    public function replicate(AuthUser $authUser, Comic $comic): bool
    {
        return $authUser->can('Replicate:Comic');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Comic');
    }

}