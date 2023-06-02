<!-- @push('script')
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
</script>
@endpush -->
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
                    <!-- <th class="px-4 py-3">Balance</th> -->
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
                    <!-- <td class="px-4 py-3 text-sm">
                        {{$users->balance}}
                    </td> -->
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
                            <button class="">
                                <a href="/admin/user/edit/{{$users->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            </button>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <p class="mt-3 my-6 text-xs">{{ $user->links()}}</p>
    </div>
</div>