<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي | منصة الإدارة القانونية</title>
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

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-wadimakkah-bg dark:bg-gray-900 min-h-screen flex flex-col transition-colors duration-200">

    {{-- الهيدر المطور والموحد --}}
    <header class="bg-wadimakkah-dark text-white shadow-lg">
        <div class="px-16 py-6 flex items-center justify-between flex-wrap gap-4">
            
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20" alt="Logo">
            
            <div class="flex gap-8 text-sm font-medium">
                {{-- تم التعديل هنا: قمنا بتغيير الرابط إلى المسار المعتمد في مشروعك والـ Routes الحالي --}}
                <a href="{{ route('employee.interface') }}" class="hover:text-wadimakkah-light transition text-white">الرئيسية</a>
                <a href="#" class="hover:text-wadimakkah-light transition text-white">القضايا</a>
                <a href="#" class="hover:text-wadimakkah-light transition text-white">العقود</a>
                <a href="{{ Route::has('legal.consultations.index') ? route('legal.consultations.index') : '#' }}" class="hover:text-wadimakkah-light transition text-white">الاستشارات</a>
                <a href="{{ Route::has('employee.tasks') ? route('employee.tasks') : '#' }}" class="hover:text-wadimakkah-light transition text-white">المهام</a>
                <a href="{{ Route::has('legal.employee.record') ? route('legal.employee.record') : '#' }}" class="hover:text-wadimakkah-light transition text-white">السجل</a>
            </div>

            <div class="flex items-center gap-6 relative">
                <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition flex items-center gap-2 group">
                    @if(Auth::check() && Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-8 h-8 rounded-full object-cover border border-white/40 group-hover:border-blue-300 transition shadow-sm">
                    @else
                        <i class="fas fa-user-circle text-2xl"></i>
                    @endif
                    <span class="hidden lg:inline text-xs">مرحباً بك</span>
                </a>
                
                <div class="relative">
                    <button onclick="toggleNotificationDropdown()" id="noti-btn" class="relative hover:text-wadimakkah-light transition text-xl p-1 focus:outline-none">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div id="noti-dropdown" class="hidden absolute left-0 mt-3 w-80 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-xl z-50 p-4 text-right text-gray-800 dark:text-gray-200">
                        <p class="text-xs text-gray-400 text-center">لا توجد إشعارات جديدة حالياً.</p>
                    </div>
                </div>

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
                            
                            {{-- تم التحديث هنا ليعتمد على الـ Route لضمان الاستقرار المباشر --}}
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
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

    {{-- محتوى الصفحة الرئيسي --}}
    <main class="container mx-auto px-6 py-10 flex-grow max-w-5xl">
        
        <div class="mt-6 text-center">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">إعدادات الحساب الشخصي</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 mb-10 text-sm">عرض وإدارة بياناتك الشخصية وتحديثها بسهولة</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            {{-- كارد الصورة الشخصية --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 text-center flex flex-col items-center">
                <h3 class="text-sm font-bold text-gray-700 dark:text-gray-300 mb-6 w-full text-right border-b border-gray-50 dark:border-gray-700 pb-3">الصورة الشخصية</h3>
                
                <form id="photo-upload-form" action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="relative group cursor-pointer">
                    @csrf
                    <div class="w-32 h-32 bg-gray-50 dark:bg-gray-700 p-1.5 rounded-full shadow-inner border-2 border-gray-100 dark:border-gray-600 flex items-center justify-center overflow-hidden transition group-hover:scale-105 duration-200">
                        @if(Auth::check() && Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-full h-full rounded-full object-cover" alt="Profile">
                        @else
                            <i class="fas fa-user-circle text-8xl text-gray-300 dark:text-gray-500"></i>
                        @endif
                    </div>
                    
                    <a href="javascript:void(0)" onclick="document.getElementById('photo-input').click()" class="absolute bottom-1 left-1 bg-wadimakkah-dark hover:bg-blue-800 text-white w-9 h-9 rounded-full flex items-center justify-center shadow-lg border-2 border-white dark:border-gray-800 transition-all active:scale-90">
                        <i class="fas fa-camera text-xs"></i>
                    </a>
                    
                    <input type="file" id="photo-input" name="photo" class="hidden" onchange="document.getElementById('photo-upload-form').submit();">
                </form>

                <div class="mt-4">
                    <h2 class="text-base font-bold text-gray-800 dark:text-white">{{ Auth::user()->name }}</h2>
                    <span class="inline-block bg-blue-50 dark:bg-blue-950/40 text-wadimakkah-dark dark:text-wadimakkah-light text-[11px] font-bold px-3 py-1 rounded-full mt-1.5 border border-blue-100/30">
                        @if(Auth::user()->role_id == 1) مدير الإدارة القانونية @elseif(Auth::user()->role_id == 2) مستشار قانوني @else موظف إدارات داخلية @endif
                    </span>
                </div>
            </div>

            {{-- كارد البيانات الشخصية المكتوبة --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm border border-gray-100 dark:border-gray-700 relative">
                    
                    <button onclick="openEditModal()" class="absolute top-6 left-6 bg-wadimakkah-dark hover:bg-blue-800 text-white font-bold text-xs px-4 py-2 rounded-xl shadow-md transition duration-150 active:scale-95 flex items-center gap-2 cursor-pointer">
                        <i class="fas fa-user-edit text-[11px]"></i> تعديل البيانات
                    </button>

                    <h3 class="text-base font-bold text-gray-800 dark:text-white mb-8 border-b border-gray-50 dark:border-gray-700 pb-3 flex items-center gap-2">
                        <i class="fas fa-id-card text-wadimakkah-light text-sm"></i> بيانات الملف الشخصي
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-xl flex items-center gap-4 border border-gray-100/50 dark:border-gray-700/50">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-950/60 flex items-center justify-center text-wadimakkah-dark dark:text-wadimakkah-light text-base">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold mb-0.5">الاسم الكامل</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-xl flex items-center gap-4 border border-gray-100/50 dark:border-gray-700/50">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-950/60 flex items-center justify-center text-wadimakkah-dark dark:text-wadimakkah-light text-base">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-xs text-gray-400 font-semibold mb-0.5">البريد الإلكتروني</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-gray-200 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-xl flex items-center gap-4 border border-gray-100/50 dark:border-gray-700/50">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-950/60 flex items-center justify-center text-wadimakkah-dark dark:text-wadimakkah-light text-base">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold mb-0.5">رقم الجوال</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ Auth::user()->phone ?? 'غير مسجل' }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-xl flex items-center gap-4 border border-gray-100/50 dark:border-gray-700/50">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-950/60 flex items-center justify-center text-wadimakkah-dark dark:text-wadimakkah-light text-base">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold mb-0.5">المسمى الوظيفي</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ Auth::user()->job_title ?? 'مستشار قانوني' }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700/30 p-4 rounded-xl flex items-center gap-4 border border-gray-100/50 dark:border-gray-700/50 md:col-span-2">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-950/60 flex items-center justify-center text-wadimakkah-dark dark:text-wadimakkah-light text-base">
                                <i class="fas fa-building"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold mb-0.5">القسم / الإدارة</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ Auth::user()->department ?? 'الإدارة القانونية' }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    {{-- نافذة التعديل المنبثقة (Modal) --}}
    <div id="edit-profile-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-opacity duration-300">
        <div class="bg-white dark:bg-gray-800 rounded-2xl max-w-xl w-full p-6 shadow-2xl border border-gray-100 dark:border-gray-700 text-right">
            
            <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-4 mb-5">
                <h3 class="text-base font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    <i class="fas fa-user-cog text-wadimakkah-light text-sm"></i> تعديل بيانات الحساب والأمان
                </h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition text-lg focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form id="edit-profile-form" action="{{ route('profile.update') }}" method="POST" class="space-y-4 text-sm">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- الاسم الكامل --}}
                    <div>
                        <label class="block text-gray-600 dark:text-gray-400 font-bold mb-1.5 text-xs">الاسم الكامل <span class="text-red-500">*</span></label>
                        <div class="relative flex items-center">
                            <i class="fas fa-user absolute right-3 text-gray-400 text-xs"></i>
                            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl pr-9 pl-4 py-2 outline-none focus:ring-1 focus:ring-blue-500 text-gray-800 dark:text-gray-100">
                        </div>
                    </div>

                    {{-- رقم الجوال --}}
                    <div>
                        <label class="block text-gray-600 dark:text-gray-400 font-bold mb-1.5 text-xs">رقم الجوال (10 خانات) <span class="text-red-500">*</span></label>
                        <div class="relative flex items-center">
                            <i class="fas fa-phone-alt absolute right-3 text-gray-400 text-xs"></i>
                            <input type="text" id="phone_input" name="phone" value="{{ old('phone', Auth::user()->phone) }}" required maxlength="10" placeholder="05xxxxxxxx" class="w-full bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl pr-9 pl-4 py-2 outline-none focus:ring-1 focus:ring-blue-500 text-gray-800 dark:text-gray-100">
                        </div>
                        <p id="phone_error" class="text-red-500 text-[11px] mt-1 hidden font-semibold">يجب أن يتكون رقم الجوال من 10 خانات تماماً.</p>
                    </div>

                    {{-- البريد الإلكتروني --}}
                    <div class="md:col-span-2">
                        <label class="block text-gray-600 dark:text-gray-400 font-bold mb-1.5 text-xs">البريد الإلكتروني <span class="text-red-500">*</span></label>
                        <div class="relative flex items-center">
                            <i class="fas fa-envelope absolute right-3 text-gray-400 text-xs"></i>
                            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl pr-9 pl-4 py-2 outline-none focus:ring-1 focus:ring-blue-500 text-gray-800 dark:text-gray-100">
                        </div>
                    </div>

                    <div class="md:col-span-2 border-t border-gray-100 dark:border-gray-700/50 pt-3 mt-1">
                        <h4 class="text-xs font-bold text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-1.5">
                            <i class="fas fa-key text-xs text-wadimakkah-light"></i> تحديث كلمة المرور
                        </h4>
                    </div>

                    {{-- كلمة المرور الحالية --}}
                    <div class="md:col-span-2">
                        <label class="block text-gray-600 dark:text-gray-400 font-bold mb-1.5 text-xs">كلمة المرور الحالية</label>
                        <div class="relative flex items-center">
                            <i class="fas fa-lock absolute right-3 text-gray-400 text-xs"></i>
                            <input type="password" id="current_password" name="current_password" placeholder="••••••••" class="w-full bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl pr-9 pl-10 py-2 outline-none focus:ring-1 focus:ring-blue-500 text-gray-800 dark:text-gray-100 placeholder-gray-300">
                            <button type="button" onclick="togglePasswordVisibility('current_password', 'current_pass_icon')" class="absolute left-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 focus:outline-none">
                                <i id="current_pass_icon" class="fas fa-eye text-xs"></i>
                            </button>
                        </div>
                    </div>

                    {{-- كلمة المرور الجديدة --}}
                    <div>
                        <label class="block text-gray-600 dark:text-gray-400 font-bold mb-1.5 text-xs">كلمة المرور الجديدة (اختياري)</label>
                        <div class="relative flex items-center">
                            <i class="fas fa-lock absolute right-3 text-gray-400 text-xs"></i>
                            <input type="password" id="new_password" name="password" placeholder="••••••••" class="w-full bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl pr-9 pl-10 py-2 outline-none focus:ring-1 focus:ring-blue-500 text-gray-800 dark:text-gray-100 placeholder-gray-300">
                            <button type="button" onclick="togglePasswordVisibility('new_password', 'new_pass_icon')" class="absolute left-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 focus:outline-none">
                                <i id="new_pass_icon" class="fas fa-eye text-xs"></i>
                            </button>
                        </div>
                    </div>

                    {{-- تأكيد كلمة المرور الجديدة --}}
                    <div>
                        <label class="block text-gray-600 dark:text-gray-400 font-bold mb-1.5 text-xs">تأكيد كلمة المرور الجديدة</label>
                        <div class="relative flex items-center">
                            <i class="fas fa-lock absolute right-3 text-gray-400 text-xs"></i>
                            <input type="password" id="new_password_confirmation" name="password_confirmation" placeholder="••••••••" class="w-full bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl pr-9 pl-10 py-2 outline-none focus:ring-1 focus:ring-blue-500 text-gray-800 dark:text-gray-100 placeholder-gray-300">
                            <button type="button" onclick="togglePasswordVisibility('new_password_confirmation', 'confirm_pass_icon')" class="absolute left-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 focus:outline-none">
                                <i id="confirm_pass_icon" class="fas fa-eye text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- أزرار التحكم --}}
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 dark:border-gray-700 mt-5">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-bold px-5 py-2 rounded-xl transition duration-150 text-xs">
                        إلغاء
                    </button>
                    <button type="submit" class="bg-wadimakkah-dark hover:bg-blue-800 text-white font-bold px-5 py-2 rounded-xl shadow-md transition duration-150 active:scale-95 flex items-center gap-2 text-xs cursor-pointer">
                        <i class="fas fa-save text-[11px]"></i> حفظ التغييرات
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- الفوتر --}}
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

    {{-- جافا سكريبت النموذج والتحقق والقوائم --}}
    <script>
        // فتح وإغلاق المودال
        function openEditModal() {
            document.getElementById('edit-profile-modal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('edit-profile-modal').classList.add('hidden');
        }

        // إظهار وإخفاء كلمات المرور (العين)
        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        const phoneInput = document.getElementById('phone_input');
        const form = document.getElementById('edit-profile-form');
        const newPassword = document.getElementById('new_password');
        const currentPassword = document.getElementById('current_password');
        const confirmPassword = document.getElementById('new_password_confirmation');

        // منع كتابة أكثر من 10 أرقام أو حروف غير عددية
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, ''); 
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
        });

        // منطق التحقق الإلزامي قبل الحفظ
        form.addEventListener('submit', function(e) {
            let valid = true;

            // 1. تحقق من طول رقم الجوال
            if (phoneInput.value.length !== 10) {
                document.getElementById('phone_error').classList.remove('hidden');
                phoneInput.classList.add('border-red-500');
                valid = false;
            } else {
                document.getElementById('phone_error').classList.add('hidden');
                phoneInput.classList.remove('border-red-500');
            }

            // 2. التحقق من إلزامية حقول كلمات المرور عند كتابة كلمة مرور جديدة
            if (newPassword.value.trim() !== "") {
                if (currentPassword.value.trim() === "") {
                    alert("يرجى إدخال كلمة المرور الحالية لتتمكن من تغييرها.");
                    currentPassword.focus();
                    valid = false;
                } else if (confirmPassword.value.trim() === "") {
                    alert("يرجى تأكيد كلمة المرور الجديدة.");
                    confirmPassword.focus();
                    valid = false;
                } else if (newPassword.value !== confirmPassword.value) {
                    alert("كلمة المرور الجديدة غير متطابقة مع خانة التأكيد.");
                    confirmPassword.focus();
                    valid = false;
                }
            }

            if (!valid) {
                e.preventDefault(); 
            }
        });

        // تشغيل النوافذ المنسدلة للهيدر
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
                icon.className = "fas fa-sun text-yellow-500 text-sm w-4 text-center";
                text.innerText = "المظهر الفاتح";
                badge.innerText = "مفعّل";
                badge.className = "bg-green-100 text-green-700 dark:bg-green-950/50 dark:text-green-400 text-[10px] px-2 py-0.5 rounded-md";
            } else {
                icon.className = "fas fa-moon text-gray-400 text-sm w-4 text-center";
                text.innerText = "المظهر الداكن";
                badge.innerText = "مغلق";
                badge.className = "bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded-md";
            }
        }

        // إغلاق المودال والنوافذ عند النقر بالخارج
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('edit-profile-modal');
            const notiDropdown = document.getElementById('noti-dropdown');
            const notiBtn = document.getElementById('noti-btn');
            const settingsDropdown = document.getElementById('settings-dropdown');
            const settingsBtn = document.getElementById('settings-btn');

            if (event.target === modal) {
                closeEditModal();
            }
            if (notiDropdown && !notiDropdown.classList.contains('hidden') && !notiBtn.contains(event.target) && !notiDropdown.contains(event.target)) {
                notiDropdown.classList.add('hidden');
            }
            if (settingsDropdown && !settingsDropdown.classList.contains('hidden') && !settingsBtn.contains(event.target) && !settingsDropdown.contains(event.target)) {
                settingsDropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>