@extends('layouts/main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">List of Materi</h5>
            <a href="/mycourse/{{ $course->id }}/create" class="btn btn-primary container-fluid rounded-pill">Tambah
                Materi</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->course_title }}</td>
                            <td class=""><a href="/mycourse/{{ $data->course_id }}/{{ $data->id }}/edit"
                                    class="btn btn-warning">
                                    Edit</a>

                                <a class="btn btn-danger" onclick="return confirm('Are you Sure?')"
                                    href="/mycourse/{{ $data->id }}/{{ $data->id }}/destroy">
                                    Delete</a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
