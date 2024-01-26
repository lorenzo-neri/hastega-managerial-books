@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mt-4 justify-content-center">
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
            <div class="col">

                <a class="" href="{{ route('admin.books.index') }}">
                    <div class="card_btn">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="fs-3 fw-3">TABELLA DEI LIBRI</div>
                            </div>

                            <div class="card-body">
                                <img class="img-fluid" src="{{ asset('images/books.jpeg') }}"
                                    alt="Ecco a te la tabella dei libri!">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col -->
            <div class="col  ">
                <a class="" href="{{ route('admin.books.recycle') }}">
                    <div class="card_btn">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="fs-3 fw-3">LIBRI ELIMINATI</div>
                            </div>

                            <div class="card-body">
                                <img class="img-fluid" src="{{ asset('images/trash.jpeg') }}"
                                    alt="Ecco a te la tabella dei libri eliminati!">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
