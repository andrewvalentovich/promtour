@extends('layouts.app_front')

@section('content')
    <main>
        <p>
            {{ $page->title }}
        </p>
        <p>
            {{ $page->content }}
        </p>
    </main>
@endsection
