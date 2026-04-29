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
<div class="bg-[#344C93] text-white px-10 py-4 flex justify-between items-center">

    <!-- اليمين -->
    <div class="flex items-center gap-6 text-sm">
        <a href="#">الرئيسية</a>
        <a href="#">القضايا</a>
        <a href="#">العقود</a>
        <a href="#">الاستشارات</a>
        <a href="#">المستندات والتقارير</a>
    </div>

    <!-- اليسار -->
    <div class="flex items-center gap-4">
        <span>🔔</span>
        <span>⚙️</span>
        <span>👤</span>
    </div>

</div>

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

<!-- ================= FOOTER ================= -->
<div class="bg-[#344C93] text-white mt-16 py-8 text-center">

    <p class="text-sm mb-2">وسائل التواصل الاجتماعي</p>

    <div class="flex justify-center gap-4 text-xl mb-4">
        <span>🌐</span>
        <span>📘</span>
        <span>🐦</span>
        <span>📷</span>
    </div>

    <p class="text-xs text-gray-300">
        جميع الحقوق محفوظة © 2026
    </p>

</div>

</body>
</html>