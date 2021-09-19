<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UsersStudent;
use App\Models\UsersTeacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required', 'string', 'max:255']
        ])->validate();



        $user =  User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role']

        ]);

        if ($input['role'] === '1') {
            $user_teacher = new UsersTeacher(
                [
                    'teacher_role' => $input['teacher_role'],
                    'teacher_phone' => $input['teacher_phone'],
                    'teacher_country' => $input['teacher_country'],
                ]
            );
            $user->teacher()->save($user_teacher);
        }
        if ($input['role'] === '0') {
            $user_student = new UsersStudent(
                [
                    'nsn' => $input['nsn'],
                    'gender' => $input['gender'],
                    'phone' => $input['phone'],
                    'ethnicity_other' => $input['ethnicity_other'],
                ]
            );
            $user->student()->save($user_student);
        }

        return $user;
    }
}
