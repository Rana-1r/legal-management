<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>منصة الإدارة القانونية</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>

<body class="bg-gray-50">

<!--  Navbar -->
<header class="bg-wadimakkah-dark text-white shadow-lg"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <div class="text-white px-16 py-6 flex items-center justify-between">

    <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

    <!--  هنا كان فيه خطأ وتم تصحيحه -->
    <div class="flex gap-8 text-sm font-medium">
        <a href="#" class="hover:text-wadimakkah-light transition">الرئيسية</a>
        <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
        <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
        <a href="#" class="hover:text-wadimakkah-light transition">الاستشارات</a>
        <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
        <a href="#" class="flex items-center gap-1">
                    اللغة العربية
                        <i class="fas fa-globe text-wadimakkah-light"></i>
                </a>
    </div>
    
        <div class="flex items-center gap-6">
            <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
        </div>
    </div>
</header>
        

<!--  العنوان -->
<div class="mt-10 text-center">
    <h1 class="text-3xl font-bold text-gray-800">
        منصة الإدارة القانونية
    </h1>
    <p class="text-sm text-gray-500 mt-2">
        المنصة الموحدة لإدارة الخدمات القانونية بشركة وادي مكة
    </p>
</div>

<!-- Search -->
<div class="flex justify-center mt-6 px-10">
    
    <div class="flex items-center bg-white shadow-md rounded-lg w-full max-w-3xl px-4 py-3">
  
         
        <!--  أيقونة البحث -->
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="w-5 h-5 text-gray-400 ml-2" 
             fill="none" 
             viewBox="0 0 24 24" 
             stroke="currentColor">
            
            <circle cx="11" cy="11" r="8" stroke-width="2"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-width="2"></line>

        </svg>

        <input 
            type="text" 
            placeholder="ابحث عن قضية، عقد، مستند..."
            class="flex-1 outline-none text-sm bg-transparent"
        >

    </div>

</div>

<!--  أبرز الخدمات -->
<div class="mt-12">

    <h2 class="bg-[#344C93] text-white text-center py-3 font-bold text-lg w-full">
        أبرز الخدمات
    </h2>

    
    <div class="px-16 mt-6">
        
        <div class="bg-[#f5f6f8] p-8 rounded-2xl shadow-sm">
            
            <div class="grid grid-cols-4 gap-6 text-center">

    <div class="bg-white p-6 rounded-xl shadow-md flex flex-col h-full">
        <h3 class="font-bold text-sm mb-2">انشاء قضية</h3>
        <p class="text-xs text-gray-500 leading-6 mb-4">
            تتيح هذه الخدمة للمستخدم تقديم طلب قضية جديدة عبر إدخال البيانات الأساسية للقضية وإرفاق المستندات اللازمة لمراجعتها من قبل الإدارة القانونية.
        </p>
        <div class="mt-auto">
            <button class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">
                الانتقال إلى الخدمة
            </button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md flex flex-col h-full">
        <h3 class="font-bold text-sm mb-2">إنشاء عقد</h3>
        <p class="text-xs text-gray-500 leading-6 mb-4">
          تتيح هذه الخدمة إمكانية إنشاء عقد و إدخال بياناته و إرسالة إلى المراجعة القانونية مع حفظ
          التعديلات في النظام.
        </p>
        <div class="mt-auto">
            <button class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">
                الانتقال إلى الخدمة
            </button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md flex flex-col h-full">
        <h3 class="font-bold text-sm mb-2">طلب إستشارة</h3>
        <p class="text-xs text-gray-500 leading-6 mb-4">
            تتيح هذه الخدمة تقديم طلب استشارة قانونية ومتابعة حالة الطلب حتى استلام الرد النهائي من المحامي.
        </p>
        <div class="mt-auto">
            <button class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">
                الانتقال إلى الخدمة
            </button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md flex flex-col h-full">
        <h3 class="font-bold text-sm mb-2">متابعة الجلسات</h3>
        <p class="text-xs text-gray-500 leading-6 mb-4">
            تتيح هذه الخدمة جدولة الجلسات القانونية ومتابعة مواعيدها وتحديث حالتها مع تسجيل النتائج المرتبطة بكل جلسة وحفظها في النظام.
        </p>
        <div class="mt-auto">
            <button class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">
                الانتقال إلى الخدمة
            </button>
        </div>
    </div>

</div>

        </div>

    </div>
</div>

<!--  لوحة التحكم -->
<div class="mt-12">

    <h2 class="bg-[#344C93] text-white text-center py-3 font-bold text-lg w-full">
        لوحة التحكم
    </h2>

 
<!-- 🔽 Dropdown +  Power BI Dashboard -->
<div class="flex flex-col items-center mt-6 px-10">

    <!-- Dropdown -->
    <select id="dashboardSelect"
        class="bg-white px-6 py-3 rounded-xl shadow-md text-sm outline-none cursor-pointer mb-6">
        <!-- <option value="">اختر القسم </option>-->
        <option value="cases">قضايا</option>
        <option value="contracts">عقود</option>
        <option value="consultations">استشارات</option>
    </select>

    <!-- Dashboard  -->
    <div class="bg-white p-6 rounded-2xl shadow-md w-full max-w-5xl">

        <!-- Iframe -->
        <iframe id="powerBIFrame"
            src=""
            class="w-full h-[520px] rounded-lg transition-all duration-300"
            frameborder="0"
            allowFullScreen="true">
        </iframe>

    </div>

</div>

<!-- Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const select = document.getElementById('dashboardSelect');
    const frame = document.getElementById('powerBIFrame');

    const dashboards = {
        cases: "https://app.powerbi.com/view?r=eyJrIjoiZjI3NmZjM2YtNjUwYS00MDQ3LWI0MGUtNTk4ZWFlZjEwMzc3IiwidCI6Ijc5YTA1N2ZiLWIwZDUtNDRkZC04ZjkwLTBiZjcxNTFmNWMzZiIsImMiOjl9",
        
        contracts: "https://app.powerbi.com/view?r=eyJrIjoiMjZlZTY1Y2ItZGE1MS00NzNiLTk1YWItNTY1NzNkZTlmOWFlIiwidCI6Ijc5YTA1N2ZiLWIwZDUtNDRkZC04ZjkwLTBiZjcxNTFmNWMzZiIsImMiOjl9",

        consultations: "https://app.powerbi.com/view?r=eyJrIjoiZjA4ODY2M2QtM2Y4Mi00OTlhLTk1OTYtOTE0YzBmNWRhN2IxIiwidCI6Ijc5YTA1N2ZiLWIwZDUtNDRkZC04ZjkwLTBiZjcxNTFmNWMzZiIsImMiOjl9"
    };

    select.addEventListener('change', function () {

        if (this.value && dashboards[this.value]) {
            frame.src = dashboards[this.value];
        } else {
            frame.src = "";
        }

    });

});
</script>

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