<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ $clinicName }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 300;
        }
        .content {
            padding: 40px 30px;
        }
        .welcome-message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .provider-info {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 5px 5px 0;
        }
        .provider-info h3 {
            margin-top: 0;
            color: #667eea;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 120px;
            color: #555;
        }
        .info-value {
            flex: 1;
            color: #333;
        }
        .next-steps {
            background-color: #e8f5e8;
            border: 1px solid #4caf50;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
        }
        .next-steps h3 {
            margin-top: 0;
            color: #4caf50;
        }
        .next-steps ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        .next-steps li {
            margin-bottom: 8px;
        }
        .contact-info {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
        }
        .contact-info h3 {
            margin-top: 0;
            color: #856404;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
        .footer a {
            color: #667eea;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .content {
                padding: 20px 15px;
            }
            .header {
                padding: 20px 15px;
            }
            .info-row {
                flex-direction: column;
            }
            .info-label {
                width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">🦷 {{ $clinicName }}</div>
            <h1>Welcome to Our Team!</h1>
        </div>
        
        <div class="content">
            <div class="welcome-message">
                Dear <strong>{{ $provider->ProviderName }}</strong>,
            </div>
            
            <p>We are thrilled to welcome you to our dental clinic family! Your expertise and dedication will be a valuable addition to our team, and we're excited to work together to provide exceptional dental care to our patients.</p>
            
            <div class="provider-info">
                <h3>Your Provider Information</h3>
                <div class="info-row">
                    <div class="info-label">Name:</div>
                    <div class="info-value">{{ $provider->ProviderName }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $provider->Email }}</div>
                </div>
                @if($provider->PhoneNumber)
                <div class="info-row">
                    <div class="info-label">Phone:</div>
                    <div class="info-value">{{ $provider->PhoneNumber }}</div>
                </div>
                @endif
                @if($provider->Location)
                <div class="info-row">
                    <div class="info-label">Location:</div>
                    <div class="info-value">{{ $provider->Location }}</div>
                </div>
                @endif
                @if($provider->Experience)
                <div class="info-row">
                    <div class="info-label">Experience:</div>
                    <div class="info-value">{{ $provider->Experience }}</div>
                </div>
                @endif
                @if($provider->RegistrationNumber)
                <div class="info-row">
                    <div class="info-label">Registration:</div>
                    <div class="info-value">{{ $provider->RegistrationNumber }}</div>
                </div>
                @endif
            </div>
            
            <div class="next-steps">
                <h3>What's Next?</h3>
                <ul>
                    <li>You will receive your login credentials via a separate email</li>
                    <li>Complete your profile setup in our system</li>
                    <li>Attend our orientation session (details will be shared separately)</li>
                    <li>Review our clinic policies and procedures</li>
                    <li>Meet with our team lead for your first week schedule</li>
                </ul>
            </div>
            
            <div class="contact-info">
                <h3>Need Help?</h3>
                <p>If you have any questions or need assistance, please don't hesitate to reach out to our HR department or your team lead. We're here to support you every step of the way.</p>
            </div>
            
            <p>Once again, welcome to our team! We look forward to achieving great things together.</p>
            
            <p>Best regards,<br>
            <strong>The {{ $clinicName }} Team</strong></p>
        </div>
        
        <div class="footer">
            <p>This email was sent from {{ $clinicName }}. If you have any questions, please contact our support team.</p>
            <p>&copy; {{ date('Y') }} {{ $clinicName }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
