<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center px-4 py-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Chào mừng bạn') }}
            </h2>
            <a
            href="{{ url('/books') }}"
            >
                <button class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Tủ sách
                </button>
            </a>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <img src="cuahang.jpg" alt="Cửa hàng">
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>