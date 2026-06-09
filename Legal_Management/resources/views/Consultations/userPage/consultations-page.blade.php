<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>منصة الإدارة القانونية</title>

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

<body class="min-h-screen flex flex-col">

<!-- NAVBAR -->
<header class="bg-wadimakkah-dark text-white shadow-lg">
    <div class="px-16 py-6 flex items-center justify-between">

        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

        <div class="flex gap-8 text-sm font-medium">
            <a href="#" class="hover:text-wadimakkah-light transition">الرئيسية</a>
            <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
            <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
            <a href="#" class="hover:text-wadimakkah-light transition">الاستشارات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">المستندات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>

        <div class="flex items-center gap-6">
          <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
            <i class="fas fa-bell text-xl"></i>
            <i class="fas fa-cog text-xl"></i>
        </div>

    </div>
</header>

<!-- MAIN -->
<main class="container mx-auto px-6 py-10 flex-grow">

<!-- HEADER -->
<div class="text-center mt-10">
    <h1 class="text-3xl font-bold text-gray-800">منصة الإدارة القانونية</h1>
    <p class="text-sm text-gray-500 mt-2">المنصة الموحدة لإدارة الخدمات القانونية</p>
</div>

<!-- SEARCH -->
<div class="flex justify-center mt-6 mb-12">
    <div class="flex items-center bg-white shadow-md rounded-lg w-full max-w-3xl px-4 py-3 border border-gray-200">
        <i class="fas fa-search text-gray-400 ml-2"></i>
        <input type="text" placeholder="ابحث عن استشارة..." class="flex-1 outline-none text-sm bg-transparent">
    </div>
</div>

<!-- STATS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
        <p class="text-gray-600 font-bold mb-2">قيد المراجعة</p>
        <span class="text-5xl font-black text-[#1e3a8a]">{{ $under_review ?? 0 }}</span>
    </div>

    <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
        <p class="text-gray-600 font-bold mb-2">الاستشارات</p>
        <span class="text-5xl font-black text-[#1e3a8a]">{{ $total ?? 0 }}</span>
    </div>

    <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
        <p class="text-gray-600 font-bold mb-2">تم الرد</p>
        <span class="text-5xl font-black text-[#1e3a8a]">{{ $replied ?? 0 }}</span>
    </div>
</div>

<!-- SERVICES -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

 <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
    
    <h3 class="font-bold text-lg mb-2">طلب استشارة</h3>
    <p class="text-gray-500 text-sm mb-6">
        تتيح هذه الخدمة للمستخدم تقديم طلب استشارة قانونية جديدة عبر إدخال تفاصيل الطلب وتحديد نوع الاستشارة وإرفاق المستندات اللازمة لمراجعتها من قبل الإدارة القانونية.
    </p>
    <a href="{{ route('consultations.create') }}"
       class="block bg-gray-100 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">
        الانتقال إلى الخدمة
    </a>
</div>
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
        <h3 class="font-bold text-lg mb-2">متابعة حالة الاستشارات</h3>
        <p class="text-gray-500 text-sm mb-6">تتيح هذه الخدمة للمستخدم تتبع تقدم استشاراته ومعرفة آخر التحديثات على كل طلب، مع إمكانية الاطلاع على تفاصيل الحالة والتغييرات التي تطرأ عليها بشكل مستمر ودقيق.</p>
    <a href="{{ route('consultations.status') }}"
       class="block bg-gray-100 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">
        الانتقال إلى الخدمة
    </a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
        <h3 class="font-bold text-lg mb-2">استشاراتي</h3>
        <p class="text-gray-500 text-sm mb-6">تتيح هذه الخدمة للمستخدم إدارة واستعراض جميع طلبات الاستشارات الخاصة به، مع عرض التفاصيل الكاملة لكل استشارة، والاطلاع على الردود والتوصيات القانونية المرتبطة بها.</p>
      <a href="{{ route('consultations.my') }}"
       class="block bg-gray-100 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">
        الانتقال إلى الخدمة
    </a>
    </div>

</div>

<!-- NOTIFICATIONS -->
<div class="mt-12">
    <h2 class="text-xl font-bold text-gray-700 mb-6">الإشعارات</h2>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <table class="w-full text-right text-sm border-collapse">

            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4">الإشعار</th>
                    <th class="p-4">الحالة</th>
                    <th class="p-4 text-center">الوقت</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">تم الرد على الاستشارة رقم 3021</td>
                    <td class="p-4 text-green-600 font-bold">✔ مكتمل</td>
                    <td class="p-4 text-center text-gray-400">الآن</td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">تم تحديث الاستشارة رقم 3028</td>
                    <td class="p-4 text-blue-600 font-bold">🔄 تحديث</td>
                    <td class="p-4 text-center text-gray-400">قبل 5 دقائق</td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">استشارة جديدة قيد المراجعة</td>
                    <td class="p-4 text-yellow-600 font-bold">⏳ قيد المعالجة</td>
                    <td class="p-4 text-center text-gray-400">قبل ساعة</td>
                </tr>

            </tbody>

        </table>
    </div>
