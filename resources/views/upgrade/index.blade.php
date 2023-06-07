@include('layouts.header')
<div class="container mx-auto my-3 bg-white rounded-lg">
    <div class="flex flex-col p-3">
        <div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Upgrade
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Nâng cấp lên người bán
                            (Seller), bạn sẽ có cơ hội kiếm tiền trên nền tảng {{env("SITE_NAME")}}. Chỉ với phí đăng ký
                            {{number_format($generalSettings->upgrade_fee)}} VNĐ / 1 tháng.</p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                Thành viên thường (Member)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Người bán (Seller)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">
                                Mua hàng
                            </td>
                            <td class="px-6 py-4">
                                ✓
                            </td>
                            <td class="px-6 py-4">
                                ✓
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">
                                Bán hàng
                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">
                                ✓
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">
                                Nạp tiền
                            </td>
                            <td class="px-6 py-4">
                                ✓
                            </td>
                            <td class="px-6 py-4">
                                ✓
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">
                                Rút tiền
                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">
                                ✓
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">
                                @if (!$request)
                                <form action="{{route('user.confirmUpgrade')}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="relative">
                                        <input type="file" id="floating_outlined" name="image"
                                            accept="image/png, image/gif, image/jpeg"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                            CCCD / GPLX</label>
                                    </div>
                                    <button
                                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                        <span
                                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Đăng ký
                                        </span>
                                    </button>
                                </form>
                                @else
                                <script>
                                    Swal.fire(
                                        'Chờ nhé',
                                        'Bạn đã gửi yêu cầu lên hệ thống. Vui lòng chờ duyệt nhé',
                                        'info'
                                    )
                                </script>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@include('layouts.footer')