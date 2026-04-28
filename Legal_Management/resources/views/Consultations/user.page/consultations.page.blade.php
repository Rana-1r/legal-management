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

    <!-- 🔷 Navbar -->
    <div class="bg-[#344C93] text-white px-10 py-4 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <span class="text-sm">الرئيسية</span>
            <span class="text-sm">قضايا</span>
            <span class="text-sm">عقود</span>
            <span class="text-sm font-bold">استشارات</span>
        </div>

        <div class="flex items-center gap-4">
            <span>👤</span>
            <span>🔔</span>
            <span>⚙️</span>
        </div>
    </div>

    <!-- 🔷 Container -->
    <div class="px-10 py-8">

        <!-- Title -->
        <div class="mb-6">
            <h2 class="text-sm text-gray-500">الرئيسية / الاستشارات القانونية</h2>
            <h1 class="text-2xl font-bold">إدارة الاستشارات القانونية</h1>
        </div>

        <!-- 🔍 Search -->
        <div class="mb-6">
            <input type="text"
                placeholder="ابحث عن استشارة..."
                class="w-full bg-white px-4 py-3 rounded-lg shadow outline-none text-sm">
        </div>

        <!-- 📊 Status Cards -->
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

        <!-- 🧩 Services -->
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

</body>
</html>
