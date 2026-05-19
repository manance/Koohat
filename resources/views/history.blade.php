<x-app-layout>
    <x-slot:title>Vēsture</x-slot:title>
    <div class="flex-1 flex flex-col justify-around items-center bg-gray-300 px-4 py-8">
        <div class="mt-20 w-full max-w-md border-b-4 border-red-800">
            <h4 class="font-semibold text-xl sm:text-2xl md:text-3xl lg:text-4xl text-gray-800 leading-tight text-center">
                {{ __("Tava statistika") }}
            </h4>
        </div>
        <div class="pb-8 w-full sm:w-11/12 lg:w-3/4 min-h-96 bg-gray-200 rounded-lg mt-8">
            @if(count($results) > 0)
                @foreach($results as $result)

                    <div class="w-full flex flex-col sm:flex-row justify-around items-center mt-6 min-h-16 gap-4 px-4 py-4 border-b border-gray-300">
                        <p class="rounded-lg bg-gray-50 w-full sm:w-1/5 text-center flex items-center justify-center p-4 break-words">
                            {{ $result->quiz->name }}:
                        </p>
                        <p class="rounded-lg bg-gray-50 w-full sm:w-1/5 text-center flex items-center justify-center p-4">
                            {{ $result->score }}/{{ $result->max_score }}
                        </p>
                        <p class="rounded-lg bg-gray-50 w-full sm:w-1/5 text-center flex items-center justify-center p-4">
                            {{ round($result->score / $result->max_score, 2) * 100 }}%
                        </p>
                        <a
                            href="/quizzes/{{$result->quiz_id}}"
                            class="rounded-lg hover:border-b-4 border-red-800 hover:bg-gray-100 bg-gray-50 w-full sm:w-1/5 text-center inline-flex items-center justify-center p-4"
                        >
                            Spēlēt vēlreiz
                        </a>
                    </div>

                @endforeach
            @else
                <a
                    href="/quizzes"
                    class="m-8 rounded-lg hover:border-b-4 border-red-800 hover:bg-gray-100 bg-gray-50 w-full sm:w-1/5 text-center inline-flex items-center justify-center p-4"
                >Izpildīt viktorīnu
                </a>
            @endif
        </div>
    </div>
</x-app-layout>