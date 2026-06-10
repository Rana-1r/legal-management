<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>طلب استشارة قانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine (عشان التفاعل) -->
    <script src="https://unpkg.com/alpinejs" defer></script>

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
<header class="bg-[#2f4597] text-white shadow-md">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <div class="px-16 py-5 flex items-center justify-between">

        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-16">

        <div class="flex gap-10 text-sm font-medium">
            <a href="{{ route('user-interface') }}">الرئيسية</a>
            <a href="#">القضايا</a>
            <a href="#">العقود</a>
            <a href="{{ route('consultations.page') }}">الاستشارات</a>
            <a href="#">المستندات والتقارير</a>
             <a href="#" class="hover:text-wadimakkah-light transition">
                    اللغة العربية
                    <i class="fas fa-globe text-wadimakkah-light"></i>
                </a>
        </div>

        <div class="flex items-center gap-5 text-xl">
            <i class="fas fa-user-circle"></i>
            <i class="fas fa-bell"></i>
            <i class="fas fa-cog"></i>
        </div>

    </div>
</header>

<!-- ================= HEADER ================= -->
<div class="text-center mt-14">
    <h2 class="text-3xl font-bold text-gray-800">
        إدارة الاستشارات القانونية
    </h2>
</div>
@if(session('success'))
<div class="max-w-2xl mx-auto mt-6">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
</div>
@endif

<!-- ================= FORM ================= -->
<div class="flex justify-center mt-12 px-4">

    <div class="bg-white w-full max-w-2xl rounded-3xl shadow-lg p-8">

        <h3 class="text-lg font-bold mb-2 text-right">
            طلب استشارة قانونية
        </h3>

        <p class="text-xs text-gray-400 mb-4 text-right">
            تحديد نوع الاستشارة
        </p>

    

       <form
    x-data="{ selected: '' }"
    method="POST"
    action="{{ route('consultations.store') }}"
    enctype="multipart/form-data"
    class="space-y-4">

    @csrf

    <div class="flex justify-start gap-2 mb-5 text-xs">

        <button
            type="button"
            @click="selected='contracts'"
            :class="selected=='contracts'
           ? 'bg-[#2f4597] text-white'
        : 'bg-gray-100 text-gray-600'"
            class="px-4 py-1 rounded-full">
            عقود
        </button>

        <button
            type="button"
            @click="selected='companies'"
            :class="selected=='companies'
            ? 'bg-[#2f4597] text-white'
        : 'bg-gray-100 text-gray-600'"
            class="px-4 py-1 rounded-full">
            شركات
        </button>

        <button
            type="button"
            @click="selected='labor'"
            :class="selected=='labor'
            ? 'bg-[#2f4597] text-white'
        : 'bg-gray-100 text-gray-600'"
            class="px-4 py-1 rounded-full">
            عمالي
        </button>

    </div>

    <input
        type="hidden"
        name="consulation_type"
        x-model="selected">

    <input
        type="text"
        name="beneficiary"
        placeholder="اسم المستفيد"
        class="w-full bg-gray-100 rounded-xl px-4 py-3">

    <input
        type="text"
        name="title"
        placeholder="عنوان الاستشارة"
        class="w-full bg-gray-100 rounded-xl px-4 py-3">

    <textarea
        name="description"
        rows="4"
        placeholder="وصف الاستشارة"
        class="w-full bg-gray-100 rounded-xl px-4 py-3"></textarea>

    <button
        type="submit"
        class="bg-[#2f4597] text-white px-6 py-2 rounded-lg">
        إرسال الطلب
    </button>

</form>
</div>
</div> 
<!-- ================= FOOTER ================= -->
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
</html>