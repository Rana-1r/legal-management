<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة الإدارة القانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- خط -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Cairo', sans-serif; }

        .custom-bg { 
            background: linear-gradient(180deg, #f4fbff 0%, #d9f1ff 50%, #9ed9f3 100%);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-8 custom-bg">

<div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl gap-25 md:gap-45">

    <!-- كارد تسجيل الدخول -->
    <div class="bg-white/90 backdrop-blur-sm p-12 rounded-[50px] shadow-2xl w-full max-w-[500px] order-2 md:order-1">
        
        <!-- لوقو -->
        <img src="{{ asset('images/Wadi%20Makkah%20Logo.png') }}" 
             class="w-40 mx-auto block mb-6" 
             alt="Logo">

        <h2 class="text-xl font-bold text-[#5c5c5c] text-center mb-4">
            منصة الإدارة القانونية
        </h2>

        <!-- رسالة خطأ -->
        @if(session('error'))
            <div class="mb-4 text-red-500 text-xs text-center bg-red-50 p-2 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- الفورم -->
        <form action="/login" method="POST" class="space-y-5 text-right">
            
            @csrf

            <!-- ايميل -->
            <div>
                <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">البريد الإلكتروني</label>
                <input type="email" name="email" placeholder="example@WadiMakkah.sa" required
                    class="w-full bg-[#eeeeee] border-none rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition @error('email') border-2 border-red-500 @enderror">
                    @error('email')
                    <span class="text-red-500 text-xs mr-2">{{ $message }}</span>
                    @enderror
            </div>

            <!-- باسورد -->
            <div>
                <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">كلمة المرور</label>
                <input type="password" name="password" placeholder="********" required
                    class="w-full bg-[#eeeeee] border-none rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition @error('password') border-2 border-red-500 @enderror">
                     @error('password')
                     <span class="text-red-500 text-xs mr-2">{{ $message }}</span>
                     @enderror
            </div>

            <!-- زر -->
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-[#4c5df4] hover:bg-[#3c4dd4] text-white font-bold py-4 rounded-xl text-md transition-all shadow-lg active:scale-95">
                    تسجيل الدخول
                </button>
            </div>

        </form>
    </div>

    <!-- اليسار -->
    <div class="flex flex-col items-end justify-start text-center flex-1 order-2 md:order-2">
        
        <!-- لوقو كبير -->
        <img src="{{ asset('images/Wadi%20Makkah%20Logo.png') }}" class="w-80 mb-20">

        <h1 class="text-4xl font-extrabold text-[#1a1a1a] leading-relaxed">
            منصة الإدارة القانونية
        </h1>

        <p class="text-gray-600 mt-2 text-lg">
            يرجى تسجيل الدخول للوصول إلى حسابك
        </p>

    </div>

</div>

</body>
</html>