<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>ملف المستخدم</title>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    
    <div id="view-mode">
        <h3 class="text-2xl font-bold mb-4 border-b pb-2">بيانات المستخدم</h3>
        <div class="grid grid-cols-2 gap-4">
            <p><strong>الاسم:</strong> {{ $user->full_name }}</p>
            <p><strong>القسم:</strong> {{ $user->department }}</p>
            <p><strong>المسمى الوظيفي:</strong> {{ $user->job_title }}</p>
            <p><strong>رقم الهاتف:</strong> {{ $user->phone }}</p>
        </div>
        <button onclick="toggleEdit()" class="mt-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">تعديل البيانات</button>
    </div>

    <form id="edit-mode" action="{{ route('profile.update') }}" method="POST" class="hidden">
        @csrf
        <h3 class="text-2xl font-bold mb-4">تعديل البيانات الشخصية</h3>
        <div class="grid grid-cols-1 gap-4">
            <input type="text" name="full_name" value="{{ $user->full_name }}" class="border p-2 rounded" placeholder="الاسم الكامل">
            <input type="text" name="department" value="{{ $user->department }}" class="border p-2 rounded" placeholder="القسم">
            <input type="text" name="job_title" value="{{ $user->job_title }}" class="border p-2 rounded" placeholder="المسمى الوظيفي">
            <input type="text" name="phone" value="{{ $user->phone }}" class="border p-2 rounded" placeholder="رقم الهاتف">
        </div>
        <div class="mt-6 flex gap-2">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">حفظ البيانات</button>
            <button type="button" onclick="toggleEdit()" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">إلغاء</button>
        </div>
    </form>
</div>

<div class="max-w-4xl mx-auto mt-8 bg-white p-8 rounded-lg shadow-md">
    <h3 class="text-xl font-bold mb-6">
        @if($user->role->role_name == 'موظف قانوني') نسبة إنجاز المهام
        @elseif($user->role->role_name == 'مدير الإدارة القانونية') نسبة المهام المسندة
        @else نسبة النشاط على المنصة
        @endif
    </h3>
    <canvas id="tasksChart" height="100"></canvas>
</div>

<script>
    // التبديل بين العرض والتعديل
    function toggleEdit() {
        const view = document.getElementById('view-mode');
        const edit = document.getElementById('edit-mode');
        view.classList.toggle('hidden');
        edit.classList.toggle('hidden');
    }

    // إعداد الرسم البياني
    const ctx = document.getElementById('tasksChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
            datasets: [{
                label: 'نشاط المستخدم',
                data: [5, 12, 8, 15, 10, 19], // هنا يمكنك وضع البيانات القادمة من الكنترولر
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: { responsive: true }
    });
</script>

</body>
</html>