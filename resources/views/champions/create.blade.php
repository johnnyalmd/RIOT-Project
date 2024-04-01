@include('champions.partials.header')
<div class="container-md margin-top-form">
    <form method="POST" action="{{ route('champions.store') }}" class="shadow p-3 mb-5 bg-body-tertiary rounded-4" enctype="multipart/form-data">
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
            <textarea type="text" id="lore" name="lore" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagens</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label class="form-label">Cor 1</label>
            <input type="text" id="color_1" name="color_1" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Cor 2</label>
            <input type="text" id="color_2" name="color_2" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Cor 3</label>
            <input type="text" id="color_3" name="color_3" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Criar campeão</button>
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