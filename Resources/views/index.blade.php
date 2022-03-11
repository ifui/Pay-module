@extends('pay::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('pay.name') !!}
    </p>
@endsection
