<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        // General Info
        'logo',
        'email',
        'contact_number',
        'address',
        'map_embed_code',

        // Social Media
        'social_facebook',
        'social_instagram',
        'social_linkedin',
        'social_twitter',

        // Footer
        'footer_about',
        'footer_disclaimer',
        'copyright',

        // RERA (All states & UTs)
'rera_andhra_pradesh',
'rera_arunachal_pradesh',
'rera_assam',
'rera_bihar',
'rera_chhattisgarh',
'rera_goa',
'rera_gujarat',
'rera_haryana',
'rera_himachal_pradesh',
'rera_jharkhand',
'rera_karnataka',
'rera_kerala',
'rera_madhya_pradesh',
'rera_maharashtra',
'rera_manipur',
'rera_meghalaya',
'rera_mizoram',
'rera_nagaland',
'rera_odisha',
'rera_punjab',
'rera_rajasthan',
'rera_sikkim',
'rera_tamil_nadu',
'rera_telangana',
'rera_tripura',
'rera_uttar_pradesh',
'rera_uttarakhand',
'rera_west_bengal',
'rera_andaman_and_nicobar_islands',
'rera_chandigarh',
'rera_dadra_and_nagar_haveli_and_daman_and_diu',
'rera_delhi',
'rera_jammu_and_kashmir',
'rera_ladakh',
'rera_lakshadweep',
'rera_puducherry',



'locationPFSheading',
'locationPFSparagraph',
'locationPFSsubparagraph',
'pamentiesparagraph',
'ppricelistparagraph',
'pfloorplanparagraph',
'pgalleryparagraph',
'padvantageparagraph',
'pstrip1heading',
'pstrip2heading',
'pstrip1paragraph',
'pstrip2paragraph',
'pfaqheading',


        // Home Sections
        'home_sec1_heading', 'home_sec1_paragraph',
        'home_sec2_heading', 'home_sec2_paragraph',
        'home_sec3_heading',
        'home_sec4_heading', 'home_sec4_paragraph',
        'home_sec5_heading', 'home_sec5_paragraph', 'home_sec5_link',
        'home_sec6_heading', 'home_sec6_paragraph',
        'home_sec7_heading', 'home_sec7_paragraph',
        'home_sec8_heading', 'home_sec8_paragraph',
        'home_sec9_heading', 'home_sec9_paragraph',
        
        //contact us page
        'social_whatsapp',
        'direction_link',
        'contact_page_logo',
        'contact_sec1_heading',
        'contact_sec2_heading',
    ];
    
    
    

   
}
