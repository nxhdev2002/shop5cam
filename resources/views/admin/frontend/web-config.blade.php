@push('script')
<script>
    function updateWebConfig() {
        let upgrade_fee = $('#upgrade_fee').val()
        let fixed_fee = $('#order_fixed_fee').val()
        let percent_fee = $('#order_percent_fee').val()
        let notification_time = $('#notification_display_time').val()
        $.ajax({
            url: "/admin/web-config/update",
            type: "PUT",
            data: {
                upgrade_fee: upgrade_fee,
                order_fixed_fee: fixed_fee,
                order_percent_fee: percent_fee,
                notification_time: notification_time,
                _token: '{{csrf_token()}}'
            },
            success: function (data) {
                Swal.fire(
                    'Thành công',
                    data.message,
                    'success'
                )
            },
            error: function (error) {
                console.log(error)
            }
        });
    }
</script>
@endpush
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <!-- Desktop sidebar -->
    @include('admin.layouts.sidebar')
    <div class="flex flex-col flex-1 w-full">
        @include('admin.layouts.header')
        <main class="h-full pb-16 overflow-y-auto">
            <div class="container grid px-6 mx-auto">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Config
                </h2>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="upgrade_fee"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phí nâng cấp lên
                            người bán (VNĐ)</label>
                        <input type="text" id="upgrade_fee"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{$webConfig->upgrade_fee}}" required>
                    </div>
                    <div>
                        <label for="order_fixed_fee"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phí cố định / giao
                            dịch (VNĐ)</label>
                        <input type="text" id="order_fixed_fee"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{$webConfig->order_fixed_fee}}" required>
                    </div>
                    <div>
                        <label for="order_percent_fee"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phí phần trăm /
                            giao dịch (%)</label>
                        <input type="text" id="order_percent_fee"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{$webConfig->order_percent_fee}}" required>
                    </div>
                    <div>
                        <label for="notification_display_time"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thời
                            gian hiển thị thông báo. (giờ)</label>
                        <input type="tel" id="notification_display_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{$webConfig->notification_display_time}}" required>
                    </div>
                </div>
                <button type="submit" onclick="updateWebConfig()"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </main>
    </div>
</div>