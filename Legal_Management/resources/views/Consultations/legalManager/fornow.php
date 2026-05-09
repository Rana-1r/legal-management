<div id="assignModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">تعيين مهمة للمحامي</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    أنت الآن تقوم بتعيين مهمة للمحامي: <span id="modalLawyerName" class="font-bold text-blue-800"></span>
                </p>
        
               <form action="{{ route('tasks.assign') }}" method="POST" class="mt-4">
    @csrf
    <!-- غيرنا الاسم من lawyer_id إلى assigned_to ليتطابق مع الـ validate -->
    <input type="hidden" name="assigned_to" id="lawyerIdInput">

    <!-- أضف حقل العنوان (Title) لأنه مطلوب (Required) في الكونترولر -->
    <input type="text" name="title" class="w-full border rounded-md p-2 text-sm mb-3" placeholder="عنوان المهمة" required>

    <!-- غيرنا الاسم من task_description إلى description -->
    <textarea name="description" class="w-full border rounded-md p-2 text-sm" placeholder="اكتب تفاصيل المهمة هنا..." required></textarea>
    
    <!-- أضف حقل الأولوية (Priority) لأنه مطلوب أيضاً في الـ validate -->
    <select name="priority" class="w-full border rounded-md p-2 text-sm mt-3">
        <option value="" selected>الأولوية</option>
        <option value="">منخفض</option>
        <option value="">متوسط</option>
        <option value="">عالي</option>
    </select>

    <div class="flex gap-3 items-center px-4 py-3 mt-4">
                        <button type="submit" class="w-full px-4 py-2 bg-wadimakkah-dark text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            تأكيد التعيين
                        </button>

                        <button onclick="closeAssignModal()" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    إلغاء
                </button>
                    </div>
</form>
            </div>
        </div>
    </div>
</div>