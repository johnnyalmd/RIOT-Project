@include('champions.partials.header')
<div class="container-md">
    <table class="table table-striped-columns margin-top-form">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Custom ID</th>
            <th scope="col">Description</th>
            <th scope="col">Lore</th>
            <th scope="col">Deletar campeão</th>
            <th scope="col">Editar campeão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($champions as $champion)
                <tr>
                <th scope="row">{{ $champion->id }}</th>
                    <td>{{ $champion->name }}</td>
                    <td>{{ $champion->id_custom }}</td>
                    <td>{{ $champion->description }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($champion->lore, 50, $end='...') }}</td>
                    <td>
                        <form action="{{ route('champions.destroy', $champion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar campeão</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('champions.edit', $champion->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary mt-3" href="{{ route('champions.create') }}" role="button">Adicionar</a>
</div>
@include('champions.partials.footer')