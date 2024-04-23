@extends('layouts.app')

@section('content')
<a href="{{ route('note.create') }}">Create New Note</a>
<ul>
    @forelse ($notes as $note)
        <li>
            <a href="{{ route('note.show', $note->id) }}">{{ $note->title }}</a> |
            <a href="{{ route('note.edit', $note->id) }}">EDIT</a> |
            <form method="POST" action="{{ route('note.delete', $note->id) }}">
                @method('DELETE')
                @csrf
                <input type="submit" value="DELETE">
            </form>
        </li>
    @empty
        <p>No hay notas</p>
    @endforelse
</ul>
@endsection
