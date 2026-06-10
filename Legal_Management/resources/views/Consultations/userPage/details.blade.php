<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تفاصيل الاستشارة القانونية</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

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

    <!-- NAVBAR -->

    <header class="bg-[#2f4597] text-white shadow-md">

        <div class="px-16 py-5 flex items-center justify-between">

            <img src="{{ asset('images/Wadi Makkah Logo.png') }}"
                 class="h-16">

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

                <a href="#">
                    اللغة العربية
                    <i class="fas fa-globe"></i>
                </a>

            </div>

            <div class="flex items-center gap-5 text-xl">

                <i class="fas fa-user-circle"></i>
                <i class="fas fa-bell"></i>
                <i class="fas fa-cog"></i>

            </div>

        </div>

    </header>

    <!-- MAIN -->

    <main class="flex-1 px-10 py-8 bg-white">

        <div class="max-w-7xl mx-auto">

            <!-- Breadcrumb -->

            <div class="text-sm text-gray-500 mb-2">

                الرئيسية /

                <span class="text-[#243C96] font-semibold">
                    تفاصيل الاستشارة
                </span>

            </div>

            <!-- Title -->

            <h1 class="text-4xl font-bold text-[#1f1f1f] mb-8">

                إدارة الاستشارات القانونية

            </h1>

            <!-- CARD -->

            <div class="bg-[#ececec] rounded-3xl border border-gray-300 shadow-sm p-10">

                <!-- عنوان الصفحة -->

                <h2 class="text-2xl font-bold text-[#1f1f1f] mb-8">

                    تفاصيل الاستشارة القانونية

                </h2>

                <!-- معلومات الطلب -->

                <div class="space-y-5 mb-10">

                    <div class="flex items-center gap-3">

                        <span class="font-semibold text-gray-700">
                            رقم الطلب:
                        </span>

                        <span class="bg-white text-[#243C96] px-4 py-1 rounded-lg text-sm font-bold border border-gray-200">

                            #{{ $consultation->consultation_id }}

                        </span>

                    </div>

                    <div class="flex items-center gap-3">

                        <span class="font-semibold text-gray-700">
                            حالة الطلب:
                        </span>

                        <span class="
                            px-4 py-1 rounded-lg text-sm font-semibold border

                            @if($consultation->status == 'قيد المراجعة')
                                bg-yellow-100 text-yellow-700 border-yellow-200

                            @elseif($consultation->status == 'قيد الاعتماد')
                                bg-blue-100 text-blue-700 border-blue-200

                            @elseif($consultation->status == 'متأخرة')
                                bg-red-100 text-red-700 border-red-200

                            @else
                                bg-gray-100 text-gray-700 border-gray-200
                            @endif
                        ">

                            {{ $consultation->status }}

                        </span>

                    </div>

                    <div class="flex items-center gap-3">

                        <span class="font-semibold text-gray-700">
                            المحامي المسؤول:
                        </span>

                        <span class="text-gray-700">

                            {{ optional($consultation->assignedTo)->full_name ?? 'لم يتم التعيين' }}

                        </span>

                    </div>

                </div>

                <!-- معلومات المتابعة -->

                <div class="mb-8">

                    <h3 class="text-xl font-bold text-gray-800 mb-5">

                        معلومات المتابعة

                    </h3>

                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-8 leading-9 text-gray-700 text-sm">

                        تم استلام الاستشارة وهي حالياً تحت المعالجة من قبل الإدارة القانونية.

                        <br><br>

                        سيتم إشعاركم فور الانتهاء من مراجعة الطلب واعتماد الرد النهائي.

                        <br><br>

                        الوقت المتوقع للرد:
                        <strong>خلال 3 أيام عمل</strong>

                    </div>

                </div>

                <!-- زر الرجوع -->

                <div class="flex items-center gap-4">

                    <a href="{{ route('consultations.page') }}"
                       class="bg-white border border-gray-200 hover:bg-gray-100 text-gray-700 px-6 py-3 rounded-xl text-sm transition">

                        العودة للطلبات

                    </a>

                </div>

            </div>

        </div>

    </main>

    <!-- FOOTER -->

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