@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            {{ __('Cestino') }}
        </h2>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-success table-hover table-bordered border-white">
                <thead>
                    <tr class="fs-6">
                        {{-- <th scope="col">ID</th> --}}
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th>Codice ISBN</th>
                        <th>Rimosso in data</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashed_books as $book)
                        <tr>

                            {{-- TITLE --}}
                            <td class="align-middle">{{ $book->title }}</td>

                            {{-- AUTHOR --}}
                            <td class="align-middle">{{ $book->author }}</td>

                            {{-- ISBN --}}
                            <td class="align-middle">{{ $book->isbn }}</td>

                            {{-- Rimosso il --}}
                            <td class="align-middle">{{ $book->deleted_at }}</td>

                            {{-- RESTORE --}}
                            <td class="align-middle text-center">
                                <a class="btn btn-primary" href="{{ route('admin.books.restore', $book->id) }}"><i
                                        class="fa-solid fa-recycle"></i></a>

                                {{-- MODALE PER ELIMINARE ELEMENTO --}}
                                <div class="modal fade" id="modalId-{{ $book->id }}" data-backdrop="static"
                                    data-keyboard="false" tabindex="-1" aria-labelledby="modalId-{{ $book->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white justify-content-center">
                                                <h5 class="modal-title text-uppercase"
                                                    id="modalTitleId-{{ $book->id }}">Attenzione!</h5>
                                            </div>
                                            <div class="modal-body fs-5">
                                                Il libro <strong>{{ $book->id }}</strong> -
                                                <strong>{{ $book->title }}</strong> sta per essere eliminato!
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                                    <i class="fa-solid fa-angle-left"></i> Annulla
                                                </button>
                                                {{-- non confondere destroy con delete --}}
                                                <form action="{{ route('admin.books.destroy', $book->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Elimina <i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>


                    @empty
                        <td class="align-middle">Bin is empty</td>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
@endsection
