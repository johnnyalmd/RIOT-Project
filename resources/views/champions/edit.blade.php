@include('champions.partials.header')
<div class="container-md margin-top-form">
    <form method="POST" action="{{ route('champions.update', $champion->id) }}" class="shadow p-3 mb-5 bg-body-tertiary rounded-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome do campeão</label>
            <input type="text" name="name" class="form-control" value="{{ $champion->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">ID riot do campeão</label>
            <input type="text" name="id_custom" class="form-control" value="{{ $champion->id_custom }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" name="description" class="form-control" value="{{ $champion->description }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Lore</label>
            <textarea type="text" name="lore" class="form-control">{{ $champion->lore }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar campeão</button>
    </form>
</div>
@include('champions.partials.footer')