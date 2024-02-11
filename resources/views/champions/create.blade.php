@include('champions.partials.header')
<div class="container-md margin-top-form">
    <form method="POST" action="{{ route('champions.store') }}" class="shadow p-3 mb-5 bg-body-tertiary rounded-4">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome do campeão</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">ID riot do campeão</label>
            <input type="text" name="id_custom" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Lore</label>
            <textarea type="text" name="lore" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Criar campeão</button>
    </form>
</div>
@include('champions.partials.footer')