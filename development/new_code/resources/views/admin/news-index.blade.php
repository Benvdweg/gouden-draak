@extends('layout.admin-layout')

@section('content')
    <form method="post" action="#">
        <label for="title">Titel</label>
        <input type="text" name="title">
        <br>
        <label for="message">Bericht</label>
        <textarea cols="84" rows="5" class="resize-none"></textarea>

        <button type="submit">Plaatsen</button>
    </form>
@endsection
