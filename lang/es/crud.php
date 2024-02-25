<?php

return [
    'common' => [
        'actions' => 'Acciones',
        'create' => 'Crear',
        'edit' => 'Editar',
        'update' => 'Actualizar',
        'new' => 'Crear',
        'cancel' => 'Cancelar',
        'attach' => 'Adjuntar',
        'detach' => 'Desvincular',
        'save' => 'Guardar',
        'delete' => 'Eliminar',
        'delete_selected' => 'Eliminar seleccionados',
        'search' => 'Buscar...',
        'back' => 'Regresar',
        'are_you_sure' => '¿Está seguro?',
        'no_items_found' => 'Sin resultados que mostrar',
        'created' => 'Creado satisfactoriamente',
        'saved' => 'Guardado satisfactoriamente',
        'removed' => 'Borrado satisfactoriamente',
    ],

    'usuarios' => [
        'name' => 'Usuarios',
        'index_title' => 'Lista de Usuarios',
        'new_title' => 'Crear Usuario',
        'create_title' => 'Crear Usuario',
        'edit_title' => 'Editar Usuario',
        'show_title' => 'Ver Usuario',
        'inputs' => [
            'name' => 'Nombre',
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirme contraseña',
            'image' => 'Foto',
        ],
    ],

    'categor_as' => [
        'name' => 'Categorías',
        'index_title' => 'Lista de Categorías',
        'new_title' => 'Crear Categoría',
        'create_title' => 'Crear Categoría',
        'edit_title' => 'Editar Categoría',
        'show_title' => 'Ver Categoría',
        'inputs' => [
            'name' => 'Categoría',
            'slug' => 'Slug',
        ],
    ],

    'posts' => [
        'name' => 'Noticias',
        'index_title' => 'Lista de Noticias',
        'new_title' => 'Crear Noticia',
        'create_title' => 'Crear Noticia',
        'edit_title' => 'Editar Noticia',
        'show_title' => 'Ver Noticia',
        'inputs' => [
            'title' => 'Título',
            'slug' => 'Slug',
            'excerpt' => 'Resumen',
            'body' => 'Contenido',
            'author_id' => 'Author',
            'category_id' => 'Categoría',
            'published_at' => 'Publicado el',
            'image' => 'Imagen',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Lista de Roles',
        'create_title' => 'Crear Rol',
        'edit_title' => 'Editar Rol',
        'show_title' => 'Ver Rol',
        'inputs' => [
            'name' => 'Nombre',
        ],
    ],

    'permissions' => [
        'name' => 'Permisos',
        'index_title' => 'Lista de Permisos',
        'create_title' => 'Crear Permiso',
        'edit_title' => 'Editar Permiso',
        'show_title' => 'Ver Permiso',
        'inputs' => [
            'name' => 'Nombre',
        ],
    ],
];
