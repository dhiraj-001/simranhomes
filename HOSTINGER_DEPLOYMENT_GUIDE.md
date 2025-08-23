# LuxuryHomez Hostinger Deployment Guide
*Complete step-by-step guide to host your Laravel application on Hostinger*

---

## 📋 Table of Contents
1. [Pre-Deployment Checklist](#pre-deployment-checklist)
2. [Hostinger Account Setup](#hostinger-account-setup)
3. [Database Configuration](#database-configuration)
4. [File Upload Process](#file-upload-process)
5. [Environment Configuration](#environment-configuration)
6. [Server Configuration](#server-configuration)
7. [Testing & Go-Live](#testing--go-live)
8. [Post-Deployment](#post-deployment)

---

## 🔍 Pre-Deployment Checklist

### Local Environment Preparation
```bash
# Run these commands in your Laravel root directory
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
composer install --optimize-autoloader --no-dev
```

### Files to Prepare
- [ ] **LuxuryHomezroot/** folder (your Laravel project)
- [ ] **u572822496_newgearadmin.sql** (database dump)
- [ ] **.env** file (will be created on server)

### Remove Development Files
- [ ] Delete `node_modules/` folder
- [ ] Remove `.git/` folder (if exists)
- [ ] Clear `storage/logs/` files
- [ ] Remove `vendor/` (will reinstall on server)

---

## 🏠 Hostinger Account Setup

### 1. Purchase Hosting Plan
- **Plan**: Premium Web Hosting or Business Web Hosting
- **Requirements**: 
  - PHP 8.1+ support
  - MySQL 5.7+
  - SSH access
  - Free SSL certificate
- **Estimated Cost**: $2.99-11.99/month

### 2. Domain Configuration
- Register domain: `luxuryhomez.com` (or your preferred domain)
- Point nameservers to Hostinger:
  - `ns1.dns-parking.com`
  - `ns2.dns-parking.com`

### 3. Access hPanel
- Login to your Hostinger account
- Navigate to **hPanel** (hosting control panel)

---

## 🗄️ Database Configuration

### 1. Create MySQL Database
```bash
# Navigate to: hPanel → Databases → MySQL Databases
# Create database with these details:
Database Name: u123456789_luxuryhomez
Username: u123456789_admin
Password: [Generate strong password]
Host: localhost
```

### 2. Import Database
1. **hPanel → Databases → phpMyAdmin**
2. Select your database
3. Click **Import** tab
4. Upload `u572822496_newgearadmin.sql`
5. Click **Go** to import

---

## 📁 File Upload Process

### Method 1: File Manager (Recommended)
1. **hPanel → Files → File Manager**
2. Navigate to **public_html** folder
3. Delete default files (index.html, etc.)
4. Upload your **LuxuryHomezroot.zip** file
5. Extract the ZIP file
6. Move all contents from **LuxuryHomezroot/** to **public_html/**

### Method 2: FTP Upload
```bash
# FTP Connection Details
Host: yourdomain.com or server IP
Username: your_ftp_username
Password: your_ftp_password
Port: 21
Upload to: /public_html/
```

### File Permissions Setup
```bash
# Set these permissions via File Manager
chmod 755 storage/
chmod 755 bootstrap/cache/
chmod 755 public/uploads/
chmod 644 .env
```

---

## ⚙️ Environment Configuration

### 1. Create .env File
Create `public_html/.env` with:

```env
APP_NAME=LuxuryHomez
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u123456789_luxuryhomez
DB_USERNAME=u123456789_admin
DB_PASSWORD=your_database_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
```

### 2. Generate Application Key
```bash
# Via SSH Terminal
cd public_html
php artisan key:generate
```

---

## 🔧 Server Configuration

### 1. PHP Configuration
**hPanel → Advanced → PHP Configuration**
- PHP Version: **8.1 or 8.2**
- Enable Extensions:
  - fileinfo
  - mbstring
  - openssl
  - pdo_mysql
  - tokenizer
  - xml
  - ctype
  - json
  - bcmath

### 2. Create .htaccess
Create `public_html/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/ $1 [L]
</IfModule>

# Security Headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options DENY
    Header always set X-XSS-Protection "1; mode=block"
</IfModule>

# Compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/css text/js text/javascript application/javascript
</IfModule>
```

### 3. Cron Jobs
**hPanel → Advanced → Cron Jobs**
```bash
# Add cron job
Command: php /home/u123456789/public_html/artisan schedule:run
Frequency: Every minute (* * * * *)
```

---

## 🧪 Testing & Go-Live

### Pre-Launch Testing Checklist
- [ ] Homepage loads correctly
- [ ] Database connection works
- [ ] Images display properly
- [ ] Contact forms functional
- [ ] Admin panel accessible
- [ ] SSL certificate active (green lock)
- [ ] 404 page working
- [ ] Search functionality tested

### SSL Certificate Installation
1. **hPanel → Security → SSL**
2. Install **Let's Encrypt** SSL (free)
3. Enable **Force HTTPS redirect**

---

## 🚀 Post-Deployment

### 1. Performance Optimization
```bash
# Run these commands via SSH
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

### 2. Cloudflare CDN (Optional)
1. Sign up at cloudflare.com
2. Add your domain
3. Update nameservers
4. Enable "Always Use HTTPS"

### 3. Backup Setup
- **hPanel → Files → Backups**
- Enable daily automatic backups
- Download manual backup monthly

---

## 📊 Troubleshooting Guide

### Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| **500 Internal Server Error** | Check file permissions, enable PHP extensions |
| **No application encryption key** | Run `php artisan key:generate` |
| **Database connection failed** | Verify .env credentials |
| **Images not loading** | Check storage permissions and links |
| **CSS/JS not loading** | Verify public folder permissions |

### Debug Mode
```env
# For debugging (temporary)
APP_DEBUG=true
```

---

## 📈 Maintenance Schedule

### Weekly Tasks
- [ ] Check error logs in `storage/logs/`
- [ ] Monitor disk usage
- [ ] Review security updates

### Monthly Tasks
- [ ] Update Laravel and dependencies
- [ ] Optimize database
- [ ] Review backup integrity

### Quarterly Tasks
- [ ] Security audit
- [ ] Performance review
- [ ] Update documentation

---

## 💰 Cost Breakdown

| Item | Cost | Frequency |
|------|------|-----------|
| Hostinger Premium Plan | $2.99-11.99/month | Monthly |
| Domain Registration | $10-15/year | Yearly |
| SSL Certificate | Free | Lifetime |
| **Total First Year** | ~$50-100 | - |

---

## 🆘 Support Resources

- **Hostinger Support**: 24/7 live chat
- **Laravel Docs**: https://laravel.com/docs
- **Hostinger Knowledge Base**: https://support.hostinger.com

---

## ✅ Final Verification

Before going live, ensure:
- [ ] All steps completed
- [ ] Testing passed
- [ ] SSL active
- [ ] Backups configured
- [ ] Monitoring enabled

**Your LuxuryHomez application is now ready for production!**
