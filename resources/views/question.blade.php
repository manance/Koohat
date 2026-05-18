<x-app-layout>
    <x-slot:title>Viktorīna</x-slot:title>
    <div class="flex-1 flex flex-col justify-center items-center bg-gray-300 px-4 py-8">
        <div class="w-full max-w-3xl bg-gray-200 rounded-full h-4">
            <div
                class="bg-red-800 h-full rounded-full transition-all duration-300"
                style="width: {{ (session('current_step') / count(session('question_ids'))) * 100 }}%">
            </div>
        </div>
        <div class="mt-8 w-full max-w-2xl border-b-4 border-red-800 pb-4">
            <h1 class="font-semibold text-lg sm:text-xl md:text-2xl text-gray-800 text-center">
                {{ $question->question }}
            </h1>
        </div>
        <div class="w-full max-w-3xl bg-gray-200 rounded-xl mt-8 p-4 sm:p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                @foreach($answers as $answer)

                    <form
                        class="w-full"
                        action="/questions/{{ $question->id }}"
                        method="GET"
                    >

                        @isset($result)

                            <button
                                name="answer"
                                class="w-full py-4 rounded-xl font-medium text-gray-800"
                                style="background-color: {{ $answer->correct ? '#8aff8a' : '#ff5f6c' }};"
                                value="{{ $answer->correct }}"
                                disabled
                            >
                                {{ $answer->answer }}
                            </button>

                        @else

                            <button
                                name="answer"
                                class="w-full py-4 rounded-xl bg-gray-100 hover:bg-gray-50 hover:border-b-4 border-red-800 transition-all font-medium"
                                value="{{ $answer->correct }}"
                            >
                                {{ $answer->answer }}
                            </button>
                            <input
                                name="submition"
                                type="hidden"
                                value="{{ $answer->answer }}"
                            >

                        @endisset
                    </form>
                @endforeach
            </div>
            @isset($result)
                @if($nextQuestionId)

                    <div class="mt-6">
                        <a
                            class="block w-full text-center bg-gray-50 hover:bg-gray-100 hover:border-b-4 border-red-800 rounded-md py-3 transition-all"
                            href="/questions/{{ $nextQuestionId }}"
                        >
                            Tālāk
                        </a>
                    </div>

                @endif
            @endisset
        </div>
    </div>
</x-app-layout>