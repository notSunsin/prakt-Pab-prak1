# 📚 ArsipIn - Sistem Manajemen Arsip Digital

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

**ArsipIn** adalah sistem manajemen arsip digital yang dirancang untuk mengelola dokumen dan arsip dengan fitur role-based access control, retensi otomatis, dan integrasi Telegram bot.

## 🚀 Fitur Utama

### 👥 Role-Based Access Control
- **Administrator**: Akses penuh ke semua fitur sistem
- **Staff (Pegawai TU)**: Manajemen arsip dan laporan
- **Intern (Mahasiswa)**: Input dan view arsip dengan pembatasan

### 📋 Manajemen Arsip
- ✅ Input, edit, dan hapus arsip
- ✅ Kategorisasi dan klasifikasi dokumen
- ✅ Sistem retensi otomatis (Aktif → Inaktif → Final)
- ✅ Pencarian multi-kriteria berdasarkan deskripsi, kategori, tahun, dan kata kunci
- ✅ Deteksi arsip serupa / duplikasi
- ✅ OCR scan untuk pemrosesan teks arsip
- ✅ Export ke Excel dan PDF

### 🏢 Manajemen Storage
- ✅ Konfigurasi rak, baris, dan box
- ✅ Penempatan arsip otomatis ke lokasi storage
- ✅ Penghitungan kapasitas storage
- ✅ Label dan barcode generation
- ✅ Operasi bulk (mass update, assign, delete, export)

### 📊 Dashboard & Analytics
- ✅ Dashboard khusus per role
- ✅ Statistik arsip real-time
- ✅ Retention dashboard dan laporan storage
- ✅ Export analytics ke PDF
- ✅ Smart archive analysis dan related archive sync

### 🤖 Integrasi Telegram Bot
- ✅ Notifikasi retensi otomatis
- ✅ Notifikasi maintenance harian
- ✅ Pencarian status storage via bot
- ✅ Menu bot interaktif dengan /start, /menu, /retention, /storage, /website

### 🔒 Keamanan
- ✅ Authentication & Authorization
- ✅ Role-based permissions (Spatie)
- ✅ CSRF protection
- ✅ Rate limiting
- ✅ Input validation dan sanitasi

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 12** - PHP Framework
- **PHP 8.3** - Minimum version
- **PostgreSQL** (default) / **MySQL**
- **Spatie Laravel-Permission** - Role & permission management
- **Laravel Sanctum** - API authentication

### Frontend
- **Vite** - Build tooling
- **Vue 3** - UI interactivity
- **Tailwind CSS 3.x** - Styling
- **Element Plus** - UI components
- **jQuery**, **Select2**, **SweetAlert2**

### Integrasi
- **Telegram Bot API** - Notifikasi & query storage
- **Maatwebsite Laravel-Excel** - Excel export
- **Barryvdh DomPDF** - PDF export
- **PhpSpreadsheet** / **PHPWord** - Office export
- **Chart.js** - Grafik analytics

## 📋 Requirements

### System Requirements
- **PHP**: 8.3 atau lebih tinggi
- **Composer**: 2.0 atau lebih tinggi
- **Node.js**: 20 atau lebih tinggi
- **Database**: PostgreSQL 13+ (default), MySQL 8+ juga didukung

### PHP Extensions
```bash
php-bcmath
php-curl
php-dom
php-fileinfo
php-gd
php-mbstring
php-pgsql # atau php-mysql jika menggunakan MySQL
php-xml
php-zip
```