</div>



<!-- TABLE -->
<div class="mt-10">

    <h2 class="text-2xl font-bold text-gray-700 mb-6">
        آخر الطلبات
    </h2>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

        <table class="w-full text-right">

            <!-- HEADER -->

            <thead class="bg-gray-100 text-gray-700 text-sm">

                <tr>

                    <th class="p-5 font-bold">
                        رقم الطلب
                    </th>

                    <th class="p-5 font-bold">
                        عنوان الاستشارة
                    </th>

                    <th class="p-5 font-bold">
                        الحالة
                    </th>

                    <th class="p-5 font-bold">
                        المحامي
                    </th>

                    <th class="p-5 font-bold text-center">
                        الإجراءات
                    </th>

                </tr>

            </thead>

            <!-- BODY -->

            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">

                @forelse($consultations ?? [] as $c)

                <tr class="hover:bg-gray-50 transition duration-200">

                    <!-- رقم الطلب -->

                    <td class="p-5 font-medium">
                        {{ $c->consultation_id  }}
                    </td>

                    <!-- عنوان الاستشارة -->

                    <td class="p-5">
                        {{ $c->title }}
                    </td>

                    <!-- الحالة -->

                    <td class="p-5">

                        @if($c->status == 'مكتملة')

                        <span
                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">

                            مكتملة

                        </span>

                        @elseif($c->status == 'تم الرد')

                        <span
                            class="bg-green-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">

                            تم الرد

                        </span>

                        @elseif($c->status == 'متأخرة')

                        <span
                            class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">

                            متأخره

                        </span>
                         @elseif($c->status =='قيد الاعتماد')

                        <span
                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">

                                قيد الاعتماد
                        </span>


                        @else

                        <span
                            class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">

                            {{ $c->status }}

                        </span>

                        @endif

                    </td>

                    <!-- المحامي -->

                    <td class="p-5">

                        {{ optional($c->assignedTo)->full_name ?? 'لم يتم التعيين بعد' }}

                    </td>

                    <!-- الإجراءات -->
                  
<td class="p-4 text-center">

@if($c->status == 'مكتملة' || $c->status == 'تم الرد')

    <a href="{{ route('consultation.response') }}"
       class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition">

        عرض

    </a>

@elseif(in_array($c->status, [
    'متأخرة',
    'قيد المراجعة',
    'قيد الاعتماد'
]))

    <a href="{{ route('consultation.details', $c->consultation_id) }}"
       class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition">

        عرض

    </a>


@endif

</td>
                @empty

                <tr>

                    <td colspan="5"
                        class="p-10 text-center text-gray-500">

                        لا توجد طلبات حالياً

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
    <!-- أرشفة الاستشارات القانونية -->
<div class="mt-10"> 

    <h2 class="text-xl font-bold text-gray-700 mb-6">
        أرشفة الاستشارات القانونية
    </h2>

    <!-- الكارد -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

        <table class="w-full text-sm text-center">

            <!-- الهيدر -->
            <thead class="bg-gray-100 text-gray-700">

                <tr>

                    <th class="p-5 font-bold">
                        رقم الأرشيف
                    </th>

                    <th class="p-5 font-bold">
                        عنوان الاستشارة
                    </th>

                    <th class="p-5 font-bold">
                        الحالة
                    </th>

                    <th class="p-5 font-bold">
                        تاريخ الأرشفة
                    </th>

                    <th class="p-5 font-bold">
                        الإجراءات
                    </th>

                </tr>

            </thead>

           
            <tbody class="divide-y divide-gray-100">

                @forelse($archivedConsultations ?? [] as $c)

                <tr class="hover:bg-gray-50 transition">

                    <!-- رقم الأرشيف -->
                    <td class="p-5">
                        {{ $c->consultation_id }}
                    </td>

                    <!-- عنوان الاستشارة -->
                    <td class="p-5">
                        {{ $c->title }}
                    </td>

                    <!-- الحالة -->
                    <td class="p-5">

                        <span
                            class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-xs font-semibold">

                            مكتملة

                        </span>

                    </td>

                    <!-- التاريخ -->
                    <td class="p-5">
                         {{$c->response_date }}
                        
                    </td>

                    <!-- الإجراءات -->
                    <td class="p-5">

                        <a href="{{ route('consultation.response') }}">

                            <button
                                class="bg-[#243C96] hover:bg-[#1b2f77] text-white px-5 py-2 rounded-lg text-sm transition">

                                عرض

                            </button>

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="p-8 text-center text-gray-500">

                        لا توجد استشارات مؤرشفة

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

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
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
        </div>

        <div class="flex flex-col items-center text-center px-6 -mt-4">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20 mb-4 opacity-80">
            <p class="text-xs text-gray-400">شركة وادي مكة للتقنية</p>
            <p class="text-xs text-gray-400">جميع الحقوق محفوظة @ 2026</p>
        </div>

    </div>
</footer>

</body>
</html>