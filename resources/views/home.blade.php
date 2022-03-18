@extends('layouts.base')
@section('title', 'Мои объявления')
@section('main')
@if (!empty(Auth::user()->name))
<p class="text-right">Добро пожаловать, {{ Auth::user()->name }} (ID: {{ Auth::user()->id }})</p>
@endif

<p class="text-right"><a href="{{ route('bb.add') }}">Добавить объявление</a></p>
@if(count($bbs) > 0)
<table class="table table-stripped">
<thead>
    <tr>
        <th>Товар</th>
        <th>Цена, руб.</th>
        <th>Автор</th>
        <th colspan="2">&nbsp;</th>
    </tr>
</thead>
<tbody>
    @if(count($bbs) >0)
    @foreach ($bbs as $bb)
    <tr>
        <td><h3>{{ $bb->title }}</h3></td>
        <td>{{ $bb->price }}</td>
        <td>{{ $bb->user->name }}</td>
        <td>
            <a href="{{ route('bb.edit',['bb'=>$bb->id]) }}">Изменить</a>
        </td>
        <td>
            <a href="{{ route('bb.delete',['bb'=>$bb->id]) }}">Удалить</a>
        </td>
    </tr>
  @endforeach
  @endif
</tbody>
</table>
{!! $bbs->withQueryString()->links('pagination::bootstrap-5') !!}
@endif
@endsection

