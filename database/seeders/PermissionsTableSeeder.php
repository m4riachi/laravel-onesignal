<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'one_signal_account_create',
            ],
            [
                'id'    => 20,
                'title' => 'one_signal_account_edit',
            ],
            [
                'id'    => 21,
                'title' => 'one_signal_account_show',
            ],
            [
                'id'    => 22,
                'title' => 'one_signal_account_delete',
            ],
            [
                'id'    => 23,
                'title' => 'one_signal_account_access',
            ],
            [
                'id'    => 24,
                'title' => 'application_create',
            ],
            [
                'id'    => 25,
                'title' => 'application_edit',
            ],
            [
                'id'    => 26,
                'title' => 'application_show',
            ],
            [
                'id'    => 27,
                'title' => 'application_delete',
            ],
            [
                'id'    => 28,
                'title' => 'application_access',
            ],
            [
                'id'    => 29,
                'title' => 'notification_create',
            ],
            [
                'id'    => 30,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 31,
                'title' => 'notification_show',
            ],
            [
                'id'    => 32,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 33,
                'title' => 'notification_access',
            ],
            [
                'id'    => 34,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
