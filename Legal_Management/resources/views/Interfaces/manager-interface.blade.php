<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة الاستشارات القانونية</title>
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

<header class="bg-wadimakkah-dark text-white shadow-lg">
    <div class="text-white px-16 py-6 flex items-center justify-between">
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">
        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('manager.interface') }}" class="hover:text-wadimakkah-light transition">الرئيسية</a>
            <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
            <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
            <a href="{{ route('legal.manager') }}" class="hover:text-wadimakkah-light transition">الاستشارات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>
        <div class="flex items-center gap-6">
            <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
        </div>
    </div>
</header>

<main class="container mx-auto px-6 py-10 flex-grow">
    <div class="mt-10 text-center">
        <h1 class="text-3xl font-bold text-gray-800">منصة الإدارة القانونية</h1>
        <p class="text-gray-500 mt-2 mb-8">المنصة الموحدة للإدارة القانونية بشركة وادي مكة</p>
    </div>

    <div class="flex justify-center mt-6 px-10 mb-12">
        <div class="flex items-center bg-white shadow-md rounded-lg w-full max-w-3xl px-4 py-3 border border-gray-200">
            <i class="fas fa-search text-gray-400 ml-2"></i>
            <input type="text" placeholder="ابحث عن قضية، عقد، استشارة، مستند، رقم مرجعي..." class="flex-1 outline-none text-sm bg-transparent">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
            <p class="text-gray-600 font-bold mb-2">إجمالي القضايا</p>
            <span class="text-5xl font-black text-[#1e3a8a]">{{ $stats['total_cases'] ?? 0 }}</span>
        </div>
        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
            <p class="text-gray-600 font-bold mb-2">إجمالي العقود</p>
            <span class="text-5xl font-black text-[#1e3a8a]">{{ $stats['total_contracts'] ?? 0 }}</span>
        </div>
        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
            <p class="text-gray-600 font-bold mb-2">إجمالي الاستشارات</p>
            <span class="text-5xl font-black text-[#1e3a8a]">{{ $stats['total_consultations'] ?? 0 }}</span>
        </div>
    </div>

    <div class="container mx-auto mb-12">
        <h2 class="text-xl font-bold text-gray-700 mb-6">الإدارات</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <h3 class="font-bold text-lg mb-2">القضايا</h3>
                <p class="text-gray-500 text-sm mb-6">استعرض القضايا، اعتمد طلباتها، أو أغلقها.</p>
                <a href="#" class="block bg-gray-100 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">الانتقال إلى الصفحة</a>
            </div>

           <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <h3 class="font-bold text-lg mb-2">العقود</h3>
                <p class="text-gray-500 text-sm mb-6">اطلع على العقود، وقدم إعتمادات أو الرفض عليها.</p>
                <a href="#" class="block bg-gray-100 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">الانتقال إلى الصفحة</a>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <h3 class="font-bold text-lg mb-2">الاستشارات القانونية</h3>
                <p class="text-gray-500 text-sm mb-6">اطلع على الاستشارات، وقدم إعتماداتك.</p>
                <a href="{{ route('legal.manager') }}" class="block bg-gray-100 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">الانتقال إلى الصفحة</a>
            </div>
        </div>
    </div>

    <h2 class="text-xl font-bold text-gray-700 mb-6">إسناد المهام</h2>
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-center border-collapse text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">رقم المحامي</th>
                        <th class="p-4 text-center">اسم المحامي</th>
                        <th class="p-4 text-center">عدد المهام</th>
                        <th class="p-4 text-center">الإجراء</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($lawyers as $lawyer)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">#{{ $lawyer->user_id }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">{{ $lawyer->full_name }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">
                            {{-- عرض عدد المهام المسندة حالياً --}}
                            {{ \App\Models\Task::where('assigned_to', $lawyer->user_id)->count() }}
                        </td>
                        <td class="px-4 py-4 text-center">
                            <button onclick="openAssignModal({{ $lawyer->user_id }}, '{{ $lawyer->full_name }}')" class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">
                                إسناد مهمة
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-500">لا يوجد موظفين قانونيين حالياً.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="assignModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">إسناد مهمة</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                      أنت الآن تقوم بإسناد مهمة للمحامي/ة: <span id="modalLawyerName" class="font-bold text-wadimakkah-dark"></span>
                    </p>
                    <form action="{{ route('tasks.assign') }}" method="POST" class="mt-4" id="assignTaskForm">
                        @csrf
                        <input type="hidden" name="assigned_to" id="lawyerIdInput">
                        <input type="text" name="title" class="w-full border border-gray-300 rounded-md p-2 text-sm mb-3" placeholder="عنوان المهمة" required>
                        <textarea name="description" class="w-full border border-gray-300 rounded-md p-2 text-sm mb-2" placeholder="اكتب تفاصيل المهمة هنا..." required></textarea>
                         
                        <select name="priority" class="w-full border border-gray-300 rounded-md p-2 text-sm mb-6">
                            <option value="" disabled selected>الأولوية</option>
                            <option value="low">منخفض</option>
                            <option value="medium">متوسط</option>
                            <option value="high">عالي</option>
                        </select>

                        <div class="flex gap-3 items-center">
                            <button type="submit" class="flex-1 px-4 py-2 bg-wadimakkah-dark text-white text-sm font-medium rounded-md w-full shadow-sm hover:bg-blue-800 transition">
                                تأكيد الإسناد
                            </button>

                            <button type="button" onclick="closeAssignModal()" class="flex-1 px-4 py-2 bg-gray-400 text-white text-sm font-medium rounded-md w-full shadow-sm hover:bg-gray-500 transition">
                                إلغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
    function openAssignModal(lawyerId, lawyerName) {
        document.getElementById('modalLawyerName').innerText = lawyerName;

        document.getElementById('lawyerIdInput').value = lawyerId;

        document.getElementById('assignModal').classList.remove('hidden');
    }

    function closeAssignModal() {
        const modal = document.getElementById('assignModal');
        if (modal) {
            modal.classList.add('hidden');
        }
    }
</script>
</body>
</html>