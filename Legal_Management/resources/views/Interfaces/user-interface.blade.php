<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">

    <title>منصة الإدارة القانونية</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: { 
                extend: { 
                    colors: { 
                        wadimakkah: { dark: '#1e3a8a', light: '#bfdbfe' } 
                    } 
                } 
            }
        }
    </script>
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">

<header class="bg-wadimakkah-dark text-white shadow-lg">
        <div class="text-white px-16 py-6 flex items-center justify-between">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

            <div class="flex gap-8 text-sm font-medium">
                <a href="{{ route('user-interface') }}" class="hover:text-wadimakkah-light transition">الرئيسية</a>
                <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
                <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
                <a href="{{ route('consultations.page') }}"class="hover:text-wadimakkah-light transition"> الاستشارات</a>
                <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
                <a href="#" class="hover:text-wadimakkah-light transition">
                    اللغة العربية
                    <i class="fas fa-globe text-wadimakkah-light"></i>
                </a>
            </div>

            <div class="flex items-center gap-6">
                <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
            </div>
        </div>
    </header>

<main class="flex-grow container mx-auto px-6 py-10">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800">منصة الإدارة القانونية</h1>
            <p class="text-gray-600 mt-2 mb-8">المنصة الموحدة للإدارة القانونية بشركة وادي مكة</p>
            
          <div class="max-w-4xl mx-auto bg-white border border-gray-100 rounded-xl shadow-md p-3 flex items-center gap-4 transition-all hover:shadow-lg">
    <i class="fas fa-search text-gray-400 mr-3"></i>
    <input type="text" 
           placeholder="ابحث عن قضية، عقد، مستند، رقم مرجعي..." 
           class="flex-grow bg-transparent outline-none p-2 text-gray-700 placeholder-gray-400">
</div>
        </div>
        <div class="bg-wadimakkah-dark text-white p-4 text-center rounded-t-lg font-bold text-lg mt-10">
    أبرز الخدمات
        </div> 
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-16">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">إنشاء قضية</h3>
                <p class="text-sm text-gray-600 mb-6">تتيح هذه الخدمة للمستخدم تقديم طلب قضية جديدة عبر إدخال البيانات الأساسية.</p>
                <button class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full">الانتقال للخدمة</button>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">إنشاء عقد</h3>
                <p class="text-sm text-gray-600 mb-6">تتيح هذه الخدمة إمكانية إنشاء عقد و إدخال بياناته و إرسالة إلى المراجعة القانونية.</p>
                <button class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full">الانتقال للخدمة</button>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">طلب استشارة</h3>
                <p class="text-sm text-gray-600 mb-6">تتيح هذه الخدمة تقديم طلب استشارة قانونية ومتابعة حالة الطلب.</p>
                <button onclick="window.location='{{ route('consultations.create') }}'"
    class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full">
    الانتقال للخدمة
</button>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">متابعة الجلسات</h3>
                <p class="text-sm text-gray-600 mb-6">تتيح هذه الخدمة جدولة الجلسات القانونية ومتابعة مواعيدها وتحديث حالتها.</p>
                <button class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full">الانتقال للخدمة</button>
            </div>
        </div>

        <!-- لوحة التحكم -->
    <div class="bg-wadimakkah-dark text-white p-4 text-center rounded-t-lg font-bold text-lg">
        لوحة التحكم
    </div>

    <div class="bg-white p-8 rounded-b-lg shadow-sm border">

        <div class="flex flex-col items-center">

            <!-- SELECT -->
            <select id="dashboardSelect"
                class="bg-white px-6 py-3 rounded-xl shadow-md text-sm outline-none cursor-pointer mb-6 border">
                
                <option value="cases" selected>قضايا</option>
                <option value="contracts">عقود</option>
                <option value="consultations">استشارات</option>

            </select>

            <!-- IFRAME -->
            <div class="bg-white p-4 rounded-2xl shadow-md w-full max-w-5xl">
                <iframe id="powerBIFrame"
                    class="w-full h-[520px] rounded-lg"
                    frameborder="0"
                    allowFullScreen="true">
                </iframe>
            </div>

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

<script>
document.addEventListener("DOMContentLoaded", function () {

    const select = document.getElementById('dashboardSelect');
    const frame = document.getElementById('powerBIFrame');

    const dashboards = {
        cases: "https://app.powerbi.com/view?r=eyJrIjoiZjI3NmZjM2YtNjUwYS00MDQ3LWI0MGUtNTk4ZWFlZjEwMzc3IiwidCI6Ijc5YTA1N2ZiLWIwZDUtNDRkZC04ZjkwLTBiZjcxNTFmNWMzZiIsImMiOjl9",
        
        contracts: "https://app.powerbi.com/view?r=eyJrIjoiMjZlZTY1Y2ItZGE1MS00NzNiLTk1YWItNTY1NzNkZTlmOWFlIiwidCI6Ijc5YTA1N2ZiLWIwZDUtNDRkZC04ZjkwLTBiZjcxNTFmNWMzZiIsImMiOjl9",

        consultations: "https://app.powerbi.com/view?r=eyJrIjoiZjA4ODY2M2QtM2Y4Mi00OTlhLTk1OTYtOTE0YzBmNWRhN2IxIiwidCI6Ijc5YTA1N2ZiLWIwZDUtNDRkZC04ZjkwLTBiZjcxNTFmNWMzZiIsImMiOjl9"
    };

    //  تحميل القضايا تلقائياً
    frame.src = dashboards["cases"];

    // تغيير الداشبورد
    select.addEventListener('change', function () {
        frame.src = dashboards[this.value];
    });

});
</script>

</body>
</html>