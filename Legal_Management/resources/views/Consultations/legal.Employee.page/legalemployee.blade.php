<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم الموظف | منصة الإدارة القانونية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');
        body { font-family: 'Cairo', sans-serif; background-color: #f9fafb; }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <header class="bg-[#1e3a8a] text-white p-6 flex justify-between items-center shadow-md">
        <div class="font-bold text-lg">شركة وادي مكة للتقنية</div>
        <nav class="space-x-8 space-x-reverse text-sm">
            <a href="#" class="hover:text-blue-200">الرئيسية</a>
            <a href="#" class="hover:text-blue-200">القضايا</a>
            <a href="#" class="hover:text-blue-200">العقود</a>
            <a href="#" class="hover:text-blue-200">الاستشارات</a>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8 flex-grow">
        <h1 class="text-center text-2xl font-bold mb-8">لوحة تحكم الموظف القانوني</h1>

        <div class="grid grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center">
                <p class="text-gray-500 text-sm">القضايا المسندة لي</p>
                <h2 class="text-2xl font-bold text-[#1e3a8a] mt-2">{{ $stats['total_assigned'] }}</h2>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center">
                <p class="text-gray-500 text-sm">قيد المراجعة</p>
                <h2 class="text-2xl font-bold text-[#1e3a8a] mt-2">{{ $stats['in_progress'] }}</h2>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border text-center">
                <p class="text-gray-500 text-sm">المكتملة</p>
                <h2 class="text-2xl font-bold text-[#1e3a8a] mt-2">{{ $stats['completed'] }}</h2>
            </div>
        </div>

        <div class="bg-[#1e3a8a] text-white p-3 text-center font-bold rounded-t-lg">المهام المسندة إلي</div>
        <div class="bg-white p-6 rounded-b-lg shadow-sm border border-t-0 mb-10">
            @if($myTasks->isEmpty())
                <p class="text-center text-gray-500">لا توجد مهام مسندة إليك حالياً.</p>
            @else
                <div class="space-y-4">
                    @foreach($myTasks as $task)
                        <div class="border-r-4 border-blue-500 pr-4 py-3 bg-gray-50 flex justify-between items-center">
                            <span>{{ $task->subject ?? 'استشارة قانونية' }}</span>
                            <span class="text-xs text-gray-400">{{ $task->created_at->format('Y/m/d') }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>

    <footer class="bg-[#1e3a8a] text-white py-6 text-center text-sm">
        <p>شركة وادي مكة للتقنية © 2026</p>
    </footer>

</body>
</html>