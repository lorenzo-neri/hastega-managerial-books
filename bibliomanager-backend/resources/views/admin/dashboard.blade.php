@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        Ti sei loggato!📚
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-3 row-cols-1 row-cols-md-3 ">
            <div class="col">

                <a href="{{ route('admin.books.create') }}">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="fs-3 fw-3">AGGIUNGI UN LIBRO</div>
                        </div>

                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('images/add-book.jpeg') }}" alt="Aggiungi un libro!">
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col -->
            <div class="col ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, iure,
                voluptatem commodi repellendus fugiat fuga vel quos officiis magni velit aliquid expedita minus quaerat
                mollitia, illum harum perferendis aut repellat.</div>
            <!-- /.col -->
            <div class="col  ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, iure,
                voluptatem commodi repellendus fugiat fuga vel quos officiis magni velit aliquid expedita minus quaerat
                mollitia, illum harum perferendis aut repellat.</div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
