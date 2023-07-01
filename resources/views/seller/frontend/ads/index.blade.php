@include('layouts.header')
<div class="flex gap-8">
    @include('seller.frontend.sidebar')
    <main class="w-3/4 h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="flex justify-between mt-3">
                <h2 class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Chạy quảng cáo sản phẩm
                </h2>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tên sản phẩm
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Danh mục
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Số tiền còn lại
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Trạng thái
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ads as $ad)
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$ad->products->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$ad->products->category->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{number_format($ad->price)}} VNĐ
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$ad->status ? "Running" : "Stopped"}}
                                    </td>
                                    <!-- Thêm sản phẩm chạy quảng cáo -->
                                    <td class="px-6 py-4 ">
                                        <div class="flex flex-row">
                                            <a href="{{route('seller.ads.detail', $ad->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-6 h-6">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="mt-3 text-xs"></p>
                </div>
            </div>
        </div>
    </main>
</div>