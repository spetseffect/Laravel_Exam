@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
{{--        <a class="btn btn-info" href="#">Загрузить новую инструкцию</a>--}}
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Author</th>
                <th>Updated</th>
                <th>Device</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($instr as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->name }}</td>
                    <td>{{ $i->status }}</td>
                    <td>{{ $i->author }}</td>
                    <td>{{ $i->updated }}</td>
                    <td>{{ $i->device }}</td>
                    <td>
                        <a class="btn btn-success" href="/inst-files/{{ $i->file }}" title="Download" download>&dArr;</a>
                        <a class="btn btn-warning" href="#" title="Edit">&#9998;</a>
                        <a class="btn btn-danger" href="#" title="Delete">&#10008;</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
