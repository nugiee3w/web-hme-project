# Railway.app Deployment Guide untuk HME Poliban Website

## 🚀 Quick Fix untuk Railway Deployment

### Problem Resolved:
❌ **Error**: `bash: railway-deploy.sh: No such file or directory`  
✅ **Fixed**: Simplified deployment configuration

### Files Updated:
- ✅ `nixpacks.toml` - Updated with proper PHP configuration  
- ✅ `Procfile` - Simplified startup command  
- ✅ `railway.json` - Added Railway-specific settings  
- ✅ `.env.example` - Updated with production values  

## 1. Deployment Files

### nixpacks.toml
```toml
providers = ["php"]

[phases.setup]
nixPkgs = ["php82", "php82Extensions.pdo", "php82Extensions.mbstring", "php82Extensions.tokenizer", "php82Extensions.xml", "php82Extensions.curl", "php82Extensions.zip", "php82Extensions.gd"]

[phases.install]
cmds = ["composer install --no-dev --optimize-autoloader --no-interaction"]

[phases.build]
cmds = [
    "cp .env.example .env",
    "echo 'APP_KEY=base64:KhUmI9k//WiT6BW5g4p2AIZkp61XQENc8cBBe+7ESKo=' >> .env",
    "echo 'APP_ENV=production' >> .env",
    "echo 'APP_DEBUG=false' >> .env",
    "php artisan config:cache"
]

[start]
cmd = "php artisan serve --host=0.0.0.0 --port=$PORT"
```

### Procfile
```
web: php artisan serve --host=0.0.0.0 --port=$PORT
```

## 2. Environment Variables (Optional)
Set in Railway Dashboard if needed:
```bash
APP_NAME="HME Poliban"
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:KhUmI9k//WiT6BW5g4p2AIZkp61XQENc8cBBe+7ESKo=
```

## 3. Deploy Steps

1. **Push changes to GitHub**
   ```bash
   git add .
   git commit -m "Fix Railway deployment configuration"
   git push origin main
   ```

2. **Railway will auto-deploy** from GitHub
3. **Monitor deploy logs** in Railway dashboard
4. **Test health endpoint**: `https://your-app.railway.app/health`

## 4. Troubleshooting

### If Build Still Fails:
1. Try alternative configuration:
   ```bash
   mv nixpacks-alt.toml nixpacks.toml
   git add . && git commit -m "Use alternative nixpacks config" && git push
   ```

2. Check Railway build logs for specific errors

### Expected Deploy Process:
- ✅ **Starting Container**
- ✅ **Setup** (Install PHP 8.2)  
- ✅ **Install** (Composer install)
- ✅ **Build** (Setup .env, cache config)
- ✅ **Start** (Laravel serve)

---
**Status**: Ready for deployment  
**Updated**: September 17, 2025
