<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Default untuk Simulasi Presentasi
        $user = User::firstOrCreate(
            ['email' => 'pelanggan@alfikitchen.id'],
            [
                'name' => 'Anisa Nabilah Yumna',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Kategori Menu
        $categoriesData = [
            ['name' => 'Nasi Box', 'description' => 'Paket nasi lengkap praktis untuk rapat, syukuran, dan acara kantor.'],
            ['name' => 'Catering Harian', 'description' => 'Menu rumahan bergizi yang berganti setiap hari.'],
            ['name' => 'Prasmanan', 'description' => 'Sajian lengkap dengan peralatan pemanas untuk hajatan dan resepsi.'],
            ['name' => 'Snack Box', 'description' => 'Aneka kue tradisional dan modern untuk teman minum teh dan rapat.'],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['name']] = Category::firstOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'description' => $cat['description'],
                ]
            );
        }

        // 3. Data Menu
        $menusData = [
            [
                'category' => 'Nasi Box',
                'name' => 'Ayam Bakar Madu',
                'description' => 'Nasi wangi, ayam bakar bumbu madu, tahu, tempe, lalapan segar, & sambal bajak.',
                'price' => 25000,
                'min_order' => 10,
                'image' => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=800',
            ],
            [
                'category' => 'Nasi Box',
                'name' => 'Rendang Daging Sapi',
                'description' => 'Nasi gurih, rendang daging empuk, daun singkong rebus, & sambal hijau.',
                'price' => 30000,
                'min_order' => 10,
                'image' => 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=800',
            ],
            [
                'category' => 'Catering Harian',
                'name' => 'Paket Sehat Mingguan',
                'description' => 'Menu berganti tiap hari (Lauk Utama, Lauk Pendamping, Sayur, & Buah/Snack).',
                'price' => 28000,
                'min_order' => 5,
                'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=800',
            ],
            [
                'category' => 'Prasmanan',
                'name' => 'Paket Prasmanan Standard',
                'description' => '5 Jenis Lauk, Sop, Nasi Putih, Kerupuk, Es Buah, & Air Mineral.',
                'price' => 50000,
                'min_order' => 30,
                'image' => 'https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=800',
            ],
            [
                'category' => 'Snack Box',
                'name' => 'Snack Box Rapat',
                'description' => '2 Kue Asin (Risoles/Lemper), 1 Kue Manis (Pie/Brownies), & Air Mineral.',
                'price' => 15000,
                'min_order' => 15,
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800',
            ],
        ];

        $menus = [];
        foreach ($menusData as $m) {
            $menus[$m['name']] = Menu::firstOrCreate(
                ['slug' => Str::slug($m['name'])],
                [
                    'category_id' => $categories[$m['category']]->id,
                    'name' => $m['name'],
                    'description' => $m['description'],
                    'price' => $m['price'],
                    'min_order' => $m['min_order'],
                    'image' => $m['image'],
                    'is_available' => true,
                ]
            );
        }

        // 4. Dummy 3 Pesanan Selesai (Completed) untuk Simulasi Testimoni
        $completedOrdersData = [
            [
                'order_code' => 'ORD-DEMO1001',
                'menu_name' => 'Ayam Bakar Madu',
                'quantity' => 20,
                'delivery_date' => now()->subDays(10)->toDateString(),
                'delivery_time' => '11:30',
                'delivery_address' => 'Gedung Menara 165 Lt. 4, Cilandak, Jakarta Selatan',
                'notes' => 'Rapat evaluasi divisi',
            ],
            [
                'order_code' => 'ORD-DEMO1002',
                'menu_name' => 'Rendang Daging Sapi',
                'quantity' => 15,
                'delivery_date' => now()->subDays(6)->toDateString(),
                'delivery_time' => '12:00',
                'delivery_address' => 'Jl. Jeruk Purut No. 18, Pasar Minggu, Jakarta Selatan',
                'notes' => 'Makan siang tamu kantor',
            ],
            [
                'order_code' => 'ORD-DEMO1003',
                'menu_name' => 'Paket Prasmanan Standard',
                'quantity' => 40,
                'delivery_date' => now()->subDays(2)->toDateString(),
                'delivery_time' => '10:00',
                'delivery_address' => 'Aula Serbaguna Cilandak Timur, Jakarta Selatan',
                'notes' => 'Acara syukuran keluarga',
            ],
        ];

        foreach ($completedOrdersData as $ord) {
            $menuObj = $menus[$ord['menu_name']];
            $subtotal = $menuObj->price * $ord['quantity'];

            $order = Order::firstOrCreate(
                ['order_code' => $ord['order_code']],
                [
                    'user_id' => $user->id,
                    'delivery_date' => $ord['delivery_date'],
                    'delivery_time' => $ord['delivery_time'],
                    'delivery_address' => $ord['delivery_address'],
                    'notes' => $ord['notes'],
                    'total_price' => $subtotal,
                    'status' => 'completed',
                    'payment_status' => 'paid',
                ]
            );

            if ($order->orderItems()->count() === 0) {
                $order->orderItems()->create([
                    'menu_id' => $menuObj->id,
                    'quantity' => $ord['quantity'],
                    'unit_price' => $menuObj->price,
                    'subtotal' => $subtotal,
                ]);
            }

            if ($order->payments()->count() === 0) {
                $order->payments()->create([
                    'payment_type' => 'full',
                    'payment_method' => 'Transfer BCA',
                    'amount' => $subtotal,
                    'payment_proof' => 'payments/dummy-proof.jpg',
                    'status' => 'verified',
                ]);
            }
        }

        // 5. Data Testimoni Awal (1 milik Siti/user login agar bisa diuji Edit & Hapus, 2 milik orang lain agar terkunci)
        if (Testimonial::count() === 0) {
            Testimonial::insert([
                [
                    'user_id' => $user->id,
                    'customer_name' => 'Anisa Nabilah Yumna',
                    'event_name' => 'HRD PT Mulia Sejahtera',
                    'menu_ordered' => 'Ayam Bakar Madu',
                    'rating' => 5,
                    'comment' => 'Nasi box ayam bakar madunya juara banget! Bumbunya meresap sampai ke dalam, ayamnya empuk, porsinya juga mengenyangkan untuk acara kantor kami.',
                    'created_at' => now()->subDays(5),
                    'updated_at' => now()->subDays(5),
                ],
                [
                    'user_id' => null,
                    'customer_name' => 'Budi Santoso',
                    'event_name' => 'Pelanggan Harian',
                    'menu_ordered' => 'Paket Sehat Mingguan',
                    'rating' => 5,
                    'comment' => 'Sangat terbantu dengan catering harian Alfi Kitchen. Menunya bervariasi setiap hari jadi nggak bikin bosan, rasanya pas persis kayak masakan ibu di rumah.',
                    'created_at' => now()->subDays(3),
                    'updated_at' => now()->subDays(3),
                ],
                [
                    'user_id' => null,
                    'customer_name' => 'Dina Amanda',
                    'event_name' => 'Acara Keluarga',
                    'menu_ordered' => 'Paket Prasmanan Standard',
                    'rating' => 5,
                    'comment' => 'Pesan paket prasmanan untuk acara syukuran rumah baru. Pelayanannya sangat ramah, peralatan lengkap, dan tamunya banyak yang memuji rasa rendangnya.',
                    'created_at' => now()->subDay(),
                    'updated_at' => now()->subDay(),
                ],
            ]);
        }
    }
}