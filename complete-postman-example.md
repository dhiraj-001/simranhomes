# Complete Postman Example for Add Property

## Request Details
- **Method**: POST
- **URL**: `http://localhost:8000/admin/property` (adjust to your local domain)
- **Headers**: 
  - `Content-Type: multipart/form-data`

## Form Data to Send

### Basic Text Fields (Key - Value)
```
heading: Luxury 3 BHK Apartment in Mumbai
builder_id: 1
property_type: residential
property_sub_type: 1
property_status: ready-to-move
unit_size: 1200 sq ft
configuration: 3 BHK
price: 7500000
location: 123 Main Street, Bandra West, Mumbai
property_city_wise: Mumbai
highlights_heading: Premium Features
highlights_content: Spacious rooms, modern amenities, great location
about_heading: About This Property
about_content: Beautiful 3 BHK apartment with stunning views
direction_link: https://maps.google.com/?q=19.0760,72.8777
map: <iframe src="https://www.google.com/maps/embed?..."></iframe>
meta_title: Luxury 3 BHK Apartment in Mumbai | Premium Property
meta_keywords: luxury apartment, mumbai, 3 bhk, bandra
meta_description: Premium 3 BHK luxury apartment in Bandra West, Mumbai with modern amenities and great connectivity.
schema_seo: {"@context":"https://schema.org","@type":"Residence"...}
status: 1
is_trending_project: 1
is_featured: 1
```

### Array Fields (Multiple entries with same key)
```
amenities[]: 1
amenities[]: 2
amenities[]: 3
amenities[]: 4
```

### Nested Array Fields (Floor Plans)
```
floor_plans[0][name]: 3 BHK Floor Plan A
floor_plans[0][size]: 1200 sq ft
floor_plans[0][type]: 3 BHK
floor_plans[1][name]: 3 BHK Floor Plan B
floor_plans[1][size]: 1250 sq ft
floor_plans[1][type]: 3 BHK
```

### Nested Array Fields (Galleries)
```
galleries[0][name]: Living Room
galleries[1][name]: Master Bedroom
galleries[2][name]: Kitchen
galleries[3][name]: Balcony View
```

### Nested Array Fields (Location Advantages)
```
location_advantage[0][name]: Bandra Railway Station
location_advantage[0][distance]: 1.2 km
location_advantage[0][type]: transport
location_advantage[1][name]: Linking Road Shopping
location_advantage[1][distance]: 800 m
location_advantage[1][type]: shopping
location_advantage[2][name]: Lilavati Hospital
location_advantage[2][distance]: 2.5 km
location_advantage[2][type]: healthcare
```

### File Uploads (Select files for these keys)
```
main_image: (select a JPEG/PNG image file)
banner_image: (optional - select a JPEG/PNG image file)
highlights_img: (optional - select a JPEG/PNG image file)
about_image: (optional - select a JPEG/PNG image file)
brochure: (optional - select PDF or image file)
floor_plans[0][image]: (select floor plan image)
floor_plans[1][image]: (select floor plan image)
galleries[0][image]: (select living room image)
galleries[1][image]: (select bedroom image)
galleries[2][image]: (select kitchen image)
galleries[3][image]: (select balcony image)
```

## Postman Setup Screenshot Guide

1. **Create New Request**: 
   - Method: POST
   - URL: `http://localhost:8000/admin/property`

2. **Headers Tab**:
   - Key: `Content-Type`
   - Value: `multipart/form-data`

3. **Body Tab**:
   - Select `form-data`
   - Add all the key-value pairs above
   - For file fields, change type from "text" to "file" and select your files

4. **Send the Request**

## Expected Response

If successful:
- Status: 302 Found (redirect)
- Location header will point to properties index
- Success message in session

If validation fails:
- Status: 302 Found (redirect back with errors)
- Validation errors in session

## Troubleshooting

1. **If you get authentication errors**: The route might require login. Check if you need to:
   - Add authentication headers
   - Use session cookies from a logged-in user
   - Modify the route to remove auth requirement temporarily

2. **If files won't upload**: 
   - Ensure files are under 2MB for images, 5MB for brochure
   - Use correct file types (jpeg, png, jpg, gif, svg, pdf)

3. **If arrays don't work**: 
   - Use exact bracket notation as shown
   - Ensure array indices are sequential (0, 1, 2...)

## Quick Test with Minimal Data

If you want to test with minimal data first:

```
heading: Test Property
builder_id: 1
property_type: residential
property_sub_type: 1
property_status: ready-to-move
unit_size: 1000 sq ft
configuration: 2 BHK
price: 5000000
location: Test Location
property_city_wise: Test City
amenities[]: 1
main_image: (select small test image)
```

Start with this minimal set and gradually add more fields.
