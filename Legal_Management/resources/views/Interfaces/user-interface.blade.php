<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة الإدارة القانونية</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        wadimakkah: {
                            dark: '#1e3a8a',
                            light: '#bfdbfe',
                        }
                    }
                }
            }
        }
    </script>
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">

    <header class="bg-wadimakkah-dark text-white shadow-lg">
        <div class="container mx-auto px-6 py-6 flex items-center justify-between">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-16" alt="Logo">
            <nav class="flex gap-8 text-sm font-medium">
                <a href="#" class="hover:text-wadimakkah-light transition">الرئيسية</a>
                <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
                <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
                <a href="#" class="hover:text-wadimakkah-light transition">الاستشارات</a>
                <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
                <a href="#" class="flex items-center gap-1">اللغة العربية <i class="fas fa-globe text-wadimakkah-light"></i></a>
            </nav>
            <div class="flex items-center gap-6">
                <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
            </div>
        </div>
    </header>

    <main class="flex-grow container mx-auto px-6 py-10">
        
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-800">منصة الإدارة القانونية</h1>
            <p class="text-gray-600 mt-2">المنصة الموحدة للإدارة القانونية بشركة وادي مكة</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-16">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">إنشاء قضية</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">تتيح هذه الخدمة للمستخدم تقديم طلب قضية جديدة عبر إدخال البيانات الأساسية للقضية وإرفاق المستندات اللازمة لمراجعتها من قبل الإدارة القانونية.</p>
                <button class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full transition">الانتقال إلى الخدمة</button>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">إنشاء عقد</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">تتيح هذه الخدمة إمكانية إنشاء عقد و إدخال بياناته و إرسالة إلى المراجعة القانونية مع حفظ التعديلات في النظام.</p>
                <button class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full transition">الانتقال إلى الخدمة</button>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">طلب استشارة</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">تتيح هذه الخدمة تقديم طلب استشارة قانونية ومتابعة حالة الطلب حتى استلام الرد النهائي من المحامي.</p>
                <button class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full transition">الانتقال إلى الخدمة</button>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center flex flex-col justify-between">
                <h3 class="font-bold mb-4">متابعة الجلسات</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">تتيح هذه الخدمة جدولة الجلسات القانونية ومتابعة مواعيدها وتحديث حالتها مع تسجيل النتائج المرتبطة بكل جلسة وحفظها في النظام.</p>
                <button class="bg-gray-100 px-4 py-2 rounded text-sm hover:bg-gray-200 w-full transition">الانتقال إلى الخدمة</button>
            </div>
        </div>

        <div class="bg-wadimakkah-dark text-white p-4 text-center rounded-t-lg font-bold text-lg">لوحة التحكم</div>
        <div class="bg-white p-8 rounded-b-lg shadow-sm grid grid-cols-1 md:grid-cols-3 gap-8 text-center border-x border-b border-gray-200">
            <div><p class="text-gray-500">إجمالي القضايا</p><h2 class="text-4xl font-bold text-blue-900 mt-2">50</h2></div>
            <div><p class="text-gray-500">القضايا النشطة</p><h2 class="text-4xl font-bold text-blue-900 mt-2">35</h2></div>
            <div><p class="text-gray-500">القضايا المنتهية</p><h2 class="text-4xl font-bold text-blue-900 mt-2">15</h2></div>
        </div>
    </main>

    <footer class="bg-wadimakkah-dark text-white py-12 border-t border-gray-700">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10 text-sm">
            <div>
                <h5 class="font-bold mb-4">روابط مهمة</h5>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-wadimakkah-light">سياسة الخصوصية</a></li>
                    <li><a href="#" class="hover:text-wadimakkah-light">الشروط والأحكام</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold mb-4">المساعدة والدعم</h5>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-wadimakkah-light">الدعم الفني</a></li>
                    <li><a href="#" class="hover:text-wadimakkah-light">تواصل معنا</a></li>
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
            <div class="flex flex-col items-center text-center">
                <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-16 mb-4 opacity-80" alt="Logo">
                <p class="text-xs text-gray-400">شركة وادي مكة للتقنية</p>
                <p class="text-xs text-gray-400">جميع الحقوق محفوظة @ 2026</p>
            </div>
        </div>
    </footer>
</body>
</html>