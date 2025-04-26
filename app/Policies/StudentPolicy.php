<?php
namespace App\Policies;

use App\Models\User;

class StudentPolicy
{

    public function view(User $authUser, User $student)
    {
        return $authUser->id === $student->id;  // Ensure a student can only view their own data
    }
    

    public function update(User $authUser, User $student)
    {
        return $authUser->id === $student->id && $authUser->isStudent();
    }

    
    public function viewByAdminOrInstructor(User $authUser)
    {
        return $authUser->isAdmin() || $authUser->isInstructor();
    }

}
