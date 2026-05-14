<x-app-layout>
    <div class="size-auto h-dvh flex flex-col justify-between items-center bg-gray-300">
        <div class="mt-20 w-1/3 border-b-8 border-red-800">
            <h2 class="font-semibold text-4xl sm:text-5xl md:text-7xl lg:text-9xl text-gray-800 leading-tight text-center">
                {{ __('Koohat') }}
            </h2>  
        </div>
        <div class="w-3/4 h-1/2 bg-gray-200 rounded-t-lg">
            <h4 class="m-8 font-semibold text-lg sm:text-xl md:text-2xl lg:text-3xl">Visas Viktorīnas</h4>
            <div class="w-full flex flex-wrap justify-around">
                @foreach($quizzes as $quiz)
                <div class="w-96 h-16 text-center bg-gray-50 hover:bg-gray-100 mb-8 rounded-lg content-center">
                    <a class="w-full h-full inline-block content-center" href="/quizzes/{{$quiz->id}}">{{ $quiz->name }}</a><br/>
                </div>  
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
