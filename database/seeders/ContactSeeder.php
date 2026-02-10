<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Seed contact information for CoralClean
     * 
     * Phone numbers by locale:
     * - RU: +372 5830 1348
     * - ET/EN: +372 8127 1375
     * 
     * Social media:
     * - Instagram: https://www.instagram.com/coralclean.ee/
     * - Facebook: https://www.facebook.com/coralclean
     */
    public function run(): void
    {
        DB::table('contacts')->truncate();

        $contacts = [
            [
                'locale' => 'ru',
                'phone' => '+372 5830 1348',
                'phone_clean' => '37258301348',
                'whatsapp' => 'https://wa.me/37258301348',
                'email' => 'info@coralclean.ee',
                'instagram' => 'https://www.instagram.com/coralclean.ee/',
                'facebook' => 'https://www.facebook.com/coralclean',
                'address' => 'Tallinn, Estonia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'locale' => 'et',
                'phone' => '+372 8127 1375',
                'phone_clean' => '37281271375',
                'whatsapp' => 'https://wa.me/37281271375',
                'email' => 'info@coralclean.ee',
                'instagram' => 'https://www.instagram.com/coralclean.ee/',
                'facebook' => 'https://www.facebook.com/coralclean',
                'address' => 'Tallinn, Eesti',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'locale' => 'en',
                'phone' => '+372 8127 1375',
                'phone_clean' => '37281271375',
                'whatsapp' => 'https://wa.me/37281271375',
                'email' => 'info@coralclean.ee',
                'instagram' => 'https://www.instagram.com/coralclean.ee/',
                'facebook' => 'https://www.facebook.com/coralclean',
                'address' => 'Tallinn, Estonia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contacts')->insert($contacts);

        $this->command->info('✓ Contact information seeded successfully!');
    }
}
