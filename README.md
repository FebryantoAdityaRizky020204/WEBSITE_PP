
# 🧺 Aplikasi Manajemen Laundry – Himee Laundry

Selamat datang di repositori ini!

Proyek ini merupakan **aplikasi manajemen laundry berbasis web** yang dikembangkan untuk memenuhi tugas mata kuliah **Program Profesional** di Jurusan Teknik Informatika, Fakultas Teknik, Universitas Palangka Raya.

---

## 📖 Deskripsi Proyek

Himee Laundry adalah usaha mikro yang bergerak di bidang jasa pencucian pakaian, sepatu, dan barang lainnya. Dalam operasionalnya, Himee Laundry sebelumnya masih menggunakan sistem manual, yang menyebabkan:

- Kesalahan pencatatan transaksi
- Sulitnya memantau status pengerjaan cucian
- Pengelolaan keuangan yang tidak terstruktur

Untuk menjawab tantangan tersebut, aplikasi ini dibangun menggunakan **Laravel Framework** agar dapat:

- Mencatat transaksi secara digital dan terstruktur
- Memberikan akses real-time kepada pelanggan untuk mengecek status cucian
- Mempermudah pengelolaan layanan, transaksi, dan pengeluaran
- Meningkatkan efisiensi dan transparansi operasional laundry

---

## 🚀 Fitur Utama

### 🎫 Untuk Pelanggan:
- Landing page berisi informasi layanan, harga, dan lokasi
- Cek status laundry secara real-time dengan nama & nomor telepon

### 🛠️ Untuk Pengelola:
- Login aman untuk admin
- Manajemen layanan (kategori, nama layanan, harga)
- Pembuatan dan pengelolaan transaksi laundry
- Input dan update rincian cucian
- Cetak bukti transaksi
- Manajemen pengeluaran
- Dashboard keuangan (grafik pemasukan dan pengeluaran)

---

## 🧰 Teknologi yang Digunakan

| Teknologi | Deskripsi |
|----------|-----------|
| **Laravel** | Framework PHP utama |
| **Livewire** | Komponen UI dinamis |
| **Bootstrap** | Tampilan responsif dan modern |
| **MySQL** | Basis data relasional |
| **Figma** | Desain UI/UX |
| **Visual Studio Code** | Code editor |
| **Laragon** | Web server lokal untuk pengembangan |

---

## 📂 Struktur Folder

```
├── app/                  # Logika backend (controller, model, dll)
├── resources/views/      # Blade templates (frontend)
├── routes/web.php        # Routing aplikasi
├── public/               # Aset publik (CSS, JS, gambar)
├── database/             # Migrasi dan seeder
├── .env                  # Konfigurasi koneksi database
├── composer.json         # Dependensi Laravel
```

---

## ⚙️ Instalasi & Penggunaan

### 1. Clone repositori
```bash
git clone https://github.com/FebryantoAdityaRizky020204/WEBSITE_PP.git
cd WEBSITE_PP
cd HimeeLaundry
```

### 2. Instalasi dependency
```bash
composer install
npm install && npm run dev
```

### 3. Konfigurasi `.env`
Salin file `.env.example` menjadi `.env` dan sesuaikan:
```env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate key & migrate database
```bash
php artisan key:generate
php artisan migrate
```

### 5. Jalankan aplikasi
```bash
php artisan serve
```

---

## 📸 Cuplikan Layar

### 🌐 Landing Page
![Landing Page](screenshots/landing.png)

### 🔍 Cek Status Laundry
![Cek Status](screenshots/cek_status.png)

### 🧾 Halaman Admin - Transaksi
![Dashboard](screenshots/admin_dashboard.png)

---

## ✍️ Penulis

- **Aditya Rizky Febryanto** – [@adityarizkyfebryanto](mailto:adityarizkyfebryanto@mhs.eng.upr.ac.id)  
- **Boyke Danan Filtranda** – [@boykedananf](mailto:boykedananf@mhs.eng.upr.ac.id)

---

## 📜 Lisensi

Proyek ini dibuat untuk tujuan edukasi dan pengembangan pribadi. Bebas digunakan sebagai referensi atau pembelajaran.

---

## 🙏 Ucapan Terima Kasih

Terima kasih kepada Dosen Pembimbing **Bapak Deddy Ronaldo, S.T., M.T.**, Dosen Penguji **Ibu Licantik, S.Kom., M.Kom.**, Dan Pemilik Usaha Himee Laundry **Putri Karina Sari**, serta semua pihak yang telah memberikan dukungan dalam penyusunan dan pengembangan proyek ini.

---

Jika Anda ingin menambahkan fitur baru atau melaporkan bug, silakan buat issue atau pull request.  
Semoga proyek ini bermanfaat dan menginspirasi!