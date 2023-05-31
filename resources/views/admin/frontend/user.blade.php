@push('script')
<script>
    function updateUser(userId) {
        let id = $('#user_id_' + userId).val()
        let name = $('#name').val()
        let email = $('#email').val()
        let phone = $('#phone').val()
        let payment = $('#payment').val()
        let rights = $('#rights').find(':selected').text()
        $.ajax({
            url: "/admin/user/" + id + "/update",
            type: "PUT",
            data: {
                name: name,
                email: email,
                phone: phone,
                payment: payment,
                rights: rights,
                _token: '{{csrf_token()}}'
            },
            success: function (data) {
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
        window.location.reload();
    }
    function destroyUser(userId) {
        let id = $('#user_id_' + userId).val();
        $.ajax({
            url: "/admin/user/" + id + "/delete",
            type: "DELETE",
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (data) {
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
        // window.location.reload();
    }
</script>
@endpush
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <!-- Desktop sidebar -->
    @include('admin.layouts.sidebar')
    <div class="flex flex-col flex-1 w-full">
        @include('admin.layouts.header')
        <table class="mx-6 w-full whitespace-no-wrap">
            <h2 class="mx-6 my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                User
            </h2>
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Payment</th>
                    <th class="px-4 py-3">Balance</th>
                    <th class="px-4 py-3">Rights</th>
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
                        {{$users->phone}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$users->payment}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$users->balance}}
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
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button data-modal-target="userModal{{$users->id}}"
                                data-modal-toggle="userModal{{$users->id}}"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                            <!-- edit user -->
                            <div id="userModal{{$users->id}}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                                <div class="fixed inset-0 flex items-center justify-center z-50">
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <div
                                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Update User
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="userModal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>  
                                        </div>
                                        <input type="hidden" id="user_id_{{$users->id}}" name="id"
                                            value="{{$users->id}}">
                                        <!-- Các trường nhập liệu cho người dùng -->
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2"><label for="user_name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="name" id="name" value="{{$users->name}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="">
                                        </div>
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2"><label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="text" name="email" id="email" value="{{$users->email}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="">
                                        </div>
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2"><label for="phone"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                            <input type="text" name="phone" id="phone" value="{{$users->phone}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="">
                                        </div>
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <div>
                                                <label for="payment"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment</label>
                                                <input type="text" name="payment" id="payment"
                                                    value="{{$users->payment}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="">
                                            </div>
                                            <div>
                                                <label for="rights"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rights</label>
                                                <select id="rights" name="rights"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="" value="">1</option>
                                                    <option value="">3</option>
                                                    <option value="">5</option>
                                                    <option value="">9</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Nút lưu và hủy -->
                                        <div class="justify-center flex items-center space-x-4">
                                            <button type="submit" onclick="updateUser('{{$users->id}}')"
                                                class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                Update
                                            </button>
                                            <button type="button" onclick="destroyUser('{{$users->id}}')"
                                                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Delete
                                            </button>
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
        <p class="mt-3 my-6 text-xs">{{ $user->links()}}</p>
    </div>
</div>