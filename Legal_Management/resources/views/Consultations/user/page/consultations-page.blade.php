<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة الاستشارات القانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
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


<!--  Navbar -->
<header class="bg-wadimakkah-dark text-white shadow-lg"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <div class="text-white px-16 py-6 flex items-center justify-between">

    <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

    <!--  هنا كان فيه خطأ وتم تصحيحه -->
    <div class="flex gap-8 text-sm font-medium">
        <a href="{{ route('user-interface') }}">
    الرئيسية
</a>
        <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
        <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
<a href="{{ route('consultations.page') }}" class="text-sm hover:underline">
    الاستشارات
</a>
</a>
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


        <!-- Status Cards -->
        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <h3 class="text-sm font-bold mb-4">حالة الاستشارة القانونية</h3>

            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="bg-gray-100 p-6 rounded-lg">
                    <p class="text-xs text-gray-500 mb-2">تم الرد</p>
                    <p class="text-xl font-bold">3</p>
                </div>

                <div class="bg-gray-100 p-6 rounded-lg">
                    <p class="text-xs text-gray-500 mb-2">الاستشارات</p>
                    <p class="text-xl font-bold">6</p>
                </div>

                <div class="bg-gray-100 p-6 rounded-lg">
                    <p class="text-xs text-gray-500 mb-2">قيد المراجعة</p>
                    <p class="text-xl font-bold">3</p>
                </div>
            </div>
        </div>

        <!--  Services -->
        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <h3 class="text-sm font-bold mb-4">الخدمات</h3>

            <div class="grid grid-cols-3 gap-4">

                <!-- Card 1 -->
                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h4 class="font-bold text-sm mb-2">طلب استشارة قانونية</h4>
                    <p class="text-xs text-gray-500 leading-6 mb-4">
                        تتيح هذه الخدمة تقديم طلب استشارة قانونية ومتابعة حالة الطلب حتى استلام الرد النهائي.
                    </p>
                    <button class="bg-gray-200 px-4 py-1 text-xs rounded hover:bg-gray-300">
                        الانتقال إلى الخدمة
                    </button>
                </div>

                <!-- Card 2 -->
                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h4 class="font-bold text-sm mb-2">متابعة حالة الاستشارات</h4>
                    <p class="text-xs text-gray-500 leading-6 mb-4">
                        تتيح هذه الخدمة متابعة جميع الطلبات ومعرفة حالتها والتحديثات المرتبطة بها.
                    </p>
                    <button class="bg-gray-200 px-4 py-1 text-xs rounded hover:bg-gray-300">
                        الانتقال إلى الخدمة
                    </button>
                </div>

                <!-- Card 3 -->
                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h4 class="font-bold text-sm mb-2">استشاراتي</h4>
                    <p class="text-xs text-gray-500 leading-6 mb-4">
                        عرض جميع الاستشارات الخاصة بك مع إمكانية مراجعة الردود والتحديثات.
                    </p>
                    <button class="bg-gray-200 px-4 py-1 text-xs rounded hover:bg-gray-300">
                        الانتقال إلى الخدمة
                    </button>
                </div>

            </div>
        </div>

        <!-- 🔔 Notifications -->
        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <h3 class="text-sm font-bold mb-4">🔔 الإشعارات</h3>

            <div class="space-y-3 text-sm">

                <div class="bg-gray-50 p-3 rounded">
                    ⚠️ الاستشارة رقم 3021 تحتاج مراجعة
                </div>

                <div class="bg-gray-50 p-3 rounded">
                    ✔️ تم الرد على الاستشارة رقم 3025
                </div>

                <div class="bg-gray-50 p-3 rounded">
                    ⏳ الاستشارة رقم 3027 قيد المعالجة
                </div>

            </div>
        </div>

        <!-- 📄 Latest Requests Table -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-sm font-bold mb-4">آخر الطلبات</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">رقم الاستشارة</th>
                            <th class="p-3">العنوان</th>
                            <th class="p-3">الحالة</th>
                            <th class="p-3">الإجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="border-b">
                            <td class="p-3">3051</td>
                            <td class="p-3">عقد</td>
                            <td class="p-3 text-blue-500">قيد المراجعة</td>
                            <td class="p-3">
                                <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-xs">
                                    عرض
                                </button>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <td class="p-3">3052</td>
                            <td class="p-3">نزاع</td>
                            <td class="p-3 text-green-500">تم الرد</td>
                            <td class="p-3">
                                <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-xs">
                                    عرض
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3">3053</td>
                            <td class="p-3">مراجعة عقد</td>
                            <td class="p-3 text-yellow-500">قيد الانتظار</td>
                            <td class="p-3">
                                <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-xs">
                                    عرض
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>

    </div>
    
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

</body>
</html>
