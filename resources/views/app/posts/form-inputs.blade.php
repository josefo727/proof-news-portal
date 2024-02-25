@php $editing = isset($post) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="title" label="Título" :value="old('title', $editing ? $post->title : '')" maxlength="255" placeholder="Título"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="slug" label="Slug" :value="old('slug', $editing ? $post->slug : '')" maxlength="255" placeholder="Slug"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="excerpt" label="Resumen"
            maxlength="255">{{ old('excerpt', $editing ? $post->excerpt : '') }}</x-inputs.textarea>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="body" label="Contenido" maxlength="255"
            required>{{ old('body', $editing ? $post->body : '') }}</x-inputs.textarea>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.select name="author_id" label="Autor" required disabled>
            @php $selected = old('author_id', ($editing ? $post->author_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach ($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.select name="category_id" label="Categoría" required>
            @php $selected = old('category_id', ($editing ? $post->category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Categoría</option>
            @foreach ($categories as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                </option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.date name="published_at" label="Fecha de publicación"
            value="{{ old('published_at', $editing ? optional($post->published_at)->format('Y-m-d') : '') }}"
            max="255"></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div x-data="imageViewer('{{ $editing ? $post->image : '' }}')">
            <x-inputs.partials.label name="image" label="Imagen"></x-inputs.partials.label><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img :src="imageUrl" class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;" />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div class="bg-gray-100 rounded border border-gray-200" style="width: 100px; height: 100px;"></div>
            </template>

            <div class="mt-2">
                <input type="file" name="image" id="image" @change="fileChosen" />
            </div>

            @error('image')
                @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
</div>
