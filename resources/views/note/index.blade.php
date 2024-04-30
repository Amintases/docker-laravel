<x-layout>
    <h1>index</h1>

    <div>
        <a href="{{ route('notes.create') }}">New Note</a>
    </div>

    <div class="notes">
        @foreach ($notes as $note)
            <div class="note">
                <h2>{{ Str::words($note->note, 30) }}</h2>
                <div>
                    <a href="{{ route('notes.show', $note) }}">View</a>
                    <a href="{{ route('notes.edit', $note) }}">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
