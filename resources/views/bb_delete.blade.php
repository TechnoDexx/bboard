@extends('layouts.base')

@section('title', 'Удаление объявления :: Мои объявления')

@section('main')
<table class="table table-stripped">
    <thead>
        <tr>
            <th>Товар</th>
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
            <td>{{ $bb->price }}</td>
            <td>{{ $bb->user->name }}</td>
        </tr>
    </tbody>
</table>
<form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}"
      method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" class="btn btn-danger" value="Удалить">
</form>

@endsection('main')
