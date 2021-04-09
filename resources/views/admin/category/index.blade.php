@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Kategorie</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nadpis kategorie</th>
                                <th>Popis kategorie</th>
                                <th>Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td> {{ $category->description }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.category.edit', $category->id) }}">Editovat</a>
                                        <form class="d-inline-block" onsubmit="return confirm('Určitě smazat?');"
                                            action="{{ route('admin.category.destroy', $category) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm">Odstranit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
