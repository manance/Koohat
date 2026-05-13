<x-app-layout>
    <h1>{{ $question->question }}</h1>
    <div style="background: #e0e0e0; border-radius: 8px; height: 12px;">
        <div style="width: {{ (session('current_step') / count(session('question_ids'))) * 100 }}%; 
                    background: #4caf50; 
                    height: 100%; 
                    border-radius: 8px;
                    transition: width 0.3s ease;">
        </div>
    </div>
    @foreach($answers as $answer)
    <form action="/questions/{{ $question->id }}" method="GET">
        @isset($result)
            <button name="answer" style="color: {{ $answer->correct ? 'green' : 'red' }};" value="{{ $answer->correct }}" disabled>{{ $answer->answer }}</button>
        @else
            <button name="answer" value="{{ $answer->correct }}">{{ $answer->answer }}</button>
            <input name="submition" type="hidden" value="{{ $answer->answer }}"> 
        @endisset
    </form>
    @endforeach
    @isset($result)
        <p>{{ $result ? 'Pareizi' : 'Nepareizi' }}</p>
        @if(empty($nextQuestionId))
            <h2>Quiz Complete!</h2>
            <p>Final Score: {{ $score }} / {{ count(session('question_ids')) }}</p>
            <a href="/quizzes">Back to Quizzes</a>
        @elseif($nextQuestionId)
            <a href="/questions/{{ $nextQuestionId }}">Tālāk</a>
        @endif
    @endisset
    <script src="script.js"></script>
</x-app-layout>