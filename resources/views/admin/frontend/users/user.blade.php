@push('script')
<script>
    function banUser(userId) {
        let id = $('#user_id_' + userId).val();
        $.ajax({
            url: "/admin/user/" + id + "/ban",
            type: "PUT",
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (data) {
                Swal.fire(
                    'Thành công!',
                    data.message,
                    'success'
                )
            },
            error: function (error) {
                console.log(error);
            }
        });
        // window.location.reload();
    }


    function filter() {
        let urlParams = new URLSearchParams(window.location.search);
        let status = urlParams.get('status');
        if (status !== null) {
            window.location = window.location.pathname + '?name=' + $('#name-search').val() + '&status=' + status
        } else {
            window.location = window.location.pathname + '?name=' + $('#name-search').val()
        }

    }
</script>
@endpush
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="p-4 sm:ml-64">
    <table class="w-full mx-6 whitespace-no-wrap">
        <div class="flex justify-between mx-2 my-2">
            <h2 class="text-2xl font-semibold text-gray-700 basis-1/3 dark:text-gray-200">
                User
            </h2>
            <div class="basis-1/2">
                <div class="flex">
                    <label for="status-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Status</label>
                    <button id="dropdown-button-2" data-dropdown-toggle="dropdown-search-city"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">
                        @if ($request->status == '1')
                        Active
                        @elseif ($request->status == '0')
                        Banned
                        @else
                        Tất cả
                        @endif
                        <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                    <div id="dropdown-search-city"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button-2">
                            <li>
                                <a href="{{route('admin.user.index')}}"
                                    class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">
                                    <div class="inline-flex items-center">
                                        Tất cả
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="?status=1"
                                    class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">
                                    <div class="inline-flex items-center">
                                        Active
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="?status=0"
                                    class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">
                                    <div class="inline-flex items-center">
                                        Banned
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="name-search"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search for name" required>
                        <button type="submit" onclick="filter()"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Balance</th>
                <th class="px-4 py-3">Permission</th>
                <th class="px-4 py-3">Active</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>
        @foreach($user as $users)
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    {{$users->id}}
                </td>
                <td class="px-4 py-3 text-sm">
                    {{$users->name}}
                </td>
                <td class="px-4 py-3 text-sm">
                    {{$users->email}}
                </td>
                <td class="px-4 py-3 text-sm">
                    {{number_format($users->balance)}} VNĐ
                </td>
                <td class="px-4 py-3 text-sm">
                    @if ($users->rights == 1)
                    <span
                        class="px-2 py-1 font-semibold leading-tight text-gray-700 rounded-full dark:text-white dark:bg-orange-600">
                        User
                    </span>
                    @endif
                    @if ($users->rights == 3)
                    <span
                        class="px-2 py-1 font-semibold leading-tight text-gray-700 rounded-full dark:text-white dark:bg-orange-600">
                        Seller
                    </span>
                    @endif
                    @if ($users->rights == 5)
                    <span
                        class="px-2 py-1 font-semibold leading-tight text-gray-700 rounded-full dark:text-white dark:bg-orange-600">
                        Staff
                    </span>
                    @endif
                    @if ($users->rights == 9)
                    <span
                        class="px-2 py-1 font-semibold leading-tight text-gray-700 rounded-full dark:text-white dark:bg-orange-600">
                        Admin
                    </span>
                    @endif
                </td>
                <td class="px-4 py-3 text-sm">
                    @if (!$users->is_banned)
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Active</span>
                    @else
                    <span
                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Banned</span>
                    @endif
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                        <button data-modal-target="editModal-{{$users->id}}"
                            data-modal-toggle="editModal-{{$users->id}}"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                        <div id="editModal-{{$users->id}}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit - <i>{{$users->name}}</i>
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="editModal-{{$users->id}}">
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
                                    <form action="{{route('admin.confirmUpdateUser', $users->id)}}" method="POST">
                                        @csrf
                                        <div class="p-6 space-y-6">
                                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input type="text" id="name" name="name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="{{$users->name}}" required>
                                                </div>
                                                <div>
                                                    <label for="email"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                    <input type="text" id="balance" name="email"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="{{$users->email}}" required>
                                                </div>
                                                <div>
                                                    <label for="balance"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Balance
                                                        (VNĐ)</label>
                                                    <input type="text" id="balance" name="balance"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="{{$users->balance}}" required>
                                                </div>
                                                <div>
                                                    <label for="rights"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                                        an option</label>
                                                    <select id="rights" name="rights"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @switch($users->rights)
                                                        @case(1)
                                                        <option value="1" selected>Member</option>
                                                        <option value="3">Seller</option>
                                                        <option value="5">Staff</option>
                                                        <option value="9">Administrator</option>
                                                        @break
                                                        @case(3)
                                                        <option value="1">Member</option>
                                                        <option value="3" selected>Seller</option>
                                                        <option value="5">Staff</option>
                                                        <option value="9">Administrator</option>
                                                        @break
                                                        @case(5)
                                                        <option value="1">Member</option>
                                                        <option value="3">Seller</option>
                                                        <option value="5" selected>Staff</option>
                                                        <option value="9">Administrator</option>
                                                        @break
                                                        @default
                                                        <option value="1">Member</option>
                                                        <option value="3">Seller</option>
                                                        <option value="5">Staff</option>
                                                        <option value="9" selected>Administrator</option>
                                                        @endswitch
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="balance"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ban</label>
                                                    <label
                                                        class="relative inline-flex items-center mr-5 cursor-pointer">
                                                        <input type="checkbox" name="is_banned" value="1"
                                                            class="sr-only peer" {{$users->is_banned ? "checked" : ""}}>
                                                        <div
                                                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600">
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="editModal-{{$users->id}}" type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                                <button data-modal-hide="editModal-{{$users->id}}" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <p class="my-6 mt-3 text-xs">{{ $user->links()}}</p>
</main>