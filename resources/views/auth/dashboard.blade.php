@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div> 
                @endif                
                <a href="{{ route('product.index') }}" class="btn btn-primary">Visit Products Page</a>
                <a href="{{ route('fileUpload') }}" class="btn btn-primary">Upload a file</a>
                <a href="{{ route('file.list') }}" class="btn btn-primary">Download a file</a>
                <a href="{{ route('import_export') }}" class="btn btn-primary">Import Export a CSV</a>
            </div>
        </div>
    </div>    
</div>
    
@endsection
