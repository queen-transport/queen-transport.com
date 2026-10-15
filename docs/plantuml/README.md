# 📐 Diagram Use Case - Queen Transport (`queen-transport.com`)

Direktori ini berisi spesifikasi berkas diagram Use Case berbasis **PlantUML** untuk sistem aplikasi **Queen Transport**, mencakup portal web publik (layanan rental mobil mewah & VIP) dan Panel Admin berbasis Filament v5.

---

## 📁 Daftar Berkas Diagram

| No | Berkas PlantUML | Format Gambar | Deskripsi Diagram |
|---|---|---|---|
| 1 | [`usecase_overview.puml`](usecase_overview.puml) | [PNG](usecase_overview.png) \| [SVG](usecase_overview.svg) | **Overview Global Sistem**: Menghubungkan semua aktor (Pengunjung, Admin, WhatsApp, Web Crawler) dengan subsistem utama. |
| 2 | [`usecase_public_website.puml`](usecase_public_website.puml) | [PNG](usecase_public_website.png) \| [SVG](usecase_public_website.svg) | **Website Publik & Customer Journey**: Alur eksplorasi armada, video showcase, blog SEO, galeri portofolio, dan alur booking WhatsApp. |
| 3 | [`usecase_admin_content_management.puml`](usecase_admin_content_management.puml) | [PNG](usecase_admin_content_management.png) \| [SVG](usecase_admin_content_management.svg) | **Panel Admin (Manajemen Konten)**: Pengelolaan armada, blog post, kategori, tag, import WordPress (WXR XML), galeri & pelanggan. |
| 4 | [`usecase_admin_system_security.puml`](usecase_admin_system_security.puml) | [PNG](usecase_admin_system_security.png) \| [SVG](usecase_admin_system_security.svg) | **Panel Admin (Keamanan & Sistem)**: Otentikasi Fortify 2FA, Passkeys / WebAuthn, widget analitik, pengaturan situs, dan backup. |

---

## 👥 Aktor Sistem

1. **Pengunjung Web / Calon Pelanggan (Visitor / Customer)**:
   - Pengguna publik yang mengakses informasi armada, harga, artikel, galeri dokumentasi, dan melakukan reservasi via WhatsApp.
2. **Administrator (Admin / Content Manager)**:
   - Pengelola internal yang memiliki hak akses penuh ke panel admin Filament untuk mengelola data armada, konten publikasi, media, dan konfigurasi sistem.
3. **Staff / Pengguna Terdaftar (Registered Staff)**:
   - Pengguna internal terotentikasi yang dapat mengelola profil pribadi, kata sandi, passkey, dan preferensi tampilan.
4. **Layanan WhatsApp (External Service)**:
   - Gateway eksternal penerima pemesanan langsung dari pengunjung web melalui generator pesan template otomatis.
5. **Mesin Pencari (Search Engine Bot / Crawler)**:
   - Mesin pencari (Googlebot, dsb.) yang mengonsumsi sitemap XML dinamis (`/sitemap.xml`) dan mengindeks artikel blog serta katalog armada berbasis URL SEO-friendly.
6. **Sumber Data WordPress (External Data Source)**:
   - Berkas ekspor WXR XML dari instalasi lama WordPress yang diimpor secara otomatis ke sistem Queen Transport.

---

## 🛠️ Cara Merender Diagram ke Gambar

Jika Anda melakukan perubahan pada salah satu berkas `.puml`, Anda dapat merender ulang diagram menggunakan salah satu cara berikut:

### 1. Menggunakan CLI PlantUML (Lokal)

Pastikan `plantuml` dan `graphviz` sudah terpasang di sistem:

```bash
# Render ke format PNG
plantuml docs/plantuml/*.puml

# Render ke format SVG (vektor)
plantuml -tsvg docs/plantuml/*.puml
```

### 2. Menggunakan Ekstensi VS Code / Cursor / IDE

- Pasang ekstensi **PlantUML** oleh Jebbs.
- Buka salah satu file `.puml`.
- Tekan `Alt + D` (Linux/Windows) atau `Option + D` (macOS) untuk melihat live preview secara langsung di editor.

### 3. Menggunakan Online PlantUML Viewer

- Salin isi berkas `.puml`.
- Buka [PlantText](https://www.planttext.com/) atau [PlantUML Server](https://www.plantuml.com/plantuml/uml/).
- Tempelkan kode diagram untuk merender secara instan.
