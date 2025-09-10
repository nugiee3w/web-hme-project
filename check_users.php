<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

// Get all users with their roles
$users = User::with('roles')->get();

echo "=== DAFTAR USER YANG BISA LOGIN ===\n\n";

foreach ($users as $user) {
    echo "Nama: " . $user->name . "\n";
    echo "Username: " . ($user->username ?? 'N/A') . "\n";
    echo "Email: " . $user->email . "\n";
    echo "Role: " . $user->roles->pluck('name')->join(', ') . "\n";
    echo "Created: " . $user->created_at->format('Y-m-d H:i:s') . "\n";
    echo "----------------------------------------\n\n";
}

echo "Total users: " . $users->count() . "\n\n";

echo "=== INFORMASI LOGIN ===\n";
echo "Berdasarkan konfigurasi Fortify, login menggunakan EMAIL sebagai username.\n";
echo "Field username tersedia tetapi tidak digunakan untuk autentikasi.\n\n";

echo "=== DATA LOGIN DARI SEEDER ===\n";
echo "User Admin:\n";
echo "- Email: admin@hme.poliban.ac.id\n";
echo "- Password: Admin#1234\n";
echo "- Role: admin\n\n";

echo "User lain dalam seeder di-comment, jadi hanya ada 1 user aktif.\n";
