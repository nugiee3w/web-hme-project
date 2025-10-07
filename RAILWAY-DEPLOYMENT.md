# Deployment ke Railway.app

Proyek Laravel ini telah dikonfigurasi untuk deployment ke Railway.app. Berikut adalah langkah-langkah untuk melakukan deployment:

## Persiapan

1. **Install Railway CLI** (opsional)
   ```bash
   npm install -g @railway/cli
   ```

2. **Buat akun di Railway.app**
   - Kunjungi https://railway.app
   - Sign up dengan GitHub

## Langkah Deployment

### Metode 1: Deploy via GitHub (Recommended)

1. **Push kode ke GitHub repository**
   ```bash
   git add .
   git commit -m "Configure for Railway deployment"
   git push origin main
   ```

2. **Connect ke Railway**
   - Login ke Railway Dashboard
   - Klik "New Project"
   - Pilih "Deploy from GitHub repo"
   - Pilih repository Anda

3. **Konfigurasi Environment Variables**
   Di Railway Dashboard, tambahkan environment variables berikut:
   ```
   APP_NAME=Web HME Project
   APP_ENV=production
   APP_KEY=base64:... (generate dengan: php artisan key:generate --show)
   APP_DEBUG=false
   APP_URL=https://your-app-name.railway.app
   
   DB_CONNECTION=mysql
   DB_HOST=(Railway akan provide)
   DB_PORT=3306
   DB_DATABASE=(Railway akan provide)
   DB_USERNAME=(Railway akan provide)
   DB_PASSWORD=(Railway akan provide)
   
   LOG_CHANNEL=stack
   LOG_LEVEL=error
   
   SESSION_DRIVER=database
   CACHE_DRIVER=database
   QUEUE_CONNECTION=database
   ```

4. **Setup Database**
   - Di Railway Dashboard, klik "New Service"
   - Pilih "MySQL"
   - Railway akan auto-generate database credentials
   - Copy credentials ke environment variables

### Metode 2: Deploy via Railway CLI

1. **Login to Railway**
   ```bash
   railway login
   ```

2. **Initialize project**
   ```bash
   railway init
   ```

3. **Deploy**
   ```bash
   railway up
   ```

4. **Set environment variables**
   ```bash
   railway variables set APP_KEY=$(php artisan key:generate --show)
   railway variables set APP_ENV=production
   railway variables set APP_DEBUG=false
   # ... tambahkan variables lainnya
   ```

## Files yang Telah Dikonfigurasi

- `Dockerfile` - Container configuration untuk Railway
- `railway.json` - Railway project configuration
- `railway.toml` - Railway deployment configuration (format baru)
- `.dockerignore` - Files yang diabaikan saat build
- `.railwayignore` - Files yang diabaikan oleh Railway
- `Procfile` - Process configuration (alternatif)
- `deploy.sh` - Deployment script
- `nginx.conf` - Nginx configuration (jika diperlukan)

## Post-Deployment

Setelah deployment berhasil:

1. **Generate Application Key**
   ```bash
   railway run php artisan key:generate
   ```

2. **Run Migrations**
   ```bash
   railway run php artisan migrate --force
   ```

3. **Seed Database (opsional)**
   ```bash
   railway run php artisan db:seed --force
   ```

4. **Clear Cache**
   ```bash
   railway run php artisan cache:clear
   railway run php artisan config:clear
   railway run php artisan route:clear
   ```

## Troubleshooting

### 1. "could not find driver" Error

Jika Anda mendapat error "could not find driver" untuk MySQL:

**Penyebab:** Driver MySQL PDO tidak terinstall dengan benar di container.

**Solusi:**
1. Pastikan menggunakan Dockerfile yang sudah diperbaiki
2. Jika masih error, gunakan `Dockerfile.debug` untuk debugging:
   ```bash
   # Rename Dockerfile sementara
   mv Dockerfile Dockerfile.backup
   mv Dockerfile.debug Dockerfile
   ```
3. Test koneksi database dengan script debug:
   ```bash
   railway run bash test-db.sh
   ```

**Verifikasi PHP Extensions:**
```bash
railway run php -m | grep -i mysql
```

Harus menampilkan:
- pdo_mysql
- mysqli

### 2. Database Connection Issues

**Check Environment Variables:**
```bash
railway variables
```

Pastikan ada:
- `DB_HOST` (dari Railway MySQL service)
- `DB_PORT` (biasanya 3306)
- `DB_DATABASE` (nama database)
- `DB_USERNAME` (username database)
- `DB_PASSWORD` (password database)

**Manual Database Test:**
```bash
railway run php -r "
try {
    \$pdo = new PDO('mysql:host='.\$_ENV['DB_HOST'].';port='.\$_ENV['DB_PORT'].';dbname='.\$_ENV['DB_DATABASE'], \$_ENV['DB_USERNAME'], \$_ENV['DB_PASSWORD']);
    echo 'Database connected!';
} catch (Exception \$e) {
    echo 'Error: ' . \$e->getMessage();
}
"
```

### 3. Build Fails

**Common Issues:**
- Node.js build errors: Check `package.json` dan dependencies
- Composer errors: Check `composer.json` dan PHP version compatibility
- Permission errors: Sudah diatasi di Dockerfile

**Debug Build Process:**
1. Check build logs di Railway Dashboard
2. Test local build:
   ```bash
   docker build -t test-app .
   docker run -p 8080:80 test-app
   ```

### 4. App Tidak Bisa Diakses

**Check:**
1. APP_URL sesuai dengan domain Railway
2. APP_KEY sudah di-set
3. Database migrations berhasil
4. Apache configuration benar

**Manual Migration:**
```bash
railway run php artisan migrate --force
railway run php artisan db:seed --force
```

## Environment Variables yang Diperlukan

```
APP_NAME=Web HME Project
APP_ENV=production
APP_KEY=base64:your-app-key-here
APP_DEBUG=false
APP_URL=https://your-app-name.railway.app

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=your-db-username
DB_PASSWORD=your-db-password

SESSION_DRIVER=database
CACHE_DRIVER=database
QUEUE_CONNECTION=database
```

## Custom Domain (Opsional)

Untuk menggunakan custom domain:
1. Di Railway Dashboard, klik project Anda
2. Go to Settings > Domains
3. Add custom domain
4. Update DNS records sesuai instruksi Railway
