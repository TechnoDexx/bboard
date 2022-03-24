@extends('layouts.base')
@section('title','Главная')
@section('main')
@if(!empty(Auth::user()->name))
<p class="text-right">Добро пожаловать, {{ Auth::user()->name }} (ID: {{ Auth::user()->id }})</p>
@endif
<p>&nbsp;</p>
{{-- <p>L</p> --}}
<form method="GET">
    <div class="input-group mb-3">
      <input
        type="text"
        name="search"
        value="{{ request()->get('search') }}"
        class="form-control"
        placeholder="Поиск..."
        aria-label="Поиск"
        aria-describedby="button-addon2">
      <button class="btn btn-success" type="submit" id="button-addon2">Поиск</button>
    </div>
</form>
<p>&nbsp;</p>
        @if(count($bbs) >0)
        <table class="table table-bordered data-table">
            <thead>
                <tr>
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

        @endif
        {!! $bbs->withQueryString()->links('pagination::bootstrap-5') !!}

@endsection('main')
