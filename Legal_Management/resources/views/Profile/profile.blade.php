<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملف المستخدم | شركة وادي مكة للتقنية</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script>
        // إعدادات Tailwind لتخصيص الألوان بناءً على الشعار
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'wadimakkah-dark': '#1e3a8a', // الأزرق الداكن (الهيدر والبطاقة)
                        'wadimakkah-light': '#60a5fa', // الأزرق الفاتح (الزر والرسم)
                        'wadimakkah-bg': '#f9fafb', // خلفية الصفحة
                    }
                }
            }
        }
    </script>
    <style>
        /* خطوط مخصصة للحصول على مظهر احترافي */
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
        }

        /* تأثيرات خاصة لإخفاء الحقول في وضع العرض */
        .hidden-fields {
            display: none !important;
        }

        .edit-input {
            border-bottom-width: 2px !important;
            border-color: #d1d5db !important;
        }
    </style>
</head>

<body class="bg-wadimakkah-bg antialiased">

    <header class="bg-[#2D3E8D] text-white shadow-lg">
        <div class="bg-[#344C93] text-white px-16 py-6 flex items-center justify-between">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

            <div class="flex gap-8 text-sm font-medium">
                <a href="#" class="hover:text-wadimakkah-light transition">الرئيسية</a>
                <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
                <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
                <a href="#" class="hover:text-wadimakkah-light transition">الاستشارات</a>
                <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
                <a href="#" class="hover:text-wadimakkah-light transition">
                    اللغة العربية
                    <i class="fas fa-globe text-wadimakkah-light"></i>
                </a>
            </div>

            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold text-gray-800 mb-10">ملف المستخدم</h1>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-12">

            <div class="bg-wadimakkah-light p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-extrabold mb-1">مرحباً، {{ explode(' ', $user->full_name)[0] }}</h2>
                        <p class="text-sm opacity-90">الانضمام في: {{ $user->created_at ? $user->created_at->format('Y/m/d') : '2026/02/1' }}</p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="flex gap-10">
                    <div class="flex-shrink-0 text-center w-40">
                        <div class="w-36 h-36 rounded-full bg-gray-200 border-4 border-white shadow-inner mx-auto flex items-center justify-center mb-3 overflow-hidden">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Image" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-user text-gray-400 text-6xl"></i>
                            @endif
                        </div>

                        <h4 class="text-lg font-bold text-gray-800">{{ $user->full_name }}</h4>
                        <p class="text-xs text-gray-500 mb-3">{{ $user->email }}</p>

                        <form id="photo-upload-form" action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="photo" id="photo-input" class="hidden" accept="image/*" onchange="document.getElementById('photo-upload-form').submit()">
                        </form>

                        <a href="javascript:void(0)" onclick="document.getElementById('photo-input').click()" class="text-wadimakkah-light text-xs font-semibold hover:underline">
                            تعديل الصورة
                        </a>
                    </div>

                    <div class="flex-grow">
                        <form id="edit-mode-form" action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-x-12 gap-y-6">

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">الاسم الكامل</label>
                                    <p id="view-full_name" class="text-blue-800 p-2 border-b-2 border-transparent">{{ $user->full_name }}</p>
                                    <input type="text" name="full_name" value="{{ $user->full_name }}" class="edit-input hidden w-full p-2 rounded-md border focus:border-wadimakkah-light focus:ring-1 focus:ring-wadimakkah-light transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">البريد الإلكتروني</label>
                                    <p id="view-email" class="text-gray-800 p-2 border-b-2 border-transparent">{{ $user->email }}</p>
                                    <input type="email" name="email" value="{{ $user->email }}" class="edit-input hidden w-full p-2 rounded-md border focus:border-wadimakkah-light focus:ring-1 focus:ring-wadimakkah-light transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">القسم</label>
    
                                    <p id="view-department" class="text-blue-800 p-2 border-b-2 border-transparent">
                                    {{ $user->department ?? 'غير محدد' }}
                                    </p>
    
                                    <select name="department" class="edit-input hidden w-full p-2 rounded-md border focus:border-wadimakkah-light focus:ring-1 focus:ring-wadimakkah-light transition">
                                        <option value="" disabled {{ !$user->department ? 'selected' : '' }}>اختر القسم...</option>
                                        <option value="تقنية المعلومات" {{ $user->department == 'تقنية المعلومات' ? 'selected' : '' }}>تقنية المعلومات</option>
                                        <option value="الإدارة القانونية" {{ $user->department == 'الإدارة القانونية' ? 'selected' : '' }}>الإدارة القانونية</option>
                                        <option value="التسويق" {{ $user->department == 'التسويق' ? 'selected' : '' }}>التسويق</option>
                                        <option value="المالية" {{ $user->department == 'المالية' ? 'selected' : '' }}>المالية</option>
                                        <option value="الإدارة العليا" {{ $user->department == 'الإدارة العليا' ? 'selected' : '' }}>الإدارة العليا</option>
                                        <option value="الموارد البشرية" {{ $user->department == 'الموارد البشرية' ? 'selected' : '' }}>الموارد البشرية</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">المسمى الوظيفي</label>
                                    <p id="view-job_title" class="text-blue-800 p-2 border-b-2 border-transparent">{{ $user->job_title ?? 'غير محدد' }}</p>
                                    <input type="text" name="job_title" value="{{ $user->job_title }}" class="edit-input hidden w-full p-2 rounded-md border focus:border-wadimakkah-light focus:ring-1 focus:ring-wadimakkah-light transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">رقم الهاتف</label>
                                    <p id="view-phone" class="text-blue-800 p-2 border-b-2 border-transparent">{{ $user->phone ?? 'غير مضاف' }}</p>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="edit-input hidden w-full p-2 rounded-md border focus:border-wadimakkah-light focus:ring-1 focus:ring-wadimakkah-light transition">
                                </div>
                            </div>

                            <div class="mt-10 flex gap-4 justify-end">
                                <button type="button" id="toggle-edit-btn" onclick="toggleEditMode()" class="bg-wadimakkah-light text-white px-8 py-2.5 rounded-lg shadow-sm hover:bg-wadimakkah-dark transition text-sm font-semibold">تعديل البيانات</button>
                                <button type="submit" id="save-btn" class="hidden bg-green-600 text-white px-8 py-2.5 rounded-lg shadow-sm hover:bg-green-700 transition text-sm font-semibold">حفظ البيانات</button>
                                <button type="button" id="cancel-btn" onclick="toggleEditMode()" class="hidden bg-gray-200 text-gray-700 px-8 py-2.5 rounded-lg shadow-sm hover:bg-gray-300 transition text-sm font-semibold">إلغاء</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-8 border-r-4 border-wadimakkah-light pr-3">نسبة إنجاز المهام</h3>
            <div class="h-64">
                <canvas id="tasksChart"></canvas>
            </div>
        </div>

    </main>

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

    <script>
        // دالة للتبديل بين وضع العرض ووضع التعديل
        function toggleEditMode() {
            // جلب العناصر
            const viewParagraphs = document.querySelectorAll('[id^="view-"]');
            const editInputs = document.querySelectorAll('.edit-input');
            const toggleBtn = document.getElementById('toggle-edit-btn');
            const saveBtn = document.getElementById('save-btn');
            const cancelBtn = document.getElementById('cancel-btn');

            // تبديل الرؤية
            viewParagraphs.forEach(p => p.classList.toggle('hidden'));
            editInputs.forEach(input => input.classList.toggle('hidden'));
            toggleBtn.classList.toggle('hidden');
            saveBtn.classList.toggle('hidden');
            cancelBtn.classList.toggle('hidden');
        }

        // إعداد الرسم البياني (Chart.js)
        const ctx = document.getElementById('tasksChart').getContext('2d');

        // تدرج لوني للخلفية (مثل الصورة)
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(96, 165, 250, 0.5)'); // أزرق فاتح شفاف
        gradient.addColorStop(1, 'rgba(96, 165, 250, 0.0)'); // شفاف تماماً

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
                datasets: [{
                    label: 'عدد المهام المنجزة',
                    data: [18, 11, 15, 12, 11, 19, 11, 15, 13, 10, 17, 14], // بيانات تجريبية (يجب استبدالها ببيانات الكنترولر)
                    borderColor: '#60a5fa', // أزرق فاتح للخط
                    borderWidth: 3,
                    backgroundColor: gradient, // استخدام التدرج اللوني
                    fill: true, // ملء ما تحت المنحنى
                    tension: 0.4, // انحناء المنحنى
                    pointRadius: 5, // إظهار النقاط
                    pointBackgroundColor: '#60a5fa',
                    pointBorderColor: 'white',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    }, // إخفاء خطوط الشبكة العمودية
                    y: {
                        beginAtZero: true,
                        max: 20,
                        grid: {
                            borderDash: [5, 5]
                        }, // خطوط شبكة أفقية منقطة
                        ticks: {
                            stepSize: 5
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    } // إخفاء وسيلة الإيضاح
                }
            }
        });
    </script>

</body>

</html>