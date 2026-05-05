<x-layout>
    <h1>{{ $question->question }}</h1>
    @foreach($answers as $answer)
    <form action="/questions/{{ $question->id }}" method="GET">
        @isset($result)
            <button name="answer" style="color: {{ $answer->correct ? 'green' : 'red' }};" value="{{ $answer->correct }}">{{ $answer->answer }}</button>
        @else
            <button name="answer" value="{{ $answer->correct }}">{{ $answer->answer }}</button>
        @endisset
    </form>
    @endforeach
    <a href="/questions/{{ $question->id + 1 }}">Tālāk</a>
    <script src="script.js"></script>
</x-layout>