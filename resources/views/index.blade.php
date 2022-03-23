@extends('layouts.base')
@section('title','Главная')
@section('main')
@if(!empty(Auth::user()->name))
<p class="text-right">Добро пожаловать, {{ Auth::user()->name }} (ID: {{ Auth::user()->id }})</p>
@endif
        @if(count($bbs) > 0)
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Товар</th>
                    <th>Цена, руб.</th>
                    <th>Автор</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bbs as $bb)
                <tr>
                    <td>
                        {{ $bb->pic }}
                    </td>
                    <td>
                        <h3>{{ $bb->title }}</h3>
                    </td>
                    <td>{{ $bb->price }}</td>
                    <td>{{ $bb->user->name }}</td>
                    <td>
                        <a href="{{ route('detail',['bb'=>$bb->id]) }}">Подробнее...</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $bbs->withQueryString()->links('pagination::bootstrap-5') !!}
        @endif
@endsection('main')
