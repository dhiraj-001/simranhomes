#!/bin/bash

# Fix Database Import Script for Luxury Homez
# This script handles the "table already exists" error

echo "🛠️  Fixing Database Import Issues..."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Database credentials
DB_NAME="u572822496_newgearadmin"
DB_USER="root"

# Function to check if database exists
check_database() {
    echo -e "${YELLOW}Checking database status...${NC}"
    mysql -u $DB_USER -p -e "SELECT COUNT(*) as table_count FROM information_schema.tables WHERE table_schema = '$DB_NAME';" 2>/dev/null
}

# Function to drop and recreate database
fresh_import() {
    echo -e "${YELLOW}🔄 Dropping and recreating database...${NC}"
    mysql -u $DB_USER -p -e "DROP DATABASE IF EXISTS $DB_NAME; CREATE DATABASE $DB_NAME;"
    
    echo -e "${YELLOW}📊 Importing SQL dump...${NC}"
    mysql -u $DB_USER -p $DB_NAME < u572822496_newgearadmin.sql
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Database imported successfully!${NC}"
    else
        echo -e "${RED}❌ Import failed. Trying alternative methods...${NC}"
        force_import
    fi
}

# Function to force import ignoring errors
force_import() {
    echo -e "${YELLOW}🔧 Force importing with error suppression...${NC}"
    mysql -u $DB_USER -p --force $DB_NAME < u572822496_newgearadmin.sql
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Force import completed!${NC}"
    else
        echo -e "${RED}❌ Force import also failed. Trying manual approach...${NC}"
        manual_import
    fi
}

# Function to manually drop tables and import
manual_import() {
    echo -e "${YELLOW}🗑️  Dropping all existing tables...${NC}"
    
    # Get list of tables to drop
    TABLES=$(mysql -u $DB_USER -p -Nse 'SHOW TABLES' $DB_NAME 2>/dev/null)
    
    if [ -n "$TABLES" ]; then
        echo -e "${YELLOW}Dropping tables: $TABLES${NC}"
        mysql -u $DB_USER -p -e "USE $DB_NAME; SET FOREIGN_KEY_CHECKS = 0; DROP TABLE IF EXISTS $TABLES; SET FOREIGN_KEY_CHECKS = 1;"
    fi
    
    echo -e "${YELLOW}📊 Importing fresh data...${NC}"
    mysql -u $DB_USER -p $DB_NAME < u572822496_newgearadmin.sql
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Manual import completed successfully!${NC}"
    else
        echo -e "${RED}❌ All import methods failed. Please check the SQL file.${NC}"
        exit 1
    fi
}

# Function to check current tables
show_tables() {
    echo -e "${YELLOW}📋 Current tables in database:${NC}"
    mysql -u $DB_USER -p -e "USE $DB_NAME; SHOW TABLES;" 2>/dev/null
}

# Function to verify import
verify_import() {
    echo -e "${YELLOW}🔍 Verifying import...${NC}"
    
    # Check key tables
    TABLES=("properties" "builders" "cities" "blogs" "users" "settings")
    
    for table in "${TABLES[@]}"; do
        COUNT=$(mysql -u $DB_USER -p -Nse "SELECT COUNT(*) FROM $table" $DB_NAME 2>/dev/null)
        if [ $? -eq 0 ]; then
            echo -e "${GREEN}✅ $table: $COUNT records${NC}"
        else
            echo -e "${RED}❌ $table: Not found or empty${NC}"
        fi
    done
}

# Main menu
echo "Select an option:"
echo "1) Fresh import (drop and recreate database)"
echo "2) Force import (ignore existing tables)"
echo "3) Manual drop tables and import"
echo "4) Check current database status"
echo "5) Show current tables"

read -p "Enter your choice (1-5): " choice

case $choice in
    1)
        fresh_import
        verify_import
        ;;
    2)
        force_import
        verify_import
        ;;
    3)
        manual_import
        verify_import
        ;;
    4)
        check_database
        ;;
    5)
        show_tables
        ;;
    *)
        echo -e "${RED}Invalid choice. Exiting.${NC}"
        exit 1
        ;;
esac

echo -e "${GREEN}🎉 Database setup complete!${NC}"
echo -e "${YELLOW}Next steps:${NC}"
echo "1. cd LuxuryHomezroot"
echo "2. cp .env.example .env"
echo "3. Update .env with your database credentials"
echo "4. composer install"
echo "5. php artisan serve"
