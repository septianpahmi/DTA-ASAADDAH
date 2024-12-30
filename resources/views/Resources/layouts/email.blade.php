<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Pengingat Pembayaran</h1>
        </div>
        <div class="content">
            <p>Halo {{ $nama }},</p>
            <p>Tagihan Anda sebesar <strong>Rp {{ $nominal }}</strong> akan jatuh tempo pada
                tanggal <strong>{{ $tanggal_tagihan }}</strong>.</p>
            <p>Mohon segera lakukan pembayaran.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} DTA ASSA'ADAH. Semua hak dilindungi.</p>
        </div>
    </div>
</body>

</html>
