<x-app-layout>
    <h1>{{$quiz->name}}</h1>
    <div style="display: flex;">
        <a href="/quizzes">Back</a>
        <a href="/questions/{{ $firstQuestionId }}">Start</a>
    </div>
</x-app-layout>