<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل جديد - منصة الإدارة القانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- خط -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .custom-bg {
            background: linear-gradient(180deg, #f4fbff 0%, #d9f1ff 50%, #9ed9f3 100%);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-8 custom-bg">

    <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl gap-10 md:gap-20">

        <!-- كارد التسجيل -->
        <div class="bg-white/90 backdrop-blur-sm p-6 md:p-8 rounded-[40px] shadow-2xl w-full max-w-[380px] md:max-w-[500px]">

            <!-- اللوقو -->
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}"
                 class="w-40 mx-auto block mb-6"
                 alt="Logo">

            <h2 class="text-xl font-bold text-[#1a1a1a] text-center mb-6">
                منصة الإدارة القانونية
            </h2>

            <form action="{{ url('/') }}" method="POST" class="space-y-3 text-right">
                @csrf

                <!-- الاسم الكامل -->
                <div>
                    <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">الاسم الكامل</label>
                    <input
                        type="text"
                        name="full_name"
                        placeholder="الاسم الكامل"
                        required
                        class="w-full bg-[#eeeeee] rounded-xl py-2 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition @error('full_name') border-2 border-red-500 @enderror"
                    >
                    @error('full_name')
                        <span class="text-red-500 text-xs mr-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- البريد الإلكتروني -->
                <div>
                    <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">البريد الإلكتروني</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="example123@wadimakkah.sa"
                        required
                        class="w-full bg-[#eeeeee] rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition @error('email') border-2 border-red-500 @enderror"
                    >
                    @error('email')
                        <span class="text-red-500 text-xs mr-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- كلمة المرور -->
                <div>
                    <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">كلمة المرور</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="********"
                        required
                        class="w-full bg-[#eeeeee] rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition @error('password') border-2 border-red-500 @enderror"
                    >
                    @error('password')
                        <span class="text-red-500 text-xs mr-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- تأكيد كلمة المرور -->
                <div>
                    <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">تأكيد كلمة المرور</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="********"
                        required
                        class="w-full bg-[#eeeeee] rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-blue-400 transition"
                    >
                </div>

                <div>
    <!-- اللابل -->
    <label class="text-[#8e8e8e] text-xs mb-1 block mr-2">
        الدور الوظيفي
    </label>

    <!-- الدروب داون -->
    <div class="relative">
        <select name="role_id"
        class="w-full bg-[#eeeeee] rounded-xl py-3 px-4 text-sm outline-none appearance-none focus:ring-2 focus:ring-blue-400 transition">

            <option value="1">موظف قانوني</option>
            <option value="2">مدير نظام</option>
            <option value="3">مدير الإدارة القانونية</option>
            <option value="4">موظف إدارات داخلية</option>
            <option value="5">الإدارة العليا</option>

        </select>

        <!-- السهم -->
        <div class="pointer-events-none absolute inset-y-0 left-3 flex items-center">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </div>
</div>

                <!-- زر إنشاء الحساب -->
                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full bg-[#4c5df4] hover:bg-[#3c4dd4] text-white font-bold py-4 rounded-xl text-md transition-all shadow-lg active:scale-95"
                    >
                        إنشاء الحساب
                    </button>
                </div>
            </form>
        </div>

        <!-- القسم الجانبي -->
        <div class="flex flex-col items-center justify-center text-center flex-1 order-1 md:order-2 mr-20">

    <!-- اللوقو -->
    <img src="{{ asset('images/Wadi Makkah Logo.png') }}"
         class="w-[320px] md:w-[380px] mb-16 -mt-32"
         alt="Logo">

    <!-- العنوان -->
    <h1 class="text-4xl md:text-4xl lg:text-4xl font-extrabold text-[#1a1a1a] whitespace-nowrap">
    منصة الإدارة القانونية
    </h1>
       
    <!-- الوصف -->
    <p class="text-gray-600 mt-4 text-xl">
        يرجى إنشاء حساب جديد للوصول إلى المنصة
    </p>

      </div>
    </div>

</body>
</html>