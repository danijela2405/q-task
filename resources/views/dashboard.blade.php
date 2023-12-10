<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @inject('userProvider', \App\Providers\QSSApiUserProvider::class)

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    @php($user = $userProvider->getCurrentUser())
                    <span><b>First Name:</b></span> {{ $user->first_name }}
                    <span><b>Last Name:</b></span> {{ $user->last_name }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
