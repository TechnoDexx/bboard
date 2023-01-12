@extends('layouts.base')
@section('title',$bb->title)
@section('main')
<table class="table table-bordered data-table">
    <thead>
        <tr>
            <th>Товар</th>
            <th>Описание</th>
            <th>Цена, руб.</th>
            <th>Автор объявления</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <h3>{{ $bb->title }}</h3>
            </td>
            <td>{{ $bb->content }}</td>
            <td>{{ $bb->price }}</td>
            <td>{{ $bb->user->name }}</td>
            <td>
                <a href="{{ route('index') }}">На главную</a>
            </td>
        </tr>
      <tr>
        <td colspan="5"><div align="center">Сюда вставить карусель с фото</div></td>
      </tr>
    </tbody>
</table>
@endsection('main')
