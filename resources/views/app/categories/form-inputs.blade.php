@php $editing = isset($category) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text name="name" label="Categoría" :value="old('name', $editing ? $category->name : '')" maxlength="255" placeholder="Categoría"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text name="slug" label="Slug" :value="old('slug', $editing ? $category->slug : '')" maxlength="255" placeholder="Slug"
            disabled></x-inputs.text>
    </x-inputs.group>
</div>
