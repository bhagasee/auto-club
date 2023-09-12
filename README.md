
# Dealership AutoClub

Perusahaan dummy yang bergerak dalam penjualan, penyewaan dan reparasi mobil. Dapat diakses pada halaman link berikut https://rpl-kel4.000webhostapp.com/


## Deployment

Menjalankan aplikasi dilakukan dengan cara unduh dan salin pada tools yang digunakan seperti XAMPP

```bash
  C:\xampp\htdocs\
```

Gunakan url berikut untuk mengakses CRM dashboard
'localhost/admin'

<details>

<summary>Konfigurasi Database</summary>

### Setup Database
Pastikan XAMPP dapat digunakan dengan sempurna, selanjutnya
1. Jalankan modul Apache dan MySQL
2. Tekan admin pada modul MySQL
3. Buat database dan tentukan namanya (ex. id20382767_autoclub)
4. Pilih import

### Edit File
Konfigurasi pada file connection.php, perbaharui nama database

```bash
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "id20382767_autoclub";
```
</details>



## Features

- CRM Dashboard
- CRUD Produk
- Login terpisah untuk admin dan custumer
- Welcome email
- Upload image




## Tabel Pada Database

Berikut adalah list table yang digunakan

| Table |Type| Description |
| --- | --- |--- |
| calendar | - | Jadwal kerja perbulan |
| cars | Main | Data produk |
| custumer | Main | Data pelanggan yang melakukan pendaftaran|
| emails | - | Daftar dari contact us |
| employees | Main | Daftar pegawai yang digunakan untuk login admin |
| newslatter | Main | Data pelanggan untuk layanan newslatter saja, tidak dapat login |
| pictures | Main | Menyimpan alamat gambar |
| schedule | Main | Tabel untuk test drive |
| shopping | Main | Tabel menyimpan hasil check out |
| timeschedule | Main | Jadwal jam dan ketersediaan untuk test drive |
| videos | Main | Menyimpan alamat video |

## Documentation
Dokumentasi mengenai tabel dan baris dapat diunduh
[Database](https://drive.google.com/file/d/1bWC1ZMzdLFT4nXKetflwS3GBHDGeDes0/view?usp=sharing)

