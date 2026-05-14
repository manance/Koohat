<x-app-layout>
    @foreach($results as $result)
        <div>
            <p>{{ $result->quiz->name }}: {{ $result->score }}/{{ $result->max_score }}</p>
        </div>
    @endforeach
</x-app-layout>