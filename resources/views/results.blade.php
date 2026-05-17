<x-app-layout>
    <x-slot:title>Rezultāts</x-slot:title>
    <div class="size-auto min-h-dvh flex flex-col justify-center items-center bg-gray-300">
        <div class="mt-8 w-1/10 border-b-4 border-red-800">
            <h1 class="font-semibold text-sm sm:text-md md:text-xl lg:text-2xl text-gray-800 leading-tight text-center">Tu to paveici!</h1>
        </div>
        <h2>Tavs rezultāts: {{ $score }} / {{ $total }}</h2>
        <div class="mt-8 p-4 bg-gray-200 w-1/3 min-h-4/5 flex flex-col items-center rounded-xl">
            @foreach($summary as $index => $item)
                <div style="
                    background-color: {{ $item['correct'] ? '#8aff8a' : '#ff5f6c' }};" 
                     class="
                    p-4
                    mb-4
                    min-w-full
                    rounded-xl">
                    <p><strong>{{ $index + 1 }}. {{ $item['question'] }}</strong></p>
                    <p>Tava atbilde:
                        <span style="color: {{ $item['correct'] ? 'green' : 'red' }};">
                            {{ $item['your_answer'] }}
                        </span>
                    </p>
                    @if(!$item['correct'])
                        <p>Pareizā atbilde:
                            <span style="color: green;">{{ $item['correct_answer'] }}</span>
                        </p>
                    @endif
                </div>
            @endforeach
            <div class="w-3/5 h-8 bg-gray-50 hover:border-b-4 border-red-800 hover:bg-gray-100 rounded-md">
                <a class="w-full h-full inline-block text-center" href="/quizzes">Atpakaļ uz sākumu</a>
            </div>
        </div>
    </div>
</x-app-layout>