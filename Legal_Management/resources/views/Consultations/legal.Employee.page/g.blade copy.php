<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة الإدارة القانونية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap'); body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gray-50 pb-10">

    <header class="bg-[#1e3a8a] text-white p-6 flex justify-between items-center">
        <div class="font-bold text-lg">شركة وادي مكة للتقنية</div>
        <nav class="space-x-8 space-x-reverse">
            <a href="#">الرئيسية</a><a href="#">القضايا</a><a href="#">العقود</a>
            <a href="#">الاستشارات</a><a href="#">المستندات والتقارير</a><a href="#">اللغة العربية <i class="fas fa-globe"></i></a>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-center text-2xl font-bold mb-6">منصة الإدارة القانونية</h1>
        
        <div class="max-w-3xl mx-auto bg-white border border-gray-200 rounded-lg p-3 flex items-center shadow-sm mb-10">
            <i class="fas fa-search text-gray-400 mr-2"></i>
            <input type="text" placeholder="ابحث عن قضية، عقد، استشارة، رقم مرجعي" class="flex-grow outline-none px-2">
        </div>

        <div class="grid grid-cols-4 gap-4 mb-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center"><p class="text-gray-500">الإستشارات المسنده</p><h2 class="text-2xl font-bold text-[#1e3a8a]">7</h2></div>
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center"><p class="text-gray-500">القضايا المفتوحه</p><h2 class="text-2xl font-bold text-[#1e3a8a]">10</h2></div>
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center"><p class="text-gray-500">العقود قيد المراجعة</p><h2 class="text-2xl font-bold text-[#1e3a8a]">6</h2></div>
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center"><p class="text-gray-500">اجمالي الطلبات</p><h2 class="text-2xl font-bold text-[#1e3a8a]">19</h2></div>
        </div>

        <div class="grid grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center"><h3 class="font-bold mb-2">القضايا</h3><p class="text-sm text-gray-500 mb-4">استعرض القضايا المسندة لك، تابع حالتها، وحدث بياناتها</p><button class="bg-gray-100 px-4 py-1 rounded">الانتقال إلى الصفحة</button></div>
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center"><h3 class="font-bold mb-2">العقود</h3><p class="text-sm text-gray-500 mb-4">راجع العقود، عدل البنود، وتابع حالات الاعتماد</p><button class="bg-gray-100 px-4 py-1 rounded">الانتقال إلى الصفحة</button></div>
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center"><h3 class="font-bold mb-2">الإستشارات القانونية</h3><p class="text-sm text-gray-500 mb-4">اطلع على الاستشارات، قدم الردود، وأرسلها للاعتماد</p><button class="bg-gray-100 px-4 py-1 rounded">الانتقال إلى الصفحة</button></div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="font-bold mb-4">التنبيهات</h3>
                <ul class="space-y-3">
                    <li class="text-sm"><i class="fas fa-exclamation-triangle text-yellow-500 ml-2"></i> استشاره رقم 3023 متأخرة</li>
                    <li class="text-sm"><i class="fas fa-exclamation-triangle text-yellow-500 ml-2"></i> قضية رقم 3044 بحاجة الى تحديث</li>
                </ul>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="font-bold mb-4">اخر الأنشطة</h3>
                <ul class="space-y-3">
                    <li class="text-sm"><i class="fas fa-check text-green-500 ml-2"></i> تم الرد على الإستشارة رقم 3021</li>
                </ul>
            </div>
        </div>

        <div class="bg-[#1e3a8a] text-white p-3 text-center font-bold">المهام</div>
        <div class="bg-white p-6 rounded-b-lg shadow-sm border border-t-0">
            <div class="flex justify-end gap-6 mb-6 text-sm">
                <span><i class="fas fa-square text-blue-900 ml-1"></i> عاجلة جداً</span>
                <span><i class="fas fa-square text-blue-500 ml-1"></i> متوسطة</span>
            </div>
            <div class="space-y-4">
                <div class="border-r-4 border-blue-900 pr-4 py-2 bg-gray-50">عقد ينتهي خلال 3 أيام</div>
                <div class="border-r-4 border-blue-500 pr-4 py-2 bg-gray-50">استشارة جديدة بانتظار رد</div>
            </div>
        </div>
    </main>
</body>
</html>