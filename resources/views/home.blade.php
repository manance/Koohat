<x-app-layout>
    <h2 class="font-semibold text-9xl text-gray-800 leading-tight text-center">
        {{ __('Koohat') }}
    </h2>

    
    @foreach($quizzes as $quiz)
        <a href="/quizzes/{{$quiz->id}}">{{ $quiz->name }}</a><br/>
    @endforeach
</x-app-layout>
