@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="text-dark text-center py-4">
            <strong>
                {{ $book->title }}
            </strong>
        </h2>

        <div class="container pt-5 border-top border-4 border-dark">

            <div class="row pb-5">

                <div class="col-12 col-md-6">
                    {{-- <img width="100%" class="rounded-4" src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}"> --}}
                    @if (str_contains($book->image, 'http'))
                        <img width="100%" src="{{ $book->image }}" alt="{{ $book->title }}">
                    @else
                        <img width="100%" src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                    @endif
                </div>

                <div class="col-12 col-md-6 pt-4 fs-3">
                    <p>
                        <strong>
                            Autore:
                        </strong>

                        {{ $book->author }}
                    </p>
                    <p>
                        <strong>
                            Descrizione:
                        </strong>
                        {{ $book->plot }}
                    </p>
                    <p>
                        <strong>
                            Codice ISBN:
                        </strong>
                        {{ $book->isbn }}
                    </p>
                    <p>
                        <strong>
                            Lettori:
                        </strong>
                        {{ $book->read_count }}
                    </p>
                    <p>
                        <strong>
                            Url per il libro:
                        </strong>
                        <a href="{{ $book->url }}">{{ $book->url }}</a>
                    </p>


                    <div class="mt-5 gap-2">

                        <div class="row">
                            <div class="col">
                                {{-- EDIT --}}
                                <a class="btn btn-secondary p-3 w-100" href="{{ route('admin.books.edit', $book->slug) }}">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </a>
                            </div>

                            <div class="col">
                                {{-- DELETE --}}
                                <button type="button" class="btn btn-danger p-3 w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $book->slug }}">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </button>
                            </div>
                        </div>




                        <!-- Modal Body -->
                        <div class="modal fade" id="modalId-{{ $book->slug }}" tabindex="-1" role="dialog"
                            aria-labelledby="modalTitle-{{ $book->slug }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header  bg-warning">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Attenzione! Sei sicuro di voler eliminare?
                                    </div>
                                    <div class="modal-footer bg-warning">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>

                                        <!-- Delete form -->
                                        <form action="{{ route('admin.books.destroy', $book->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
