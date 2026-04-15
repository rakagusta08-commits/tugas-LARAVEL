# 🏢 Sistem Manajemen Karyawan - SMKN 4 Bandung

Tugas mandiri pengembangan aplikasi web berbasis framework Laravel untuk mengelola data SDM (Sumber Daya Manusia) secara dinamis dan terintegrasi.

## 👤 Identitas Pengembang
* **Nama:** Raka Augusta Syabani (Gustavo)
* **Kelas:** XI RPL 1
* **Sekolah:** SMKN 4 Bandung
* **Project Name:** HR Management System (TESLARA1)

---

## 🚀 Fitur & Pencapaian Tugas
Berikut adalah fungsionalitas utama yang telah berhasil diimplementasikan:

1. **Arsitektur Database**: Menggunakan sistem relasi antar tabel (One-to-Many) antara tabel `Jabatan` dan `Karyawan`.
2. **Master Data Jabatan**: Pengelolaan data jabatan, level, dan standar gaji pokok.
3. **Join Data & Relasi**: Menampilkan informasi gaji secara otomatis berdasarkan jabatan yang dipilih.
4. **UI/UX Modern**: Desain antarmuka menggunakan **Tailwind CSS** yang bersih dan responsif.

---

## 📸 Hasil Pengerjaan (Preview)
Berikut adalah tampilan antarmuka aplikasi yang dijalankan melalui server lokal:

![Tampilan Web Aplikasi](resources/asset/screenshot-web.png)

---

## 🛠 Teknologi yang Digunakan
* **Backend:** PHP 8.x & Laravel
* **Frontend:** Tailwind CSS & Blade Templating
* **Database:** MySQL / SQLite
* **Version Control:** Git & GitHub

---

## ⚙️ Cara Menjalankan Proyek
1. Clone repository ini.
2. Jalankan `composer install`.
3. Salin file `.env.example` menjadi `.env`.
4. Jalankan `php artisan key:generate`.
5. Jalankan `php artisan migrate --seed`.
6. Jalankan `php artisan serve`.
7. Akses di browser melalui `http://127.0.0.1:8000`.

---
*Dibuat dengan dedikasi untuk memenuhi tugas mata pelajaran Produktif Rekayasa Perangkat Lunak.*