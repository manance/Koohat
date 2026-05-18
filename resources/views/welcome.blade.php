<x-guest-layout>
    <div class="flex justify-center flex-col items-center w-100 h-[90vh]">
    <h2 class="text-sm">Welcome to</h2>
    <h1 class="text-7xl font-black font-mono pb-4 border-b-[5px] border-red-800">Koohat</h1>
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4 ">
            @auth
                <a
                    href="{{ url('/quizzes') }}"
                    class="mt-5 bg-[#CC2626] px-5 py-1.5 rounded-md hover:bg-[#A31F1F] transition-colors duration-250 border-[1px] border-black text-white font-bold"
                >
                    Viktorīnas
                </a>
            @else
            <div class="flex gap-4 mt-5">
                <a
                    href="{{ route('login') }}"
                    class="bg-[#CC2626] px-5 py-1.5 rounded-md hover:bg-[#A31F1F] transition-colors duration-250 border-[1px] border-black text-white font-bold"
                >
                    Pieslēgties
                </a>

                @if (Route::has('register'))
                <br>
                    <a
                        href="{{ route('register') }}"
                        class="bg-[#353535] px-5 py-1.5 rounded-md hover:bg-black transition-colors duration-250 border-[1px] border-black text-white font-bold">
                        Reģistrēties
                    </a>
                @endif
                </div>
            @endauth
        </nav>
    @endif
    </div>
</x-guest-layout>
