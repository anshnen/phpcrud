<!doctype html>
<html lang="en">
<div class="container">
    <h2>File List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>@if (strtolower(pathinfo($file->file_path, PATHINFO_EXTENSION)) === 'zip')
                        <a href="{{asset('download/'.$file->file_path)}}" class="btn btn-primary">Download</a>
                    @else
                        <a href="{{ asset('storage/'.$file->file_path) }}" class="btn btn-primary">Download</a>
                        @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>