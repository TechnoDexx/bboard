@extends('layouts.base')
@section('title',$bb->title)
@section('main')
<table class="table table-stripped">
    <thead>
        <tr>
            <th>Товар</th>
            <th>Цена, руб.</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <h3>{{ $bb->title }}</h3>
            </td>
            <td>{{ $bb->price }}</td>
            <td>
                <a href="{{ route('index') }}">На перечень объявлениий</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection('main')
