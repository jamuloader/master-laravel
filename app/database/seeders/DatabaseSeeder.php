<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Admin
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'bio' => 'Saya adalah administrator website berita ini.',
        ]);

        // 2. Buat Beberapa Kategori Manual
        $tech = Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
            'description' => 'Berita seputar gadget, AI, dan perkembangan teknologi terbaru.',
        ]);

        $politik = Category::create([
            'name' => 'Politik',
            'slug' => 'politik',
            'description' => 'Informasi dan berita terkini seputar dunia politik nasional.',
        ]);

        $olahraga = Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'description' => 'Update berita sepak bola, bulu tangkis, dan olahraga lainnya.',
        ]);

        // 3. Buat Artikel Berita Manual
        Post::create([
            'title' => 'Peluncuran Laravel 13 dan Filament 5',
            'slug' => 'peluncuran-laravel-13-dan-filament-5',
            'content' => '<p>Dunia web development kembali dihebohkan dengan rilisnya Laravel 13. Framework PHP paling populer ini membawa segudang fitur baru. Tidak hanya itu, Filament 5 juga resmi dirilis dan sangat kompatibel dengan Laravel 13.</p><p>Kombinasi ini membuat proses pembuatan panel admin menjadi sangat cepat dan menyenangkan.</p>',
            'excerpt' => 'Laravel 13 dan Filament 5 resmi dirilis. Simak ulasan lengkapnya di sini.',
            'featured_image' => 'https://picsum.photos/seed/laravel/800/600',
            'status' => 'published',
            'published_at' => now(),
            'category_id' => $tech->id,
            'user_id' => $admin->id,
        ]);

        Post::create([
            'title' => 'Pemerintah Umumkan Kebijakan Baru Hari Ini',
            'slug' => 'pemerintah-umumkan-kebijakan-baru-hari-ini',
            'content' => '<p>Pemerintah secara resmi mengumumkan kebijakan baru terkait perekonomian negara pada konferensi pers hari ini.</p><p>Kebijakan ini diharapkan mampu mendorong pertumbuhan ekonomi di kuartal berikutnya.</p>',
            'excerpt' => 'Pemerintah mengumumkan kebijakan ekonomi baru dalam konferensi pers hari ini.',
            'featured_image' => 'https://picsum.photos/seed/politik/800/600',
            'status' => 'published',
            'published_at' => now()->subDays(1),
            'category_id' => $politik->id,
            'user_id' => $admin->id,
        ]);

        Post::create([
            'title' => 'Timnas Indonesia Menang Telak 3-0',
            'slug' => 'timnas-indonesia-menang-telak-3-0',
            'content' => '<p>Pertandingan sengit berakhir manis bagi Timnas Indonesia. Mereka berhasil mengalahkan lawannya dengan skor meyakinkan 3-0 di Stadion Utama Gelora Bung Karno.</p>',
            'excerpt' => 'Timnas Indonesia berhasil meraih kemenangan telak 3-0 dalam pertandingan semalam.',
            'featured_image' => 'https://picsum.photos/seed/bola/800/600',
            'status' => 'draft', // Artikel ini sengaja dibuat draft
            'published_at' => null,
            'category_id' => $olahraga->id,
            'user_id' => $admin->id,
        ]);
    }
}