<?php

namespace App\Policies;

use App\Models\Gallery;
use App\Models\User;

class GalleryPolicy
{
    public function viewAny(User $user): bool { return $user->isAdmin(); }
    public function view(User $user, Gallery $gallery): bool { return $user->isAdmin(); }
    public function create(User $user): bool { return $user->isAdmin(); }
    public function update(User $user, Gallery $gallery): bool { return $user->isAdmin(); }
    public function delete(User $user, Gallery $gallery): bool { return $user->isAdmin(); }
}
