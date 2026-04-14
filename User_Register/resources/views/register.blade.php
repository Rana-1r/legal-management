<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل جديد</title>
    @vite(['resources/css/style.css'])
</head>
<body>

    <div class="right-section">
        <div class="register-card">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="small-logo">
            <h2>منصة الإدارة القانونية</h2>
            
            <form action="{{ url('/') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label>الإسم الكامل</label>
                    <input type="text" name="full_name" placeholder="الإسم الكامل">
                </div>
                <div class="input-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="email" placeholder="example123@wadimakkah.sa">
                </div>
                <div class="input-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" placeholder="············">
                </div>
                <div class="input-group">
                    <label>تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" placeholder="············">
                </div>
                <button type="submit" class="btn-register">إنشاء الحساب</button>
            </form>
        </div>
    </div>

    <div class="left-section">
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="large-logo">
        <h1 class="big-text">منصة الإدارة القانونية</h1>
    </div>

</body>
</html>