@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
        @if($isAuth)
        <a class="btn btn-info" href="#">Загрузить новую инструкцию</a>
        @endif
        </div>
        <div class="col-4">
            <form action="{{ route('home.search', ['']) }}" id="search-form" method="get">
                <div class="row">
                    <div class="col-9">
                        <input type="text" class="form-control" id="search" placeholder="Поиск...">
                    </div>
                    <div class="col-3">
                        <input type="submit" class="btn btn-success" value="Найти">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Статус</th>
                <th>Автор</th>
                <th>Устройство</th>
                <th>Обновлено</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($instr as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->name }}</td>
                    <td>{{ $i->status }}</td>
                    <td>{{ $i->author }}</td>
                    <td>{{ $i->device }}</td>
                    <td>{{ $i->updated }}</td>
                    <td>
                        <a class="btn btn-success" href="/inst-files/{{ $i->file }}" title="Download" download>&dArr;</a>
                        @if($isAuth)
                        <a class="btn btn-warning" href="#" title="Edit">&#9998;</a>
                        @endif
                        @if($isAdmin)
                        <a class="btn btn-danger" href="#" title="Delete">&#10008;</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function (){
            $('#search-form').submit(function (e){
                e.preventDefault();
                $.ajax({
                    url:$(this).attr('action')+'/'+$('#search').val(),
                    type:'get',
                    success:function (data){
                        console.log(data);
                        $('tbody').html(data);
                    }
                });
            });
        });
    </script>
@endsection
