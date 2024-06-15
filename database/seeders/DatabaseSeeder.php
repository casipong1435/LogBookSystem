<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TransactionType;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'username' => 'admin',
            'name' => 'Admin',
            'password' => Hash::make('admin')
        ];

        $transactionType = [
            [
                'transaction' => 'Student Portal'
            ],
            [
                'transaction' => 'Faculty Portal'
            ],
            [
                'transaction' => 'MS Teams'
            ],
            [
                'transaction' => 'ICT Services'
            ],
            [
                'transaction' => 'DTR'  
            ]

        ];

        User::create($admin);
        TransactionType::insert($transactionType);
    }
}
