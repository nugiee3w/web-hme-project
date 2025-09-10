# Railway.app Deployment Guide untuk HME Poliban Website

## Cara Deploy ke Railway.app

### 1. Persiapan Repository
Pastikan semua file konfigurasi sudah ada:
- ✅ `nixpacks.toml` - Konfigurasi Nixpacks
- ✅ `Procfile` - Konfigurasi proses
- ✅ `railway.json` - Konfigurasi Railway
- ✅ `.env.railway` - Environment variables template
- ✅ `.railwayignore` - File yang diabaikan saat deploy

### 2. Setup di Railway.app
1. Login ke [Railway.app](https://railway.app)
2. Klik "New Project"
3. Pilih "Deploy from GitHub repo"
4. Pilih repository `web-hme-project`
5. Railway akan otomatis mendeteksi sebagai PHP/Laravel project

### 3. Environment Variables
Set environment variables berikut di Railway dashboard:
```bash
APP_NAME="HME Poliban"
APP_ENV=production
APP_DEBUG=false
APP_KEY=[Generate dengan: php artisan key:generate --show]
```

### 4. Database Setup
Railway menyediakan PostgreSQL gratis:
1. Di dashboard Railway, klik "Add Service"
2. Pilih "PostgreSQL"
3. Database environment variables akan otomatis tersedia

### 5. Custom Domain (Opsional)
1. Di Railway dashboard, buka tab "Settings"
2. Scroll ke "Domains"
3. Add custom domain jika diperlukan

### 6. Troubleshooting

#### Error "No version available for php 8.1"
- ✅ **Fixed**: Sudah diupdate ke PHP 8.2 di `composer.json`
- ✅ **Fixed**: Sudah ditambahkan `nixpacks.toml` dengan PHP_VERSION = "8.2"

#### Build Failures
```bash
# Check build logs di Railway dashboard
# Pastikan semua dependencies terinstall
composer install --no-dev --optimize-autoloader
```

#### Runtime Errors
```bash
# Check deploy logs
# Pastikan APP_KEY sudah di-set
# Pastikan database connection benar
```

### 7. Monitoring
- Build logs: Railway Dashboard > Deployments tab
- Runtime logs: Railway Dashboard > View Logs
- Metrics: Railway Dashboard > Observability tab

## File Changes Made for Railway Compatibility

1. **composer.json**: Updated PHP version from ^8.1 to ^8.2
2. **nixpacks.toml**: Added Nixpacks configuration
3. **Procfile**: Added process configuration
4. **railway.json**: Added Railway-specific settings
5. **.env.railway**: Environment template for production
6. **.railwayignore**: Optimized deployment files

## Post-Deployment Checklist
- [ ] Website loads successfully
- [ ] Database connection works
- [ ] Static assets loading properly
- [ ] All pages accessible
- [ ] Mobile responsiveness working
- [ ] Contact forms working (if any)

---
Generated for HME Poliban Website Deployment
Date: September 11, 2025
