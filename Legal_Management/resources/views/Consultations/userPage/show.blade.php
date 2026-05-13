<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>عرض الاستشارة القانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: white;
        }
    </style>

</head>

<body class="min-h-screen flex flex-col bg-white">

    <!-- ================= NAVBAR ================= -->

    <header class="bg-[#2f4597] text-white shadow-md">

        <div class="px-16 py-5 flex items-center justify-between">

            <!-- Logo -->

            <img src="{{ asset('images/Wadi Makkah Logo.png') }}"
                class="h-16">

            <!-- Nav Links -->

            <div class="flex gap-10 text-sm font-medium">

                <a href="{{ route('user-interface') }}">
                    الرئيسية
                </a>

                <a href="#">
                    القضايا
                </a>

                <a href="#">
                    العقود
                </a>

                <a href="{{ route('consultations.page') }}"
                    class="font-semibold">
                    الاستشارات
                </a>

                <a href="#">
                    المستندات والتقارير
                </a>

                <a href="#"
                    class="hover:text-gray-200 transition">

                    اللغة العربية

                    <i class="fas fa-globe"></i>

                </a>

            </div>

            <!-- Icons -->

            <div class="flex items-center gap-5 text-xl">

                <i class="fas fa-user-circle"></i>

                <i class="fas fa-bell"></i>

                <i class="fas fa-cog"></i>

            </div>

        </div>

    </header>

    <!-- ================= MAIN ================= -->

    <main class="flex-1 px-10 py-8 bg-white">

        <div class="max-w-7xl mx-auto flex gap-8">

            <!-- CONTENT -->

            <section class="flex-1">

                <!-- Breadcrumb -->

                <div class="text-sm text-gray-500 mb-2">

                    الرئيسية /

                    <span class="text-[#243C96] font-semibold">
                        الاستشارات القانونية
                    </span>

                </div>

                <!-- Title -->

                <h1 class="text-4xl font-bold text-[#1f1f1f] mb-8">

                    إدارة الاستشارات القانونية

                </h1>

                <!-- Search -->

                <div class="relative mb-10">

                    <input type="text"
                        placeholder="ابحث عن استشارة برقم الطلب أو عنوان الاستشارة..."
                        class="w-full bg-white border border-gray-200 rounded-xl h-12 pr-12 pl-5 text-sm focus:outline-none focus:ring-2 focus:ring-[#243C96]" />

                    <!-- Search Icon -->

                    <i
                        class="fa-solid fa-magnifying-glass absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                    <!-- Filter Icon -->

                    <i
                        class="fa-solid fa-filter absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                </div>

                <!-- ================= RESPONSE CARD ================= -->

                <div
                    class="bg-[#ececec] rounded-3xl border border-gray-300 shadow-sm p-10">

                    <!-- Section Title -->

                    <h2
                        class="text-2xl font-bold text-[#1f1f1f] mb-8">

                        الردود والتوصيات القانونية

                    </h2>

                    <!-- Top Info -->

                    <div class="space-y-5 mb-10">

                        <!-- Request Number -->

                        <div class="flex items-center gap-3">

                            <span class="font-semibold text-gray-700">
                                رقم الطلب:
                            </span>

                            <span
                                class="bg-white text-[#243C96] px-4 py-1 rounded-lg text-sm font-bold border border-gray-200">

                                #3052

                            </span>

                        </div>

                        <!-- Status -->

                        <div class="flex items-center gap-3">

                            <span class="font-semibold text-gray-700">
                                حالة الطلب:
                            </span>

                            <span
                                class="bg-blue-100 text-blue-700 px-4 py-1 rounded-lg text-sm font-semibold border border-blue-200">

                                تم الرد على الاستشارة

                            </span>

                        </div>

                        <!-- Lawyer -->

                        <div class="flex items-center gap-3">

                            <span class="font-semibold text-gray-700">
                                المحامي المسؤول:
                            </span>

                            <span class="text-gray-700">
                                أحمد السلمي
                            </span>

                        </div>

                    </div>

                    <!-- ================= LEGAL RESPONSE ================= -->

                    <div class="mb-8">

                        <h3
                            class="text-xl font-bold text-gray-800 mb-5">

                            الرد القانوني

                        </h3>

                        <!-- Response Box -->

                        <div
                            class="bg-gray-50 border border-gray-200 rounded-2xl p-8 leading-9 text-gray-700 text-sm">

                            بعد مراجعة الطلب والمستندات المرفقة، تبين أن الحالة
                            تستوجب اتخاذ الإجراءات القانونية اللازمة وفقًا
                            للأنظمة المعمول بها داخل المملكة العربية السعودية.

                            <br><br>

                            نوصي بمتابعة الإجراءات النظامية وإرفاق أي مستندات
                            إضافية قد تدعم موقفكم القانوني في القضية.

                            <br><br>

                            كما ننصح بالتواصل المباشر مع الإدارة القانونية
                            في حال وجود أي استفسارات إضافية.

                        </div>

                    </div>

                    <!-- ================= BUTTONS ================= -->

                    <div class="flex items-center gap-4">

                        <!-- Download -->

                        <button
                            class="bg-[#243C96] hover:bg-[#1b2f77] text-white px-6 py-3 rounded-xl text-sm transition flex items-center gap-2 shadow-sm">

                            <i class="fa-solid fa-download"></i>

                            تحميل الرد PDF

                        </button>

                        <!-- Back -->

                        <button
                            class="bg-white border border-gray-200 hover:bg-gray-100 text-gray-700 px-6 py-3 rounded-xl text-sm transition">

                            العودة للطلبات

                        </button>

                    </div>

                </div>

            </section>

        </div>

    </main>
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

</html>