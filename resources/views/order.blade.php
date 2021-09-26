@extends('layouts.app')

@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <input type="text" name="name" id="">
        <input type="text" name="address" id="">
        <input type="text" name="phone" id="">
        <button type="submit">send</button>
    </form>
@endsection