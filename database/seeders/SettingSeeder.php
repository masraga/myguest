<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            "wa_token" => "set wa token here",
            "admin_phone" => "set admin phone here",
        ]);

        User::create([
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("admin")
        ]);
    }
}
