<x-app-layout>
    <h1>Quiz Complete! 🎉</h1>
    <h2>Your Score: {{ $score }} / {{ $total }}</h2>

    <div style="margin-top: 20px;">
        @foreach($summary as $index => $item)
            <div style="
                border: 1px solid {{ $item['correct'] ? 'green' : 'red' }};
                padding: 15px;
                margin-bottom: 10px;
                border-radius: 8px;
            ">
                <p><strong>{{ $index + 1 }}. {{ $item['question'] }}</strong></p>
                <p>Your answer:
                    <span style="color: {{ $item['correct'] ? 'green' : 'red' }};">
                        {{ $item['your_answer'] }}
                        {{ $item['correct'] ? '✅' : '❌' }}
                    </span>
                </p>
                @if(!$item['correct'])
                    <p>Correct answer:
                        <span style="color: green;">{{ $item['correct_answer'] }}</span>
                    </p>
                @endif
            </div>
        @endforeach
    </div>

    <a href="/quizzes">Back to Quizzes</a>
</x-app-layout>