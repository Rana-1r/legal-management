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

    <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl gap-10 md:gap-20">

    <!-- كارد تسجيل الدخول -->
    <div class="bg-white/90 backdrop-blur-sm p-12 rounded-[50px] shadow-2xl w-full max-w-[500px] order-2 md:order-1">
        
        <!-- لوقو -->
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" 
             class="w-40 mx-auto block mb-6" 
             alt="Logo">

        <h2 class="text-xl font-bold text-[#1a1a1a] text-center mb-6">
            منصة الإدارة القانونية
        </h2>

        <!-- الفورم -->
        <form action="/login" method="POST" class="space-y-5 text-right">
            
            @csrf

            <!-- ايميل -->
            <div>
                <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">البريد الإلكتروني</label>
                <input type="email" name="email" placeholder="example123@WadiMakkah.sa" required
                    class="w-full bg-[#eeeeee] border-none rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition">
                    @error('email')
                        <span class="text-red-500 text-xs mr-2">{{ $message }}</span>
                    @enderror
            </div>

            <!-- باسورد -->
            <div>
                <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">كلمة المرور</label>
                <input type="password" name="password" placeholder="********" required
                    class="w-full bg-[#eeeeee] border-none rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition">
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

            <div class="text-center mt-4">
                <span class="text-gray-500 text-sm">ليس لديك حساب؟</span>

                <a href="{{ route('register') }}"
                class="text-blue-500 hover:text-blue-700 font-semibold text-sm mr-1">
                أنشئ حساب
                </a>
            </div>

        </form>
    </div>

    <!-- اليسار -->
    <div class="flex flex-col items-center justify-center text-center flex-1 order-1 md:order-2 mr-20">

        <!-- لوقو كبير -->
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}"
         class="w-[320px] md:w-[380px] mb-16 -mt-32"
         alt="Logo">


        <h1 class="text-4xl md:text-4xl lg:text-4xl font-extrabold text-[#1a1a1a] whitespace-nowrap">
            منصة الإدارة القانونية
        </h1>

         <p class="text-gray-600 mt-4 text-xl">
            يرجى تسجيل الدخول للوصول إلى المنصة
        </p>

    </div>

  </div>
</body>
</html>