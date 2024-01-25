@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            {{ __('Modifica Libro') }} {{ Auth::user()->name }}.
        </h2>

        <div class="row justify-content-center my-3">

            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('put')

                    {{-- BOOK TITLE --}}
                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Titolo</strong></label>

                        <input type="text" class="form-control" name="title" id="title"
                            aria-describedby="helptitle" placeholder="New Book title" required
                            value="{{ old('title') ? old('title') : $book->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- BOOK Author --}}
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Autore</strong></label>

                        <input type="text" class="form-control" name="author" id="author"
                            aria-describedby="helpAuthor" placeholder="New book author" required
                            value="{{ old('author') }}">

                        @error('author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            {{-- BOOK isbn --}}
                            <div class="col">
                                <label for="isbn" class="form-label"><strong>Codice ISBN</strong></label>
                                <input type="number" class="form-control" name="isbn" id="isbn"
                                    aria-describedby="helpisbn" placeholder="Put the isbn code" required
                                    value="{{ old('isbn') }}">

                                @error('isbn')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- BOOK URL --}}
                            <div class="col">
                                <label for="url" class="form-label"><strong>Url del libro</strong></label>
                                <input type="url" class="form-control" name="url" id="url"
                                    aria-describedby="helpurl" placeholder="New book url" required
                                    value="{{ old('url') }}">

                                @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- BOOK PLOT --}}
                    <div class="mb-3">
                        <label for="plot" class="form-label"><strong>Trama</strong></label>
                        <input type="text" class="form-control" name="plot" id="plot" aria-describedby="helpPlot"
                            placeholder="New book plot" required value="{{ old('plot') }}">

                        @error('plot')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Book IMG --}}
                    <div class="mb-3">
                        <label for="image" class="form-label"><strong>Scegli un'immagine per il tuo
                                libro</strong></label>

                        <input type="file" class="form-control" name="image" id="image"
                            placeholder="Upload a new image file..." aria-describedby="fileHelpImage">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-success my-3">SALVA</button>
                    <a class="btn btn-primary" href="{{ route('admin.books.index') }}">ANNULLA</a>

                </form>
            </div>
        </div>

    </div>
@endsection
