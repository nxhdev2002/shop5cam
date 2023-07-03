@include('layouts.header')
<div class="flex gap-8">
    @include('seller.frontend.sidebar')
    <main class="w-3/4 h-full overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Danh sách mặt hàng
            </h2>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">

                    <div class="relative overflow-x-auto">

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Detail
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_details as $product_detail)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$product_detail->id}}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input type="text" id="{{$product_detail->id}}" name="name"
                                            onchange="updateDetail( '{{$product_detail->id}}')"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{$product_detail->detail}}" required>
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
@push('scripts')
<script>
    function updateDetail(id) {

        let detail = $('#' + id).val();
        $.post("{{route('seller.products.updateDetail')}}", {
            'detail': detail,
            'id': id,
            _token: '{{csrf_token()}}'
        }).done(function (data) {
            if (data.success) {
                toastr.success(data.message)
            }
            else {
                toastr.error(data.message)
            }

        })
    }
</script>
@endpush
@include('layouts.footer')