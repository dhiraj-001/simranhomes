# Postman Testing Guide for Add Property Route

## Endpoint Details
- **Method**: POST
- **URL**: `http://your-local-domain/admin/property`
- **Content-Type**: `multipart/form-data`

## Required Fields

### Basic Information
- `heading` (string) - Property title
- `builder_id` (integer) - ID from builders table
- `property_type` (string) - e.g., "residential", "commercial", "new-launch"
- `property_sub_type` (integer) - ID from property_sub_types table
- `property_status` (string) - e.g., "ready-to-move", "under-construction"
- `unit_size` (string) - e.g., "1000 sq ft"
- `configuration` (string) - e.g., "2 BHK", "3 BHK"
- `price` (string/numeric) - Property price
- `location` (string) - Property address
- `property_city_wise` (string) - City name

### File Uploads (Required)
- `main_image` (file) - Main property image (jpeg, png, jpg, gif, svg, max 2MB)
- Optional files: `banner_image`, `highlights_img`, `about_image`, `brochure`

### Arrays (Required)

#### Amenities
```json
amenities[]: 1
amenities[]: 2
amenities[]: 3
```

#### Floor Plans
```json
floor_plans[0][name]: "2 BHK Floor Plan"
floor_plans[0][size]: "1000 sq ft"
floor_plans[0][type]: "2 BHK"
floor_plans[0][image]: (file upload)
```

#### Galleries
```json
galleries[0][name]: "Living Room"
galleries[0][image]: (file upload)
galleries[1][name]: "Bedroom"
galleries[1][image]: (file upload)
```

#### Location Advantages
```json
location_advantage[0][name]: "Metro Station"
location_advantage[0][distance]: "500 m"
location_advantage[0][type]: "transport"
location_advantage[1][name]: "Shopping Mall"
location_advantage[1][distance]: "1 km"
location_advantage[1][type]: "shopping"
```

### Optional Fields
- `highlights_heading`, `highlights_content`
- `about_heading`, `about_content`
- `direction_link`, `map`
- `meta_title`, `meta_keywords`, `meta_description`
- `schema_seo`
- `status` (checkbox, 1 for active)
- `is_trending_project` (checkbox)
- `is_featured` (checkbox)

## Sample Postman Setup

### Headers
```
Content-Type: multipart/form-data
```

### Body (form-data)
| Key | Value | Type |
|-----|-------|------|
| heading | Luxury Apartment in Downtown | text |
| builder_id | 1 | text |
| property_type | residential | text |
| property_sub_type | 1 | text |
| property_status | ready-to-move | text |
| unit_size | 1200 sq ft | text |
| configuration | 3 BHK | text |
| price | 7500000 | text |
| location | 123 Main Street, Downtown | text |
| property_city_wise | Mumbai | text |
| main_image | (select file) | file |
| amenities[] | 1 | text |
| amenities[] | 2 | text |
| floor_plans[0][name] | 3 BHK Floor Plan | text |
| floor_plans[0][size] | 1200 sq ft | text |
| floor_plans[0][type] | 3 BHK | text |
| floor_plans[0][image] | (select file) | file |
| galleries[0][name] | Living Room | text |
| galleries[0][image] | (select file) | file |
| location_advantage[0][name] | Metro Station | text |
| location_advantage[0][distance] | 500 m | text |
| location_advantage[0][type] | transport | text |

## Expected Response
- Status: 302 Redirect (to properties index page)
- Success message: "Property added successfully!"

## Common Issues

1. **File Upload Errors**: Ensure files are within size limits and correct formats
2. **Array Format**: Use proper bracket notation for arrays
3. **Database References**: Ensure builder_id and amenities exist in database
4. **Authentication**: If you get redirected to login, the route might need authentication

## Testing Steps

1. **Start Local Server**: Ensure your Laravel application is running
2. **Setup Postman**: Create new POST request with the above configuration
3. **Test Validation**: Try submitting without required fields to see validation errors
4. **Test Success**: Submit with all required fields
5. **Verify Database**: Check if property was created in database

## Security Note
The route is not protected by authentication middleware. Consider adding authentication for production use.
