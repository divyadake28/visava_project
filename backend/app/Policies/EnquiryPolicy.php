<?php

namespace App\Policies;

use App\Models\Enquiry;
use App\Models\User;

class EnquiryPolicy
{
    public function viewAny(User $user): bool { return $user->isAdmin(); }
    public function view(User $user, Enquiry $enquiry): bool { return $user->isAdmin(); }
    public function delete(User $user, Enquiry $enquiry): bool { return $user->isAdmin(); }
}
