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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: #f5f7fb;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-[#243C96] h-24 flex items-center justify-between px-16 shadow-md">

        <!-- Right -->
        <div class="flex items-center gap-10 text-white text-sm">

            <a href="#" class="hover:text-gray-200 transition">الرئيسية</a>

            <a href="#" class="hover:text-gray-200 transition">القضايا</a>

            <a href="#" class="hover:text-gray-200 transition">العقود</a>

            <a href="#" class="hover:text-gray-200 transition">الاستشارات</a>

            <a href="#" class="hover:text-gray-200 transition">المستندات والتقارير</a>

            <a href="#" class="hover:text-gray-200 transition">لوحة التحكم</a>

        </div>

        <!-- Logo -->
        <div>
            <img src="images/logo.png" alt="logo" class="h-16">
        </div>

    </nav>

    <!-- MAIN -->
    <main class="flex-1 px-10 py-8">

        <div class="max-w-7xl mx-auto flex gap-8">

            <!-- SIDEBAR -->
            <aside class="w-64 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 h-fit">

                <h2 class="font-bold text-xl text-[#1e1e1e] mb-6">
                    الاستشارات القانونية
                </h2>

                <div class="space-y-5 text-sm">

                    <!-- Section -->
                    <div>

                        <h3 class="text-gray-700 font-semibold mb-3">
                            حالة الاستشارة القانونية
                        </h3>

                        <div class="space-y-2 pr-3 text-gray-500">

                            <a href="#" class="block hover:text-[#243C96] transition">
                                قيد المراجعة
                            </a>

                            <a href="#" class="block hover:text-[#243C96] transition">
                                تم الرد
                            </a>

                            <a href="#" class="block text-[#243C96] font-bold">
                                الردود والتوصيات القانونية
                            </a>

                        </div>

                    </div>

                    <!-- Notifications -->
                    <div>

                        <h3 class="text-gray-700 font-semibold mb-3">
                            الإشعارات
                        </h3>

                        <a href="#" class="block text-gray-500 hover:text-[#243C96] transition">
                            آخر الإشعارات
                        </a>

                    </div>

                    <!-- Requests -->
                    <div>

                        <h3 class="text-gray-700 font-semibold mb-3">
                            آخر الطلبات
                        </h3>

                        <a href="#" class="block text-gray-500 hover:text-[#243C96] transition">
                            عرض الطلبات
                        </a>

                    </div>

                </div>

            </aside>

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

                <!-- RESPONSE CARD -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-10">

                    <!-- Section Title -->
                    <h2 class="text-2xl font-bold text-[#1f1f1f] mb-8">
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
                                class="bg-gray-100 text-[#243C96] px-4 py-1 rounded-lg text-sm font-bold">
                                #3052
                            </span>

                        </div>

                        <!-- Status -->
                        <div class="flex items-center gap-3">

                            <span class="font-semibold text-gray-700">
                                حالة الطلب:
                            </span>

                            <span
                                class="bg-blue-100 text-blue-700 px-4 py-1 rounded-lg text-sm font-semibold">
                                تم الرد على الاستشارة
                            </span>

                        </div>

                        <!-- Lawyer -->
                        <div class="flex items-center gap-3">

                            <span class="font-semibold text-gray-700">
                                المحامي المسؤول:
                            </span>

                            <span class="text-gray-600">
                                أحمد السلمي
                            </span>

                        </div>

                    </div>

                    <!-- Legal Response -->
                    <div class="mb-8">

                        <h3 class="text-xl font-bold text-gray-800 mb-5">
                            الرد القانوني
                        </h3>

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

                    <!-- Attachments -->
                    <div class="flex items-center gap-4">

                        <button
                            class="bg-[#243C96] hover:bg-[#1b2f77] text-white px-6 py-3 rounded-xl text-sm transition flex items-center gap-2 shadow-sm">

                            <i class="fa-solid fa-download"></i>

                            تحميل الرد PDF

                        </button>

                        <button
                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl text-sm transition">

                            العودة للطلبات

                        </button>

                    </div>

                </div>

            </section>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#ececec] mt-16 py-10">

        <div class="max-w-7xl mx-auto px-10">

            <div class="flex justify-between items-center flex-wrap gap-10">

                <!-- Logo -->
                <div class="text-center">
                    <img src="images/logo.png" alt="logo" class="h-20 mx-auto mb-3">

                    <p class="text-xs text-gray-500">
                        جميع الحقوق محفوظة © 2026
                    </p>
                </div>

                <!-- Links -->
                <div class="space-y-2 text-sm text-gray-600">

                    <p class="font-bold text-black mb-3">
                        روابط مهمة
                    </p>

                    <a href="#" class="block hover:text-[#243C96]">
                        الدعم الحكومي
                    </a>

                    <a href="#" class="block hover:text-[#243C96]">
                        السياسة والخصوصية
                    </a>

                </div>

                <!-- Contact -->
                <div class="space-y-2 text-sm text-gray-600">

                    <p class="font-bold text-black mb-3">
                        المساعدة والدعم
                    </p>

                    <a href="#" class="block hover:text-[#243C96]">
                        تواصل معنا
                    </a>

                    <a href="#" class="block hover:text-[#243C96]">
                        مركز الدعم
                    </a>

                </div>

                <!-- Social -->
                <div>

                    <p class="font-bold text-black mb-4 text-center">
                        وسائل التواصل الاجتماعي
                    </p>

                    <div class="flex items-center gap-5 text-2xl text-gray-700">

                        <i class="fa-brands fa-linkedin hover:text-[#243C96] cursor-pointer"></i>

                        <i class="fa-brands fa-youtube hover:text-red-600 cursor-pointer"></i>

                        <i class="fa-brands fa-instagram hover:text-pink-600 cursor-pointer"></i>

                        <i class="fa-brands fa-x-twitter hover:text-black cursor-pointer"></i>

                        <i class="fa-brands fa-facebook hover:text-blue-600 cursor-pointer"></i>

                    </div>

                </div>

            </div>

        </div>

    </footer>

</body>

</html>