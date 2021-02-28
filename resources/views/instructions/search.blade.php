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
