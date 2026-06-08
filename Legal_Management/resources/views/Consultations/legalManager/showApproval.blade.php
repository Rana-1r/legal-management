<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة الاستشارات القانونية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f9fafb; }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: { 
                    colors: {
                        'wadimakkah-dark': '#1e3a8a',
                        'wadimakkah-light': '#60a5fa',
                        'wadimakkah-bg': '#f9fafb',
                    }
                }
            }
        }
    </script>
</head>

<body class= min-h-screen flex flex-col>

<header class="bg-wadimakkah-dark text-white shadow-lg">
    <div class="text-white px-16 py-6 flex items-center justify-between">
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">
        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('manager.interface') }}" class="hover:text-wadimakkah-light transition">الرئيسية</a>
            <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
            <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
            <a href="{{ route('legal.manager') }}" class="hover:text-wadimakkah-light transition">الاستشارات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>
        <div class="flex items-center gap-6">
            <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
        </div>
    </div>
</header>

<main class="container mx-auto px-6 py-10 flex-grow">
    <div class="mt-10 text-center">
       <h1 class="text-3xl font-bold text-gray-800">منصة الإدارة القانونية</h1>
       <p class="text-gray-500 mt-2 mb-8">المنصة الموحدة للإدارة القانونية بشركة وادي مكة</p>
    </div>

    <h2 class="text-xl font-bold mb-8 mt-12">اعتماد أو رفض الاستشارة</h2>
    <div class="bg-[#ececec] rounded-3xl border border-gray-300 shadow-sm p-10">
        <div class="flex gap-2 text-sm mb-4"><span class="font-bold">رقم الطلب :</span> <span class="bg-gray-100 px-4 py-1 rounded-md text-wadimakkah-dark">{{ $consultation->consultation_id }}</span></div>
        <div class="flex gap-2 text-sm mb-4"><span class="font-bold">نوع الإستشارة :</span> <span class="bg-gray-100 px-4 py-1 rounded-md text-wadimakkah-dark">{{ $consultation->consulation_type }}</span></div>
        <div class="flex gap-2 text-sm mb-4"><span class="font-bold">تاريخ الطلب :</span> <span class="bg-gray-100 px-4 py-1 rounded-md text-wadimakkah-dark">{{ $consultation->created_at->format('d/m/Y') }}</span></div>
        <div class="flex gap-2 text-sm mb-4">
            <span class="font-bold">الأولوية :</span>
            @if(isset($consultation->priority) && $consultation->priority)
            <span class="bg-gray-100 px-4 py-1 rounded-md text-wadimakkah-dark">
                <i class="fas fa-circle text-[8px] {{ $consultation->priority == 'عالي' ? 'text-red-500' : 'text-blue-400' }}"></i>
                {{ $consultation->priority }}
            </span>
            @else
                <span class="text-gray-400 italic text-xs">لم تحدد بعد</span>
            @endif   
        </div>
        <div class="flex gap-2 text-sm mb-4"><span class="font-bold">اسم المحامي :</span> <span class="bg-gray-100 px-4 py-1 rounded-md text-wadimakkah-dark">{{ $consultation->assignedTo->full_name }}</span></div>
        <div>
            <label class="block font-bold mb-2 text-sm">نص الإستشارة</label>
            <div class="w-full bg-gray-50 border border-gray-200 p-4 rounded-xl text-sm text-wadimakkah-dark min-h-[80px] mb-4">
                 هنا يظهر نص الاستشارة المقدمة...
            </div>
        </div>
        <div>
            <label class="block font-bold mb-2 text-sm">الرد القانوني</label>
            <div class="w-full bg-gray-50 border border-gray-200 p-4 rounded-xl text-sm text-wadimakkah-dark min-h-[80px]">
                هنا يظهر نص الرد القانوني المكتوب بواسطة المحامي والمطلوب اعتماده...
            </div>
        </div>
        <div class="flex gap-4 pt-6">
            <form action="{{ route('consultations.approve', $consultation->consultation_id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-wadimakkah-dark hover:bg-blue-800 text-white px-8 py-2 rounded-md font-semibold text-sm transition shadow-sm">اعتماد</button>
            </form>

            <form action="{{ route('consultations.reject', $consultation->consultation_id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-gray-400 hover:bg-gray-500 text-white px-8 py-2 rounded-md font-semibold text-sm transition shadow-sm">رفض</button>
            </form>

            <a href="{{ route('legal.manager') }}" class="bg-white hover:bg-gray-100 text-gray-500 px-8 py-1 rounded-md font-semibold transition shadow-sm">
                رجوع
            </a>
        </div>
    </div>
</main>

<footer class="bg-wadimakkah-dark text-white py-12 mt-16 border-t border-gray-700">
    <div class="container mx-auto px-6 grid grid-cols-4 gap-10 text-sm">
        <div>
            <h5 class="font-bold mb-4">روابط مهمة</h5>
            <ul class="space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-wadimakkah-light transition">سياسة الخصوصية</a></li>
                <li><a href="#" class="hover:text-wadimakkah-light transition">الشروط والأحكام</a></li>
            </ul>
        </div>

        <div>
            <h5 class="font-bold mb-4">المساعدة والدعم</h5>
            <ul class="space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-wadimakkah-light transition">الدعم الفني</a></li>
                <li><a href="#" class="hover:text-wadimakkah-light transition">تواصل معنا</a></li>
            </ul>
        </div>

        <div>
            <h5 class="font-bold mb-4">وسائل التواصل الاجتماعي</h5>
            <div class="flex gap-4 text-2xl text-gray-300">
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-youtube"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-facebook"></i></a>
            </div>
        </div>

        <div class="flex flex-col items-center text-center px-6 -mt-4">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" alt="Wadi Makkah Logo" class="h-20 mb-4 opacity-80">
            <p class="text-xs text-gray-400">شركة وادي مكة للتقنية</p>
            <p class="text-xs text-gray-400">جميع الحقوق محفوظة @ 2026</p>
        </div>
    </div>
</footer>
</body>
</html>