## 🚀 Installation

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/arsipin.git
cd arsipin
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database
```bash
# Edit .env file
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=archivy
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Configure Telegram Bot (Optional)
```bash
TELEGRAM_BOT_TOKEN=your_bot_token
TELEGRAM_CHAT_ID=your_chat_id
```

### 6. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

Jika Anda perlu mengimpor data kategori dan klasifikasi dari SQL:
```bash
psql -h localhost -U your_username -d archivy < "db category.sql"
psql -h localhost -U your_username -d archivy < "db klasifikasi.sql"
```

Untuk seed tambahan:
```bash
php artisan db:seed --class=LainnyaCategorySeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=ClassificationSeeder
```

### 7. Setup Storage & Build Assets
```bash
php artisan storage:link
npm run build
php artisan config:clear
php artisan config:cache
```

### 8. Start Development Server
```bash
php artisan serve
```

## 🔧 Configuration

## 🕐 Cron Job Setup

### Ubuntu Server Setup

1. **SSH ke server**
   ```bash
   ssh username@your-server-ip
   ```

2. **Buka crontab**
   ```bash
   sudo crontab -u www-data -e
   ```

3. **Tambahkan Laravel Scheduler**
   ```bash
   * * * * * cd /var/www/html/archivy && php artisan schedule:run >> /dev/null 2>&1
   ```

4. **Verifikasi**
   ```bash
   sudo crontab -u www-data -l
   sudo systemctl status cron
   ```

### Scheduled Tasks

- **Archive Status Update**: Setiap hari jam 00:30
- **Telegram Retention Alert**: Setiap hari jam 08:00
- **Telegram Maintenance Notification**: Setiap hari jam 23:00
- **Sync Related Archives**: Setiap jam

### Testing Scheduler

```bash
php artisan schedule:run
php artisan telegram:retention-alert
php artisan telegram:maintenance-notification
php artisan archives:sync-related
```

### Telegram Bot Setup

1. Set webhook:
```bash
php artisan telegram:set-webhook https://your-domain.com
```

2. Test bot:
```bash
php artisan telegram:test your_chat_id
```

3. Check webhook status via Telegram API:
```bash
curl -X GET "https://api.telegram.org/botYOUR_BOT_TOKEN/getWebhookInfo"
```

### File Permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Queue Configuration (Optional)
```bash
php artisan queue:work
```

## 📁 Project Structure

```
arsipin/
├── app/
│   ├── Console/Commands/          # Artisan Commands
│   ├── Http/Controllers/          # Controllers
│   │   ├── Admin/                # Admin Controllers
│   │   ├── Auth/                 # Authentication Controllers
│   │   ├── Staff/                # Staff Controllers
│   │   └── Intern/               # Intern Controllers
│   ├── Models/                   # Eloquent Models
│   ├── Observers/                # Model Observers
│   ├── Services/                 # Business Logic Services
│   └── Providers/                # Service Providers
├── database/
│   ├── migrations/               # Database Migrations
│   └── seeders/                  # Database Seeders
├── resources/
│   ├── views/                    # Blade Templates
│   │   ├── admin/               # Admin Views
│   │   ├── staff/               # Staff Views
│   │   ├── intern/              # Intern Views
│   │   └── auth/                # Authentication Views
│   └── css/                     # Stylesheets
├── routes/                       # Route Definitions
├── storage/                      # File Storage
└── public/                       # Public Assets
```

## 🔐 Default Users

Setelah menjalankan seeder, sistem akan memiliki:

### Admin User
- **Email**: admin@arsipin.id
- **Password**: password
- **Role**: Administrator

### Staff User
- **Email**: staff@arsipin.id
- **Password**: password
- **Role**: Staff

### Intern User
- **Email**: intern@arsipin.id
- **Password**: password
- **Role**: Intern

### Roles Available
- **admin**: Akses penuh sistem
- **staff**: Manajemen arsip & laporan
- **intern**: Input & view arsip

## 📱 Telegram Bot Commands

| Command | Description |
|---------|-------------|
| `/start` | Mulai bot dan tampilkan menu utama |
| `/menu` | Tampilkan menu utama |
| `/retention` | Tampilkan alert arsip mendekati retensi |
| `/storage` | Lihat status storage dan kapasitas |
| `/website` | Tampilkan status website aplikasi |
| `/stop` | Hentikan bot (harus /start ulang) |

## 🚀 Deployment

### Production Checklist
- [ ] Set `APP_ENV=production` di `.env`
- [ ] Set `APP_DEBUG=false` di `.env`
- [ ] Configure production database
- [ ] Set proper file permissions
- [ ] Configure web server (Nginx/Apache)
- [ ] Setup SSL certificate
- [ ] Configure backup strategy

### Server Requirements
- **Web Server**: Nginx/Apache
- **PHP**: 8.3+ dengan OPcache
- **Database**: MySQL 8.0+ atau PostgreSQL 13+
- **Memory**: Minimum 512MB RAM
- **Storage**: Minimum 10GB

## 🧪 Testing

```bash
# Run PHPUnit tests
php artisan test

# Run specific test
php artisan test --filter=UserTest

# Run with coverage
php artisan test --coverage
```

## 📊 Performance

### Optimization Tips
- ✅ Enable OPcache
- ✅ Use Redis for caching
- ✅ Optimize database queries
- ✅ Enable compression (gzip)
- ✅ Use CDN for static assets

### Monitoring
- Laravel Telescope (development)
- Laravel Horizon (queue monitoring)
- Database query logging
- Application performance monitoring

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📝 Changelog

### [1.0.0] - 2025-01-XX
- ✅ Initial release
- ✅ Role-based access control
- ✅ Archive management system
- ✅ Telegram bot integration
- ✅ Storage management
- ✅ Reporting system

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

### Documentation
- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Telegram Bot API](https://core.telegram.org/bots/api)

### Issues & Questions
- 📧 Email: support@arsipin.com
- 🐛 [GitHub Issues](https://github.com/yourusername/arsipin/issues)
- 💬 [Discussions](https://github.com/yourusername/arsipin/discussions)

### Community
- 🌐 Website: [https://arsipin.com](https://arsipin.com)
- 📱 Telegram: [@ArsipInBot](https://t.me/ArsipInBot)
- 📧 Email: info@arsipin.com

---

<div align="center">

**Made with by ArsipIn Team**

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/yourusername)
[![Telegram](https://img.shields.io/badge/Telegram-2CA5E0?style=for-the-badge&logo=telegram&logoColor=white)](https://t.me/ArsipInBot)

</div>
#
