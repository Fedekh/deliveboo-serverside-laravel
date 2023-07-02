@extends('layouts.admin')
@section('content')

<div class="wrapper p-5">
    <h1>I Piatti di {{ Auth::user()->name }}</h1>

    <div class="d-flex justify-content-end">
        <a class="btn btn-info my-4" href="{{ route('admin.dishes.create') }}"> CREA UN NUOVO PIATTO</a>
    </div>
    <table class="table table-dark table-hover table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">PIATTO ID</th>
                <th scope="col">NOME PIATTO</th>
                <th scope="col">RISTORANTE ID</th>
                <th scope="col">AZIONI</th>
                {{-- <th scope="col">Actions</th> --}}
            </tr>
        </thead>
        <tbody>

            @foreach ($dish as $item)
                @if ($item->restaurant_id == Auth::user()->id)
                    <tr class="text-center">
                        <td scope="row">{{ $item->id }}</td>
                        <td scope="row">{{ $item->dish_name }}</td>
                        <td scope="row">{{ $item->restaurant_id }}</td>

                        <td scope="row" class="d-flex justify-content-center">
                            <a class="btn btn-primary mx-1" href="{{ route('admin.dishes.show', $item->slug) }}">
                                VISUALIZZA
                            </a>
                            <a class="btn btn-warning mx-1" href="{{ route('admin.dishes.edit', $item->slug) }}">
                                MODIFICA
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.dishes.destroy', $item->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Vuoi cancellare il piatto? Sei sicuro?')">
                                    Elimina
                                </button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection
