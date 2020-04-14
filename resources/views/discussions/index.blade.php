@extends('layouts.app')

@section('content')


@foreach($discussions as $discussion)
    <div class="card">
        @include("partials.discussion-header")

        <div class="card-body">


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! $discussion->title !!}

        </div>
    </div>
@endforeach

    {{$discussions->appends(['channel'=>request()->query('channel')])->links()}}
@endsection
