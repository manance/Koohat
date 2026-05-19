<x-app-layout>
    <x-slot:title>Koohat</x-slot:title>
    <div class="flex-1 flex flex-col justify-around items-center bg-gray-300 px-4 py-8">
        <div class="w-full max-w-md border-b-8 border-red-800">
            <h2 class="font-semibold font-mono text-2xl sm:text-3xl md:text-5xl lg:text-7xl text-gray-800 leading-tight text-center break-words">
                {{ __('Koohat') }}
            </h2>
        </div>
        <div class="w-full sm:w-11/12 lg:w-3/4 min-h-1/2 bg-gray-200 rounded-lg mt-8">
            <h4 class="m-8 font-semibold text-lg sm:text-xl md:text-2xl lg:text-3xl">
                Visas Viktorīnas
            </h4>
            <div class="w-full flex flex-wrap justify-around px-4 pb-4">
                @foreach($quizzes as $quiz)

                <div class="w-full sm:w-96 min-h-16 text-center bg-gray-50 hover:border-b-4 border-red-800 hover:bg-gray-100 mb-8 rounded-lg flex items-center justify-center">
                    <a
                        class="w-full h-full inline-flex items-center justify-center text-center p-4 break-words"
                        href="/quizzes/{{$quiz->id}}"
                    >
                        {{ $quiz->name }}
                    </a>
                    <br/>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>