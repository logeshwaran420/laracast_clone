<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given course can be viewed by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return bool
     */
    public function view(User $user, Course $course)
    {
        return $user->id === $course->user_id;  // Only allow the instructor who owns the course
    }

    /**
     * Determine if the given course can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return bool
     */
    public function update(User $user, Course $course)
    {
        return $user->id === $course->user_id;  // Only allow the instructor who owns the course
    }

    /**
     * Determine if the given course can be deleted by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return bool
     */
    public function delete(User $user, Course $course)
    {
        return $user->id === $course->user_id;  // Only allow the instructor who owns the course
    }
}
