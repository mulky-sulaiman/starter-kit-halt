<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // 1. Super Admin
        $u1 = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            // 'role' => RoleEnum::SUPER_ADMIN->value,
        ]);
        $u1->assignRole(RoleEnum::SUPER_ADMIN->value);

        // 2. Admin
        $u2 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            // 'role' => RoleEnum::ADMIN->value,
        ]);
        $u2->assignRole(RoleEnum::ADMIN->value);

        // 3. Operators
        $u3 = User::factory()->create([
            'name' => 'Operator 1',
            'email' => 'operator.1@example.com',
            // 'role' => RoleEnum::OPERATOR->value,
        ]);
        $u3->assignRole(RoleEnum::OPERATOR->value);

        $u4 = User::factory()->create([
            'name' => 'Operator 2',
            'email' => 'operator.2@example.com',
            // 'role' => RoleEnum::OPERATOR->value,
        ]);
        $u4->assignRole(RoleEnum::OPERATOR->value);

        // 4. Members
        $u5 = User::factory()->create([
            'name' => 'Member 1',
            'email' => 'member.1@example.com',
            // 'role' => RoleEnum::MEMBER->value,
        ]);
        $u5->assignRole(RoleEnum::MEMBER->value);

        $u6 = User::factory()->create([
            'name' => 'Member 2',
            'email' => 'member.2@example.com',
            // 'role' => RoleEnum::MEMBER->value,
        ]);
        $u6->assignRole(RoleEnum::MEMBER->value);
    }
}
