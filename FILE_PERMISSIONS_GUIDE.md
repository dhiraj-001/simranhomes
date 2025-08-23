# 📁 File Permissions Guide for Hostinger Subdomain

## 🎯 Quick Setup

### Method 1: Hostinger File Manager (Recommended)
1. **Login to hPanel** → **Files** → **File Manager**
2. **Navigate to**: `public_html/luxuryhomez/`
3. **Right-click** on folders → **Change Permissions**

### Method 2: SSH Commands (If Available)
```bash
# Navigate to subdomain directory
cd public_html/luxuryhomez

# Set permissions via SSH
chmod 755 storage/
chmod 755 bootstrap/cache/
chmod 755 public/uploads/
chmod 644 .env
```

## 📋 Required Permissions

### ✅ **Essential Permissions**

| **Folder/File** | **Permission** | **Method** |
|------------------|------------------|------------|
| **storage/** | **755** | File Manager → Right-click → Permissions |
| **bootstrap/cache/** | **755** | File Manager → Right-click → Permissions |
| **public/uploads/** | **755** | File Manager → Right-click → Permissions |
| **.env** | **644** | File Manager → Right-click → Permissions |
| **public/** | **755** | File Manager → Right-click → Permissions |

### ✅ **Step-by-Step File Manager**

#### **1. Storage Folder**
```
public_html/luxuryhomez/storage/
├── Right-click → Change Permissions
├── Set: 755 (Read/Write/Execute for Owner, Read/Execute for Group/Others)
├── Apply to: This folder and all subfolders
```

#### **2. Bootstrap Cache**
```
public_html/luxuryhomez/bootstrap/cache/
├── Right-click → Change Permissions
├── Set: 755
├── Apply to: This folder and all subfolders
```

#### **3. Uploads Directory**
```
public_html/luxuryhomez/public/uploads/
├── Right-click → Change Permissions
├── Set: 755
├── Apply to: This folder and all subfolders
```

#### **4. Environment File**
```
public_html/luxuryhomez/.env
├── Right-click → Change Permissions
├── Set: 644 (Read/Write for Owner, Read for Group/Others)
```

## 🖥️ **Visual Guide**

### **Hostinger File Manager Steps:**
1. **Login** → **hPanel**
2. **Files** → **File Manager**
3. **Navigate** to `public_html/luxuryhomez/`
4. **Select folder** → **Right-click** → **Change Permissions**
5. **Enter permission number** → **Save**

### **Permission Numbers Explained:**
- **755**: Owner can read/write/execute, others can read/execute
- **644**: Owner can read/write, others can only read
- **777**: Everyone can read/write/execute (NOT recommended)

## 🚨 **Common Issues & Fixes**

### **Issue: "Permission Denied"**
- **Solution**: Set 755 for folders, 644 for files

### **Issue: "Cannot write to storage"**
- **Solution**: Ensure storage/ and all subfolders are 755

### **Issue: "Cannot upload images"**
- **Solution**: Ensure public/uploads/ is 755

## ✅ **Quick Checklist**

- [ ] **storage/** → 755
- [ ] **bootstrap/cache/** → 755
- [ ] **public/uploads/** → 755
- [ ] **.env** → 644
- [ ] **public/** → 755

## 🎯 **One-Command Solution (If SSH Available)**

```bash
# Run this single command to set all permissions
cd public_html/luxuryhomez
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
chmod 755 storage/ bootstrap/cache/ public/uploads/
```

**No technical knowledge needed!** Just use Hostinger's File Manager and follow the visual steps above.
