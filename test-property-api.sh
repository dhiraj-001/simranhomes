#!/bin/bash

# Simple test script for the add property API endpoint
# This script helps test the /admin/property endpoint with curl

echo "Testing Property API Endpoint"
echo "=============================="

# Set your local domain (change this to your actual local domain)
LOCAL_DOMAIN="http://localhost:8000"

# Test if the server is running
echo "Checking if server is running..."
curl -s -o /dev/null -w "%{http_code}" "$LOCAL_DOMAIN/" | grep -q "200"
if [ $? -eq 0 ]; then
    echo "✓ Server is running at $LOCAL_DOMAIN"
else
    echo "✗ Server is not running at $LOCAL_DOMAIN"
    echo "Please start your Laravel server with: php artisan serve"
    exit 1
fi

# Test the endpoint with a simple GET request to check if it exists
echo "Testing endpoint existence..."
RESPONSE=$(curl -s -o /dev/null -w "%{http_code}" -X POST "$LOCAL_DOMAIN/admin/property")
if [ "$RESPONSE" == "302" ] || [ "$RESPONSE" == "200" ]; then
    echo "✓ Endpoint exists (HTTP $RESPONSE)"
else
    echo "✗ Endpoint not found or error (HTTP $RESPONSE)"
    echo "This might be due to:"
    echo "1. Route not defined properly"
    echo "2. Authentication required"
    echo "3. Server configuration issues"
fi

echo ""
echo "To test with Postman:"
echo "1. Open Postman"
echo "2. Create a new POST request to: $LOCAL_DOMAIN/admin/property"
echo "3. Set Content-Type: multipart/form-data"
echo "4. Add required fields as shown in postman-property-testing.md"
echo "5. Send the request"

echo ""
echo "Required test data you'll need:"
echo "- Valid builder_id (check your builders table)"
echo "- Valid amenity IDs (check your amenities table)"
echo "- Sample image files for upload"

echo ""
echo "You can check your database for existing data with:"
echo "php artisan tinker"
echo ">>> App\Models\Builder::all()"
echo ">>> App\Models\Amenity::all()"
