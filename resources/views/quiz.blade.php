<x-app-layout>
    <x-slot:title>{{ $quiz->name }}</x-slot:title>

    <div class="flex-1 flex flex-col justify-center items-center bg-gray-300 px-4 py-10">

        <div class="mt-8 w-full max-w-3xl border-b-8 border-red-800 pb-4">
            <h2 class="font-semibold text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-gray-800 text-center break-words">
                {{ $quiz->name }}
            </h2>
        </div>
        <div class="mt-8 w-full max-w-md bg-gray-200 rounded-2xl p-6 sm:p-8 flex flex-col items-center">

            <div class="flex flex-col items-center justify-center mb-8">
                <h2 class="text-5xl sm:text-6xl md:text-7xl font-bold text-gray-800">
                    {{ $count }}
                </h2>

                <h4 class="text-red-800 text-lg sm:text-xl md:text-2xl tracking-wide">
                    JAUTĀJUMI
                </h4>
            </div>

            <div class="w-full flex flex-col sm:flex-row gap-4">
                <a
                    class="flex-1 text-center bg-gray-50 hover:bg-gray-100 hover:border-b-4 border-red-800 rounded-xl py-3 transition-all"
                    href="/quizzes"
                >
                    Atpakaļ
                </a>
                <a
                    class="flex-1 text-center bg-gray-50 hover:bg-gray-100 hover:border-b-4 border-red-800 rounded-xl py-3 transition-all"
                    href="/questions/{{ $firstQuestionId }}"
                >
                    Sākt
                </a>
            </div>
        </div>
    </div>
</x-app-layout>