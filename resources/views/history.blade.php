<x-app-layout>
    <x-slot:title>Vēsture</x-slot:title>
    <div class="size-auto h-dvh flex flex-col justify-around items-center bg-gray-300">
        <div class="mt-20 w-1/6 border-b-4 border-red-800">
            <h4 class="font-semibold text-xl sm:text-2xl md:text-3xl lg:text-4xl text-gray-800 leading-tight text-center">
                {{ __("Tava statistika") }}
            </h4>
        </div>
        <div class="pb-8 w-3/4 min-h-96 bg-gray-200 rounded-lg">
            @foreach($results as $result)
                <div class="w-full flex justify-around mt-8 h-16">
                    <p class="rounded-lg bg-gray-50 w-1/5 text-center content-center">{{ $result->quiz->name }}: </p>
                    <p class="rounded-lg bg-gray-50 w-1/5 text-center content-center">{{ $result->score }}/{{ $result->max_score }}</p>
                    <p class="rounded-lg bg-gray-50 w-1/5 text-center content-center">{{ round($result->score / $result->max_score, 2) * 100 }}%</p>
                    <a href="/quizzes/{{$result->id}}" class="rounded-lg hover:border-b-4 border-red-800 hover:bg-gray-100 bg-gray-50 w-1/5 text-center inline-block content-center">Spēlēt vēlreiz</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>