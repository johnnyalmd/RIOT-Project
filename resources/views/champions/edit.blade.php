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
            <textarea type="text" id="lore" name="lore" class="form-control">{{ $champion->lore }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Cor 1</label>
            <input type="color" name="color_1" class="form-control" value="{{ $champion->color_1 }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cor 2</label>
            <input type="color" name="color_2" class="form-control" value="{{ $champion->color_2 }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cor 3</label>
            <input type="color" name="color_3" class="form-control" value="{{ $champion->color_3 }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar campeão</button>
    </form>
</div>

<script>
    CKEDITOR.replace('lore');
    const pickr1 = Pickr.create({
        el: '#color_1',
        theme: 'nano',
        default: '#42445a',
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: true,
                rgba: true,
                hsla: true,
                hsva: true,
                cmyk: true,
                input: true,
                clear: true,
                save: true
            }
        }
    });

    const pickr2 = Pickr.create({
        el: '#color_2',
        theme: 'nano',
        default: '#42445a',
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: true,
                rgba: true,
                hsla: true,
                hsva: true,
                cmyk: true,
                input: true,
                clear: true,
                save: true
            }
        }
    });

    const pickr3 = Pickr.create({
        el: '#color_3',
        theme: 'nano',
        default: '#42445a',
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: true,
                rgba: true,
                hsla: true,
                hsva: true,
                cmyk: true,
                input: true,
                clear: true,
                save: true
            }
        }
    });
</script>
@include('champions.partials.footer')