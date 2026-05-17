<x-app-layout>
    <x-slot:title>{{ $quiz->name }}</x-slot:title>
    <div class="size-auto h-dvh flex flex-col justify-center items-center bg-gray-300">
        <div class="mt-20 w-1/10 border-b-8 border-red-800">
            <h2 class="font-semibold text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-gray-800 leading-tight text-center">
                {{$quiz->name}}
            </h2>  
        </div>
        <div class="pb-8 mt-8 flex flex-col w-1/5 h-1/3 bg-gray-200 rounded-lg justify-around items-center">
            <div class="flex flex-col w-4/5 h-4/5 items-center justify-center">
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl">{{ $count }}</h2>
                <h4 class="text-red-800 text-sm sm:text-md md:text-xl lg:text-2xl">JAUTĀJUMI</h4>
            </div>
            <div class="w-full h-1/5 flex justify-around">
                <div class="rounded-xl bg-gray-50 w-2/5 h-full hover:bg-gray-100 hover:border-b-4 border-red-800">
                    <a class="w-full h-full inline-block text-center content-center" href="/quizzes">Atpakaļ</a>
                </div>
                <div class="rounded-xl bg-gray-50 w-2/5 h-full hover:bg-gray-100 hover:border-b-4 border-red-800">
                    <a class="w-full h-full inline-block text-center content-center" href="/questions/{{ $firstQuestionId }}">Sākt</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>