@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text name="name" label="Nombre" :value="old('name', $editing ? $user->name : '')" maxlength="255" placeholder="Name"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.email name="email" label="Email" :value="old('email', $editing ? $user->email : '')" maxlength="255" placeholder="Email"
            required></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.password name="password" label="Contraseña" maxlength="255" placeholder="Password"
            :required="!$editing"></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.password name="password_confirmation" label="Confirme Contraseña" maxlength="255"
            placeholder="Password Confirmation" :required="!$editing"></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div x-data="imageViewer('{{ $editing ? $user->image : '' }}')">
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

    <div class="mt-4 form-group col-sm-12">
        <h4>Asignar @lang('crud.roles.name')</h4>

        @foreach ($roles as $role)
            <div>
                <x-inputs.checkbox id="role{{ $role->id }}" name="roles[]" label="{{ ucfirst($role->name) }}"
                    value="{{ $role->id }}" :checked="isset($user) ? $user->hasRole($role) : false" :add-hidden-value="false"></x-inputs.checkbox>
            </div>
        @endforeach
    </div>
</div>
