<x-app-layout>
    <x-slot:title>Viktorīna</x-slot:title>
    <div class="size-auto h-dvh flex flex-col justify-center items-center bg-gray-300">
        <div class="bg-gray-200 rounded-full h-4 w-1/2">
            <div class="bg-red-800 
                        h-full
                        rounded-full
                        transition-all"
                 style="width: {{ (session('current_step') / count(session('question_ids'))) * 100}}%">
            </div>
        </div>
        <div class="mt-8 w-1/5 border-b-4 border-red-800">
            <h1 class="font-semibold text-sm sm:text-md md:text-xl lg:text-2xl text-gray-800 leading-tight text-center">{{ $question->question }}</h1>
        </div>
        <div class="flex flex-wrap w-1/2 h-1/5 bg-gray-200 rounded-xl mt-8 py-8 px-4">
            @foreach($answers as $answer)
            <form class="w-1/2 h-1/2 flex justify-center content-center" action="/questions/{{ $question->id }}" method="GET">
                @isset($result)
                    <button  name="answer"
                             class="w-4/5 h-3/5 rounded-xl"
                             style="background-color: {{ $answer->correct ? '#8aff8a' : '#ff5f6c' }};"
                             value="{{ $answer->correct }}"
                             disabled>{{ $answer->answer }}</button>
                @else
                    <button name="answer"
                            class="hover:border-b-4 border-red-800 bg-gray-100 hover:bg-gray-50 w-4/5 h-3/5 rounded-xl"
                            value="{{ $answer->correct }}">{{ $answer->answer }}</button>
                    <input name="submition" type="hidden" value="{{ $answer->answer }}"> 
                @endisset
            </form>
            @endforeach
            @isset($result)
                @if($nextQuestionId)
                    <div class="w-full h-1/5 bg-gray-50 hover:border-b-4 border-red-800 hover:bg-gray-100 rounded-md">
                        <a class="w-full h-full inline-block text-center" href="/questions/{{ $nextQuestionId }}">Tālāk</a>
                    </div>
                @endif
            @endisset
        </div>
    </div>
</x-app-layout>