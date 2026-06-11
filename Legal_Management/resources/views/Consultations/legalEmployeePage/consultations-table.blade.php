<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الاستشارات القانونية | منصة الإدارة القانونية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
    <script>
        tailwind.config = {
            darkMode: 'class',
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

        // الحماية الفورية للـ LocalStorage لمنع الوميض الأبيض أثناء تحميل الصفحة
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-wadimakkah-bg dark:bg-gray-900 min-h-screen flex flex-col transition-colors duration-200">

    {{-- الهيدر الموحد --}}
    <header class="bg-wadimakkah-dark text-white shadow-lg">
        <div class="px-16 py-6 flex items-center justify-between flex-wrap gap-4">
            
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">
            
            {{-- قائمة التنقل الموحدة الألوان متضمنة العناصر الستة المطلوبة بالملي --}}
            {{-- قائمة التنقل الموحدة الألوان متضمنة الحماية التامة من أخطاء الـ Route Not Found --}}
<div class="flex gap-8 text-sm font-medium">
    <a href="{{ route('employee.interface') }}" class="hover:text-wadimakkah-light transition text-white">الرئيسية</a>
    
    <a href="#" class="hover:text-wadimakkah-light transition text-white">القضايا</a>
    
    <a href="#" class="hover:text-wadimakkah-light transition text-white">العقود</a>
    
    <a href="{{ Route::has('legal.consultations.index') ? route('legal.consultations.index') : (Route::has('consultations.table') ? route('consultations.table') : '#') }}" class="hover:text-wadimakkah-light transition text-white">الاستشارات</a>
    
    <a href="{{ Route::has('employee.tasks') ? route('employee.tasks') : '#' }}" class="hover:text-wadimakkah-light transition text-white">المهام</a>
    
    <a href="{{ Route::has('legal.employee.record') ? route('legal.employee.record') : '#' }}" class="hover:text-wadimakkah-light transition text-white">السجل</a>
</div>

            <div class="flex items-center gap-6 relative">
                {{-- الملف الشخصي: يظهر الصورة الشخصية المرفوعة أو الرمز الافتراضي --}}
                <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition flex items-center gap-2 group">
                    @if(Auth::check() && Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-8 h-8 rounded-full object-cover border border-white/40 group-hover:border-blue-300 transition shadow-sm">
                    @else
                        <i class="fas fa-user-circle text-2xl"></i>
                    @endif
                </a>
                
                {{-- الإشعارات --}}
                <div class="relative">
                    <button onclick="toggleNotificationDropdown()" id="noti-btn" class="relative hover:text-wadimakkah-light transition text-xl p-1 focus:outline-none">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div id="noti-dropdown" class="hidden absolute left-0 mt-3 w-80 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-xl z-50 p-4 text-right text-gray-800 dark:text-gray-200">
                        <p class="text-xs text-gray-400 text-center">لا توجد إشعارات جديدة حالياً.</p>
                    </div>
                </div>

                {{-- نافذة الإعدادات المنسدلة الصغيرة المتناسقة تماماً مع ستايل المنصة المطور --}}
                <div class="relative">
                    <button onclick="toggleSettingsDropdown()" id="settings-btn" class="hover:text-blue-300 transition text-xl p-1 focus:outline-none flex items-center justify-center">
                        <i class="fas fa-cog"></i>
                    </button>

                    <div id="settings-dropdown" class="hidden absolute left-0 mt-3 w-60 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-xl z-50 overflow-hidden text-right text-gray-800 dark:text-gray-200">
                        <div class="p-3 bg-wadimakkah-dark text-white border-b border-gray-100 dark:border-gray-700">
                            <span class="font-bold text-xs flex items-center gap-1.5">
                                <i class="fas fa-sliders-h text-wadimakkah-light text-[11px]"></i> إعدادات المنصة
                            </span>
                        </div>
                        <div class="p-2 flex flex-col gap-1 text-xs font-semibold">
                            <button onclick="toggleTheme()" class="w-full flex items-center justify-between p-2.5 rounded-xl hover:bg-blue-50/60 dark:hover:bg-gray-700/50 text-gray-600 dark:text-gray-300 transition duration-150">
                                <div class="flex items-center gap-2">
                                    <i id="theme-icon" class="fas fa-moon text-gray-400 text-sm w-4 text-center"></i>
                                    <span id="theme-text">المظهر الداكن</span>
                                </div>
                                <span id="theme-badge" class="bg-gray-100 dark:bg-gray-700 text-[10px] px-2 py-0.5 rounded-md text-gray-500 dark:text-gray-400">مغلق</span>
                            </button>

                            <hr class="my-1 border-gray-100 dark:border-gray-700">
                            
                            <form action="/logout" method="POST" class="m-0">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="w-full flex items-center gap-2 p-2.5 rounded-xl text-red-600 hover:bg-red-50 dark:hover:bg-red-950/30 transition duration-150 text-right cursor-pointer">
                                    <i class="fas fa-sign-out-alt text-sm w-4 text-center"></i> تسجيل الخروج
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    {{-- محتوى جدول الاستشارات القانونية المحقون يدوياً --}}
    <main class="container mx-auto px-6 py-10 flex-grow max-w-5xl">
        
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">إدارة الاستشارات القانونية</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">استعراض الطلبات المسندة إليك من قِبل المدير وصياغة الردود عليها</p>
        </div>

        {{-- جدول الاستشارات القانونية المسندة للموظف ديناميكياً --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h3 class="font-bold text-lg mb-4 text-gray-800 dark:text-gray-200">الاستشارات القانونية الواردة والمسندة إليك</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 dark:border-gray-700 text-xs font-bold text-gray-400 uppercase tracking-wider">
                            <th class="pb-3">عنوان الاستشارة</th>
                            <th class="pb-3">النوع</th>
                            <th class="pb-3">الحالة الحالية</th>
                            <th class="pb-3 text-left">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-medium">
                        @forelse($consultations as $consultation)
                            <tr class="border-b border-gray-50 dark:border-gray-700/50 hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition">
                                <td class="py-4 text-gray-800 dark:text-gray-200">{{ $consultation->title }}</td>
                                <td class="py-4">
                                    <span class="px-2 py-0.5 bg-blue-50 dark:bg-blue-950 text-wadimakkah-dark dark:text-wadimakkah-light text-xs rounded-md">
                                        {{ $consultation->type }}
                                    </span>
                                </td>
                                <td class="py-4">
                                    <span class="text-xs text-yellow-600 dark:text-yellow-400 font-semibold">
                                        {{ $consultation->status }}
                                    </span>
                                </td>
                                <td class="py-4 text-left">
                                    {{-- عند الضغط على الزر يتم استدعاء دالة الـ JavaScript لفتح المودال وتمرير بيانات هذه الاستشارة بالملي --}}
                                    <button 
                                        onclick="openResponseModal('{{ $consultation->consultation_id }}', '{{ addslashes($consultation->title) }}', '{{ addslashes($consultation->type) }}', '{{ addslashes($consultation->description) }}')" 
                                        class="bg-wadimakkah-dark hover:bg-blue-800 text-white px-4 py-1.5 rounded-lg text-xs font-bold transition cursor-pointer">
                                        صياغة الرد القانوني
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-sm text-gray-400">
                                    <i class="fas fa-inbox text-xl block mb-2 text-gray-300"></i>
                                    لا توجد استشارات قانونية مسندة إليك حالياً من قِبل المدير.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    {{-- النافذة العريضة المنبثقة (Modal) للرد على الاستشارة --}}
    <div id="response-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/50 flex items-center justify-center p-4 transition-opacity duration-200">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 w-full max-w-4xl overflow-hidden flex flex-col my-8">
            
            {{-- رأس النافذة --}}
            <div class="p-4 bg-wadimakkah-dark text-white flex items-center justify-between">
                <h3 class="font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-gavel text-wadimakkah-light"></i> صياغة مذكر الرد القانوني الرسمي
                </h3>
                <button onclick="closeResponseModal()" class="text-white hover:text-red-400 transition text-sm focus:outline-none p-1">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            {{-- نموذج الإرسال الديناميكي --}}
            <form id="modal-response-form" method="POST" enctype="multipart/form-data" class="p-6 flex flex-col gap-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- جانب تفاصيل الاستشارة الواردة --}}
                    <div class="md:col-span-1 flex flex-col gap-4 bg-gray-50 dark:bg-gray-700/30 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                        <div>
                            <label class="text-xs text-gray-400 block mb-1">موضوع الاستشارة</label>
                            <span id="modal-consultation-title" class="text-xs font-bold text-gray-800 dark:text-gray-200"></span>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 block mb-1">التصنيف</label>
                            <span id="modal-consultation-type" class="px-2 py-0.5 bg-blue-100 dark:bg-blue-900 text-wadimakkah-dark dark:text-wadimakkah-light text-[10px] font-bold rounded-md"></span>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 block mb-1">نص ومضمون الطلب</label>
                            <div id="modal-consultation-desc" class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed text-justify max-h-48 overflow-y-auto"></div>
                        </div>
                    </div>

                    {{-- جانب صياغة الرد والمرفقات من الموظف القانوني --}}
                    <div class="md:col-span-2 flex flex-col gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 mb-2">الرد القانوني المستند للوائح والأنظمة <span class="text-red-500">*</span></label>
                            <textarea required name="legal_response" rows="6" placeholder="اكتب رد ومذكرة الإدارة القانونية بشكل مفصل ودقيق هنا..." class="w-full p-3 border border-gray-200 dark:border-gray-700 bg-transparent text-xs rounded-xl outline-none focus:border-wadimakkah-dark dark:focus:border-wadimakkah-light placeholder-gray-400 text-gray-700 dark:text-gray-200 leading-relaxed"></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 mb-2">إرفاق تقارير ومستندات مؤيدة للرد (إن وجد)</label>
                            <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-200 dark:border-gray-700 border-dashed rounded-xl cursor-pointer bg-gray-50/50 dark:bg-gray-700/10 hover:bg-blue-50/20 transition">
                                <div class="flex flex-col items-center justify-center pt-3 pb-3">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-xl mb-1"></i>
                                    <p class="text-[11px] text-gray-500 dark:text-gray-400"><span class="font-bold">اضغط لرفع ملف المرفق الرسمي</span></p>
                                    <p class="text-[9px] text-gray-400">PDF, DOCX, PNG up to 10MB</p>
                                </div>
                                <input type="file" name="employee_attachment" class="hidden" />
                            </label>
                        </div>
                    </div>
                </div>

                {{-- أزرار التحكم الفلي --}}
                <div class="flex items-center justify-end gap-3 border-t border-gray-100 dark:border-gray-700 pt-4">
                    <button type="button" onclick="closeResponseModal()" class="px-5 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-xs font-bold hover:bg-gray-50 dark:hover:bg-gray-700 transition cursor-pointer">
                        إلغاء
                    </button>
                    <button type="submit" class="flex items-center gap-2 bg-wadimakkah-dark hover:bg-blue-800 text-white px-5 py-2 rounded-xl text-xs font-bold shadow-sm transition cursor-pointer">
                        <i class="fas fa-paper-plane text-[9px]"></i> رفع لطلب الاعتماد من المدير
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- الفوتر الموحد --}}
    <footer class="bg-wadimakkah-dark text-white py-12 mt-16 border-t border-gray-700">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10 text-sm">
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

    {{-- سكربت التحكم بالهيدر والفوتر + سكربت المودال مدمجين في النهاية --}}
    <script>
        // دالة فتح النافذة المنبثقة وتعبئة البيانات ديناميكياً
        function openResponseModal(id, title, type, description) {
            document.getElementById('modal-consultation-title').innerText = title;
            document.getElementById('modal-consultation-type').innerText = type;
            document.getElementById('modal-consultation-desc').innerText = description;
            
            // تعديل الأكشن الخاص بالفورم ديناميكياً ليوجه لنفس دالة الحفظ بالـ ID الصحيح
            document.getElementById('modal-response-form').action = `/employee/consultations/${id}/submit`;
            
            // إظهار المودال
            document.getElementById('response-modal').classList.remove('hidden');
        }

        // دالة إغلاق النافذة المنبثقة
        function closeResponseModal() {
            document.getElementById('response-modal').classList.add('hidden');
        }

        // إغلاق المودال إذا تم الضغط خارج الصندوق الأبيض الداخلي له
        window.addEventListener('click', function(event) {
            const responseModal = document.getElementById('response-modal');
            if (event.target === responseModal) {
                closeResponseModal();
            }
        });

        // دوال التحكم بالهيدر والـ Dropdowns
        function toggleNotificationDropdown() {
            document.getElementById('settings-dropdown').classList.add('hidden');
            document.getElementById('noti-dropdown').classList.toggle('hidden');
        }

        function toggleSettingsDropdown() {
            document.getElementById('noti-dropdown').classList.add('hidden');
            document.getElementById('settings-dropdown').classList.toggle('hidden');
            updateThemeDropdownUI();
        }

        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            updateThemeDropdownUI();
        }

        function updateThemeDropdownUI() {
            const isDark = document.documentElement.classList.contains('dark');
            const icon = document.getElementById('theme-icon');
            const text = document.getElementById('theme-text');
            const badge = document.getElementById('theme-badge');

            if (isDark) {
                if(icon) icon.className = "fas fa-sun text-yellow-500 text-sm w-4 text-center";
                if(text) text.innerText = "المظهر الفاتح";
                if(badge) {
                    badge.innerText = "مفعّل";
                    badge.className = "bg-green-100 text-green-700 dark:bg-green-950/50 dark:text-green-400 text-[10px] px-2 py-0.5 rounded-md";
                }
            } else {
                if(icon) icon.className = "fas fa-moon text-gray-400 text-sm w-4 text-center";
                if(text) text.innerText = "المظهر الداكن";
                if(badge) {
                    badge.innerText = "مغلق";
                    badge.className = "bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded-md";
                }
            }
        }

        window.onclick = function(event) {
            const notiDropdown = document.getElementById('noti-dropdown');
            const notiBtn = document.getElementById('noti-btn');
            const settingsDropdown = document.getElementById('settings-dropdown');
            const settingsBtn = document.getElementById('settings-btn');

            if (notiDropdown && !notiDropdown.classList.contains('hidden') && !notiBtn.contains(event.target) && !notiDropdown.contains(event.target)) {
                notiDropdown.classList.add('hidden');
            }
            if (settingsDropdown && !settingsDropdown.classList.contains('hidden') && !settingsBtn.contains(event.target) && !settingsDropdown.contains(event.target)) {
                settingsDropdown.classList.add('hidden');
            }
        }
    </script>
</body>
</html>