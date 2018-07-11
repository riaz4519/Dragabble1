@extends('layout')

@section('title', 'Admin')

@section('content')

    <div id="app">
        <div class="container">

            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3>View Testimonials (Backend)</h3>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quote</th>
                        <th>Visible</th>
                        <th>Order</th>
                    </tr>
                </thead>

                

                <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <td>
                            {{ $testimonial->id }}
                            {{-- <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary btn-xs mb">Edit</a>
                            <form action="{{ route('admin.testimonials.delete', $testimonial) }}" method="POST">
                                {{ csrf_field() }}
                                {!! method_field('delete') !!}

                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                            </form>
 --}}
                        </td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->quote }}</td>
                        <td>{{ $testimonial->visible }}</td>
                        <td>{{ $testimonial->order }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {{-- <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Create Testimonial</a> --}}

            <hr>

            <h3>View Testimonials (Frontend)</h3>
            {{-- sendin data to table dragabble to props --}}
            <table-draggable :testimonials="{{ $testimonials }}"></table-draggable>

          


        </div> <!-- end container -->

    </div> <!-- end app -->

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@endsection