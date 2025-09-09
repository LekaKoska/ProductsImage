@php use Illuminate\Support\Facades\Auth; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex items-center justify-center">
                <div class="relative w-32 h-32">
                    <img
                        src="/storage/images/avatars/{{ Auth::user()->avatar }}"
                        alt="Profile Image"
                        class="w-full h-full object-cover rounded-full border-4 border-blue-600 shadow-md"
                    >
                    <span
                        class="absolute bottom-1 right-1 bg-green-500 w-4 h-4 rounded-full border-2 border-white dark:border-gray-800"
                        title="Online"
                    ></span>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{route('profile.change_avatar')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="profile_image">
                            Upload profile picture
                        </label>
                        <input
                            type="file"
                            name="profile_image"
                            id="profile_image"
                            accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400"
                        >

                        @error('profile_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <button
                            type="submit"
                            class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none"
                        >
                            Save
                        </button>
                    </form>
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
