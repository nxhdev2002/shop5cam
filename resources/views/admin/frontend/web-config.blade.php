@push('script')
<script>
    function closeWebConfigModal() {
        const modal = document.getElementById("webConfigModal");
        modal.classList.add("modal-close");

        // Xóa lớp modal-close sau khi hoàn thành hiệu ứng đóng
        setTimeout(() => {
            modal.classList.remove("modal-close");
            modal.classList.add("hidden");

            // Xóa giá trị các trường input
            const inputFields = modal.querySelectorAll("input");
            inputFields.forEach((input) => {
                input.value = "";
            });
        }, 300);
    }
    function updateWebConfig() {

    }
</script>
@endpush
<style>
    .modal-open {
        overflow: hidden;
    }

    .modal-close {
        animation: modal-close-animation 0.3s ease-out;
        animation-fill-mode: forwards;
    }

    @keyframes modal-close-animation {
        0% {
            opacity: 1;
            transform: translate(0, 0);
        }

        100% {
            opacity: 0;
            transform: translate(0, -20px);
        }
    }
</style>
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <!-- Desktop sidebar -->
    @include('admin.layouts.sidebar')
    <div class="flex flex-col flex-1 w-full">
        @include('admin.layouts.header')
        <table class="mx-6 w-full whitespace-no-wrap">
            <div class="flex flex-row p-4 justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Web Config
                </h2>
            </div>
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Id</th>
                    <th class="px-4 py-3">Update_fee</th>
                    <th class="px-4 py-3">Order_fixed_fee</th>
                    <th class="px-4 py-3">Order_percent_fee</th>
                    <th class="px-4 py-3">Notification_display_time</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        ID
                    </td>
                    <td class="px-4 py-3">
                        ID
                    </td>
                    <td class="px-4 py-3">
                        ID
                    </td>
                    <td class="px-4 py-3">
                        ID
                    </td>
                    <td class="px-4 py-3">
                        ID
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <div class="text-blue-500 hover:text-blue-700">
                                <button id="webConfigModalButton" data-modal-toggle="webConfigModal"
                                    onclick="updateWebConfig()"
                                    class="block text-black bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                            </div>
                            <div id="webConfigModal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-modal">
                                <div class="relative p-4 w-full max-w-2xl">
                                    <!-- Modal content -->
                                    <div class="relative p-4 bg-white rounded-lg shadow sm:p-5 dark:bg-gray-800">
                                        <!-- Modal header -->
                                        <div
                                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Web Config
                                            </h3>
                                            <button type="button" onclick="closeWebConfigModal()"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="updateProductModal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.4142.828L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close Modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upgrade
                                                    Fee:</label>
                                                <input type="text" name="update_fee" id="update_fee" value=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="">
                                            </div>
                                            <div>
                                                <label for="status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order
                                                    Fixed Fee:</label>
                                                <input type="text" name="fixed_fee" id="fixed_fee" value=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order
                                                    Percent Fee:</label>
                                                <input type="text" name="percent_fee" id="percent_fee" value=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="">
                                            </div>
                                            <div>
                                                <label for="noti_time"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notification
                                                    Display Time:</label>
                                                <input type="text" name="notification_time" id="notification_time"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="justify-center flex items-center space-x-4">
                                            <button type="submit" onclick="updateWebConfig()"
                                                class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cập
                                                nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>