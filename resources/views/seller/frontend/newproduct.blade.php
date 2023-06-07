@include('layouts.header')
<div class="flex gap-8">
    @include('seller.frontend.sidebar')
    <main class="w-3/4 h-full overflow-y-auto">
        <div class="container px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Thông tin sản phẩm mới
            </h2>
            <form action="{{route('seller.storeProduct')}}" method="POST">
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tên sản phẩm</span>
                        <input
                            class="rounded-lg shadow-sm block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Nhập tên sản phẩm" />
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Chi tiết</span>
                        <textarea
                            class="rounded-lg shadow-sm block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Nhập chi tiết sản phẩm"></textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Giá</span>
                        <input
                            class="rounded-lg shadow-sm block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Giá" />
                    </label>

                    <label class="rounded-lg shadow-sm block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Danh mục
                        </span>
                        <select
                            class="rounded-lg shadow-sm block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Bảo hành</span>
                        <input
                            class="rounded-lg shadow-sm block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="" />
                    </label>

                    <div class="mt-4 text-sm justify-end">
                        <div>
                            <span class="text-gray-700 dark:text-gray-400">
                                Ảnh sản phẩm
                            </span>
                        </div>
                        <div>
                            <input id="upload" type="file" accept="image/*"
                                class=" rounded-lg shadow-sm w-1/4 mt-1 text-sm focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" />
                        </div>
                    </div>

                    <div class="justify-center mt-4">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>