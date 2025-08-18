<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Enquiry - Luxury Homez</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="text-align: center;">
                            <h2 style="color: #2c3e50; margin-bottom: 5px;">New Enquiry Received</h2>
                            <p style="color: #7f8c8d; font-size: 14px;">Luxury Homez</p>
                            <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">
                        </td>
                    </tr>

                    @if($enquiry->type === 'general')
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Name:</strong> {{ $enquiry->name }}
                        </td>
                    </tr>
                    @elseif($enquiry->type === 'contact')
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Name:</strong> {{ $enquiry->name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Budget Range:</strong> {{ $enquiry->budget_range }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Message:</strong><br>
                            <div style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; color: #333;">
                                {{ $enquiry->message }}
                            </div>
                        </td>
                    </tr>
                    
                    
                    
                    @elseif($enquiry->type === 'property')
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Name:</strong> {{ $enquiry->name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Property Name:</strong> {{ $enquiry->property_name }}
                        </td>
                    </tr>
                    
                    
                    
                    
                    
                    @elseif($enquiry->type === 'blog')
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Name:</strong> {{ $enquiry->name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Message:</strong><br>
                            <div style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; color: #333;">
                                {{ $enquiry->message }}
                            </div>
                        </td>
                    </tr>
                    
                    
                    
                    
                    
                    @endif

                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Type:</strong> {{ ucfirst($enquiry->type) }} Enquiry
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Email:</strong> {{ $enquiry->email }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0;">
                            <strong>Mobile:</strong> {{ $enquiry->countryCode }} {{ $enquiry->mobile }}
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: center; padding-top: 30px;">
                            <p style="font-size: 13px; color: #aaa;">This message was generated www.luxuryhomez.com.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
