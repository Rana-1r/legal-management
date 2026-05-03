<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>طلب استشارة قانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f5f7fb]">

<!-- ================= NAVBAR ================= -->
<!-- NAVBAR -->
<header class="bg-wadimakkah-dark text-white shadow-lg">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <div class="px-16 py-6 flex items-center justify-between">

        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('user-interface') }}">الرئيسية</a>
            <a href="#">القضايا</a>
            <a href="#">العقود</a>
            <a href="{{ route('consultations.user') }}">الاستشارات</a>
            <a href="#">المستندات والتقارير</a>
             <a href="#" class="hover:text-wadimakkah-light transition">
                    اللغة العربية
                    <i class="fas fa-globe text-wadimakkah-light"></i>
                </a>
        </div>

        <div class="flex items-center gap-6">
            <i class="fas fa-user-circle text-2xl"></i>
            <i class="fas fa-bell text-xl"></i>
            <i class="fas fa-cog text-xl"></i>
        </div>

    </div>
</header>

<!-- ================= HEADER ================= -->
<div class="text-center mt-10">
    <h2 class="text-2xl font-bold text-gray-800">
        إدارة الاستشارات القانونية
    </h2>
</div>

<!-- ================= FORM CARD ================= -->
<div class="flex justify-center mt-10 px-4">

    <div class="bg-white w-full max-w-xl rounded-2xl shadow-md border border-gray-200 p-6">

        <h3 class="text-lg font-bold mb-6">
            طلب استشارة قانونية
        </h3>

        <form class="space-y-4">

            <input type="text"
                   placeholder="اسم المستفيد"
                   class="w-full bg-gray-100 rounded-lg px-4 py-2 text-sm outline-none"/>

            <input type="text"
                   placeholder="عنوان الاستشارة"
                   class="w-full bg-gray-100 rounded-lg px-4 py-2 text-sm outline-none"/>

            <textarea rows="4"
                      placeholder="وصف الاستشارة"
                      class="w-full bg-gray-100 rounded-lg px-4 py-2 text-sm outline-none"></textarea>

            <div class="text-left">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-md text-sm hover:bg-blue-700">
                    إرسال الطلب
                </button>
            </div>

        </form>

    </div>

</div>
<!-- Tailwind  -->
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

 <!--  Footer -->
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
<html>