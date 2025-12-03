<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور</title>
    <style>
        body {
            font-family: "Tajawal", sans-serif;
            background: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            width: 380px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        p {
            margin-bottom: 20px;
            color: #666;
            font-size: 15px;
        }

        .token-box {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            font-size: 18px;
            direction: ltr;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 20px;
            word-break: break-all;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background: #0066ff;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
        }

        .btn:hover {
            background: #004ecc;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>إعادة تعيين كلمة المرور</h2>
        <p>تم إنشاء رمز لإعادة تعيين كلمة المرور. استخدمه لإتمام العملية.</p>

        <!-- هنا يظهر التوكين -->
        <div class="token-box">
            {{ $token }}
        </div>
    </div>

</body>

</html>
