# LuxuryHomez Subdomain Deployment Guide
*Complete step-by-step guide to host your Laravel application on a subdomain*

---

## 🎯 Overview
This guide provides detailed instructions for deploying your LuxuryHomez Laravel application on a subdomain (e.g., `luxuryhomez.yourdomain.com` or `app.yourdomain.com`).

---

## 📋 Prerequisites
- **Hostinger Account** with subdomain access
- **Domain** with DNS control
- **LuxuryHomez Laravel Application** ready for deployment
- **Database** (MySQL) ready for import

---

## 🚀 Step-by-Step Subdomain Deployment

### 1. Subdomain Creation & DNS Setup

#### 1.1 Create Subdomain in Hostinger
1. **Login to Hostinger hPanel**
2. **Navigate to: Domains → Subdomains**
3. **Click "Create Subdomain"**
4. **Enter subdomain details:**
   - **Subdomain**: `luxuryhomez` (for luxuryhomez.yourdomain.com)
   - **Document Root**: `public_html/luxuryhomez` (or leave blank for auto)
   - **Click "Create"**

#### 1.2 DNS Configuration (if needed)
```bash
# Ensure subdomain points to your server
# DNS should automatically configure, but verify:
# luxuryhomez.yourdomain.com → [Your Server IP]
```

### 2. File Structure Setup

#### 2.1 Upload Application
```bash
# Via File Manager or FTP
# Upload to: public_html/luxuryhomez/
# Ensure structure:
public_html/
├── luxuryhomez/
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── .env
│   └── ...
```

#### 2.2 Configure .env for Subdomain
Create `public_html/luxuryhomez/.env`:

```env
APP_NAME=LuxuryHomez
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://luxuryhomez.yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u123456789_luxuryhomez
DB_USERNAME=u123456789_admin
DB_PASSWORD=your_password

# Subdomain specific
APP_URL=https://luxuryhomez.yourdomain.com
```

### 3. Database Setup

#### 3.1 Create Database for Subdomain
```bash
# Same as main domain, but ensure separate database
# Database: u123456789_luxuryhomez_sub
```

#### 3.2 Import Database
```bash
# Via phpMyAdmin
# Import u572822496_newgearadmin.sql to subdomain database
```

### 4. Server Configuration

#### 4.1 .htaccess for Subdomain
Create `public_html/luxuryhomez/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>

# Subdomain specific
RewriteCond %{HTTP_HOST} ^luxuryhomez\.yourdomain\.com$ [NC]
RewriteRule ^(.*)$ public/$1 [L]
```

#### 4.2 PHP Configuration
**hPanel → Advanced → PHP Configuration**
- PHP Version: 8.1 or 8.2
- Extensions: fileinfo, mbstring, openssl, pdo_mysql, etc.

### 5. Subdomain-Specific Configuration

#### 5.1 Environment Variables
```env
# Subdomain specific
APP_URL=https://luxuryhomez.yourdomain.com
APP_ENV=production
APP_DEBUG=false
```

#### 5.2 Database Connection
```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u123456789_luxuryhomez_sub
DB_USERNAME=u123456789_admin
DB_PASSWORD=your_password
```

### 6. Deployment Commands

#### 6.1 Via SSH
```bash
# Connect to subdomain directory
cd public_html/luxuryhomez

# Install dependencies
composer install --optimize-autoloader --no-dev

# Clear and cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Storage link
php artisan storage:link
```

#### 6.2 Via File Manager
1. **Upload files to public_html/luxuryhomez/**
2. **Set permissions:**
   - **storage/** → 755
   - **bootstrap/cache/** → 755
   - **public/uploads/** → 755
   - **.env** → 644

### 7. Testing & Verification

#### 7.1 Test Checklist
- [ ] Subdomain loads correctly
- [ ] Database connection works
- [ ] Images display properly
- [ ] Forms functional
- [ ] Admin panel accessible
- [ ] SSL certificate active

#### 7.2 DNS Verification
```bash
# Verify subdomain points correctly
# luxuryhomez.yourdomain.com → [Your Server IP]
```

### 8. SSL Certificate for Subdomain
**hPanel → Security → SSL**
- Install **Let's Encrypt** SSL for subdomain
- Enable **Force HTTPS redirect**

---

## 🎯 Subdomain-Specific Configuration

### 1. Document Root Structure
```
public_html/
├── luxuryhomez/
│   ├── .env
│   ├── .htaccess
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   └── vendor/
```

### 2. .htaccess Configuration
```apache
# Subdomain specific .htaccess
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTP_HOST} ^luxuryhomez\.yourdomain\.com$ [NC]
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### 3. Environment Variables
```env
# Subdomain specific
APP_URL=https://luxuryhomez.yourdomain.com
APP_ENV=production
APP_DEBUG=false
```

---

## 🔄 Testing & Go-Live

### 1. Pre-Launch Checklist
- [ ] Subdomain created and DNS propagated
- [ ] Files uploaded to subdomain directory
- [ ] Database imported and configured
- [ ] .env file configured for subdomain
- [ ] SSL certificate installed
- [ ] Permissions set correctly

### 2. Go-Live Steps
1. **Test subdomain**: `https://luxuryhomez.yourdomain.com`
2. **Verify database connection**
3. **Test all functionality**
4. **Monitor for 24-48 hours**

---

## 🆘 Troubleshooting

### Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| **Subdomain not loading** | Check DNS propagation, verify subdomain points to correct directory |
| **Database connection failed** | Verify .env credentials, check database permissions |
| **Images not displaying** | Check file permissions, verify storage link |
| **SSL certificate issues** | Ensure SSL is installed for subdomain, force HTTPS redirect |

---

## ✅ Final Checklist

Before going live, ensure:
- [ ] Subdomain created and configured
- [ ] Files uploaded to subdomain directory
- [ ] Database imported and configured
- [ ] .env file configured for subdomain
- [ ] SSL certificate installed
- [ ] Testing completed
- [ ] Monitoring enabled

**Your LuxuryHomez application is now ready for subdomain deployment!**
