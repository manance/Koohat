<x-layout>
    <h1>{{$quiz->name}}</h1>
    <div style="display: flex;">
        <a href="/quizzes">Back</a>
        <a href="/questions/{{ $questions->first()->id }}">Start</a>
    </div>
</x-layout>