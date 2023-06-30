@include('layouts.header')
<div class="flex gap-8">
    @include('seller.frontend.sidebar')
    <main class="w-3/4 h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit Product
            </h2>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">

                    <div class="relative overflow-x-auto">

                        <form action="{{route('seller.myProduct.update', $product->id)}}" method="POST">
                            @csrf
                            <div class="grid gap-6 mb-6">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên sản
                                        phẩm</label>
                                    <input type="text" id="name" name="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{$product->name}}" required>
                                </div>
                                <div>
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chi tiết
                                        sản phẩm</label>
                                    <textarea name="description"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        rows="3" value="{{$product->description}}" required></textarea>
                                </div>

                                <div>
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá</label>
                                    <input type="number" id="price" name="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{number_format($product->price)}}" required>
                                </div>
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng
                                        thái</label>
                                    <select id="status" name="status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="0">Ngừng bán</option>
                                        <option value="1">Mở bán</option>
                                    </select>
                                </div>

                                <div>
                                    <button type="submit"
                                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                        Save
                                    </button>
                                </div>
                        </form>

                    </div>
                    <p class="mt-3 text-xs"></p>
                </div>
            </div>
        </div>
    </main>
</div>
@include('layouts.footer')