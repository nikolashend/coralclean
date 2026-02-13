#!/usr/bin/env php
<?php

// Update Admin Password Script for Production
// Run this on production server: php update_password_production.php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$newPassword = 'CoralClean2026!Secure#Admin';

$user = App\Models\User::where('email', 'admin@coralclean.ee')->first();

if ($user) {
    $user->password = bcrypt($newPassword);
    $user->save();
    
    echo "✓ Password updated successfully!\n\n";
    echo "Email: {$user->email}\n";
    echo "Password has been set to the secure one.\n";
} else {
    echo "✗ Admin user not found\n";
    echo "Creating admin user...\n";
    
    $user = App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@coralclean.ee',
        'password' => bcrypt($newPassword),
        'email_verified_at' => now(),
    ]);
    
    echo "✓ Admin user created successfully!\n";
    echo "Email: {$user->email}\n";
}

echo "\nDone!\n";
