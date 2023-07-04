@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Products
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Seller</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$product->id}}
                            </th>
                            <td class="px-6 py-4">
                                <img src="{{$product->picture_url}}" alt="">{{$product->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->description}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->amount}}
                            </td>
                            <td class="px-6 py-4">
                                {{number_format($product->price)}} VNĐ
                            </td>
                            <td class="px-6 py-4">
                                {{$product->seller->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->category->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->status ? "Mở bán" : "Ngừng bán"}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->created_at}}
                            </td>
                            <td>
                                <a href="{{route('admin.product.show', $product->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="mt-3 text-xs">{{ $products->links()}}</p>
            </div>
        </div>

    </div>
</main>