@push('script')
<script>
    function approve(id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("admin.user.upgrade_request.approve", ":id") }}'.replace(':id', id),
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (response) {
                Swal.fire(
                    'Thành công!',
                    response.message,
                    'success'
                )
            },
            error: function (xhr, status, error) {
                console.log(error)
                Swal.fire(error.message)
            }
        });
        window.location.reload();
    }

    function reject(id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("admin.user.upgrade_request.reject", ":id") }}'.replace(':id', id),
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (response) {
                Swal.fire(
                    'Thành công!',
                    response.message,
                    'success'
                )
            },
            error: function (xhr, status, error) {
                console.log(error)
                Swal.fire(error.message)
            }
        });
        window.location.reload();
    }
</script>
@endpush
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <div class="mx-6">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$request->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$request->user_id}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($request->status == 0)
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Đang
                                chờ</span>
                            @elseif ($request->status == 1)
                            <span
                                class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300">Đã
                                duyệt</span>
                            @else
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Từ
                                chối</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{$request->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            <button data-modal-target="modal-{{$request->id}}"
                                data-modal-toggle="modal-{{$request->id}}"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>

                            <!-- Main modal -->
                            <div id="modal-{{$request->id}}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                {{$request->user->name}}
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="modal-{{$request->id}}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <div class="flex flex-col">
                                                <div class="image">
                                                    <img src="{{$request->image}}" alt="" srcset="">
                                                </div>
                                                <div class="flex flex-col items-center">
                                                    <p class="text-lg">Name: <span
                                                            class="italic font-semibold text-red-500">{{$request->user->name}}</span>
                                                    </p>
                                                    <p class="text-lg">Email: <span
                                                            class="italic font-semibold text-red-500">{{$request->user->email}}</span>
                                                    </p>
                                                    <p class="text-lg">Verified At: <span
                                                            class="italic font-semibold text-red-500">{{$request->user->email_verified_at}}</span>
                                                    </p>
                                                    <p class="text-lg">Phone: <span
                                                            class="italic font-semibold text-red-500">{{$request->user->phone}}</span>
                                                    </p>
                                                    <div>
                                                        <button type="button" onclick="reject('{{$request->id}}')"
                                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reject</button>
                                                        <button type="button" onclick="approve('{{$request->id}}')"
                                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Approve</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                </div>
                            </div>
        </div>

        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    </div>
</main>