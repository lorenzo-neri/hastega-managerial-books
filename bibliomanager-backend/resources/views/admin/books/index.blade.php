@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            I tuoi libri
        </h2>

        <div class="table-responsive my-4">
            <table class="table border table-striped table-hover table-light">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th>Codice ISBN</th>
                        <th>Lettori</th>
                        <th>Url del libro</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($books as $book)
                        <tr>

                            {{-- @if (str_contains($book->img, 'http'))
                                    <img height="150px" width="150px" src="{{ $book->img }}" alt="{{ $book->title }}">
                                @else
                                    <img height="150px" width="150px" src="{{ asset('storage/' . $book->img) }}"
                                        alt="{{ $book->title }}">
                                @endif --}}

                            <td>
                                {{ $book->title }}
                            </td>
                            <td>
                                {{ $book->author }}
                            </td>
                            <td>
                                {{ $book->isbn }}
                            </td>
                            <td>
                                {{ $book->read_count }}
                            </td>
                            <td>
                                <a href="{{ $book->url }}">
                                    <i class="fa-solid fa-book-open fa-2xl" style="color: #34b253;"></i>
                                </a>
                            </td>
                            <td>
                                <div style="height: 100%" class="d-flex align-items-center  gap-2  justify-content-center">

                                    <a href="{{ route('admin.books.show', $book->slug) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.books.edit', $book->slug) }}" class="btn btn-secondary">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>


                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $book->slug }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
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
                                                <form action="{{ route('admin.books.destroy', $book->slug) }}"
                                                    method="POST">
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



                            </td>
                        </tr>
                    @empty
                        <h3 class="py-3">
                            Non hai libri al momento
                        </h3>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
@endsection
