<x-app-layout>
    @foreach($results as $result)
        <div>
            <p>{{ $result->quiz->name }}</p>
            <p>{{ $result->score }}</p>
        </div>
    @endforeach
</x-app-layout>