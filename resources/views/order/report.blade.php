@include('layouts.header')
<div class="container mx-auto my-3 bg-white rounded-lg">
    <div class="flex flex-col p-3">
        <h3 class="p-3 text-lg font-medium">Báo cáo đơn hàng</h3>
        @if (!$exist)
        <div class="p-3">
            <form action="{{route('user.order.reportSend', $order->id)}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$order->id}}">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lý do</label>
                <textarea name="message" id="message" rows="4"
                    class="block p-2.5 mb-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
                <button type="submit"
                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Báo
                    cáo</button>
            </form>
        </div>
        @else
        <div class="flex justify-center p-3">
            <ol class="space-y-4 w-72">
                <li>
                    <div class="w-full p-4 text-green-700 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:border-green-800 dark:text-green-400"
                        role="alert">
                        <div class="flex items-center justify-between">
                            <span class="sr-only">Gửi báo cáo</span>
                            <h3 class="font-medium">1. Gửi báo cáo</h3>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w-full p-4 {{($report->status >= 1 || $report->status == -1) ? " text-green-700
                        border-green-300 bg-green-50" : "text-blue-700 bg-blue-100 border-blue-300" }} border rounded-lg
                        dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400" role="alert">
                        <div class="flex items-center justify-between">
                            <span class="sr-only">Liên hệ</span>
                            <h3 class="font-medium">2. Liên hệ</h3>

                            @if ($report->status >= 1 || $report->status == -1)
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @else
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @endif
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w-full p-4 {{($report->status >= 2 || $report->status == -1) ? " text-green-700
                        border-green-300 bg-green-50" : "text-blue-700 bg-blue-100 border-blue-300" }} border rounded-lg
                        dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400" role="alert">
                        <div class="flex items-center justify-between">
                            <span class="sr-only">Xem xét</span>
                            <h3 class="font-medium">3. Xem xét</h3>
                            @if ($report->status >= 2 || $report->status == -1)
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @else
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            @endif
                        </div>
                    </div>
                </li>
                <li>
                    @if ($report->status == 2)
                    <div class="w-full p-4 text-green-700 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:border-blue-800 dark:text-blue-400"
                        role="alert">
                        @elseif ($report->status == -1)
                        <div class="w-full p-4 text-red-900 bg-red-100 border border-red-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                            role="alert">
                            @else
                            <div class="w-full p-4 text-blue-700 bg-blue-100 border border-blue-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                role="alert">
                                @endif
                                <div class="flex items-center justify-between">
                                    <span class="sr-only">Hoàn tiền</span>
                                    <h3 class="font-medium">4. Hoàn tiền</h3>
                                    @if ($report->status == -1)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    @elseif ($report->status == 2)
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>

                                    @else
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    @endif
                                </div>
                            </div>
                </li>
                <li>
                    <button onclick="deleteReport()"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Huỷ
                        báo cáo</button>
                </li>
            </ol>
        </div>
        <p class="text-xs text-center">Báo cáo cập nhật lần cuối vào lúc {{$report->updated_at}}</p>
        @push("scripts")
        <script>
            function deleteReport() {
                Swal.fire({
                    title: 'Cảnh báo!',
                    text: "Bạn có chắc chắn muốn huỷ đơn báo cáo không?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xoá',
                    cancelButtonText: 'Không',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{route("user.order.delete", $order->id)}}',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: '{{$report->id}}'
                            },
                            type: 'DELETE',
                            success: function (result) {
                                if (result.success) {
                                    Swal.fire(
                                        'Thành công',
                                        result.message,
                                        'success'
                                    )
                                    new Promise(resolve => {
                                        setTimeout(resolve, 2000)
                                        window.location.reload()
                                    })
                                }
                            },
                            error: function (error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: error.responseJSON.message,
                                })
                            }
                        });
                    }
                })
            }
        </script>
        @endpush
        @endif

    </div>
</div>
@include('layouts.footer')