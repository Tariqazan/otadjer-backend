<?php

return [

    'name'              => 'Campos Personalizados',
    'description'       => 'Adicione campos personalizados ilimitados em diferentes páginas',

    'fields'            => 'Campo|Campos',
    'locations'         => 'Localização|Localizações',
    'sort'              => 'Ordenar',
    'order'             => 'Posição',
    'depend'            => 'Depende',
    'show'              => 'Mostrar',

    'form' => [
        'name'          => 'Nome',
        'code'          => 'Código',
        'icon'          => 'Ícone FontAwesome',
        'class'         => 'Classe CSS',
        'required'      => 'Obrigatório',
        'rule'          => 'Validação',
        'before'        => 'Antes',
        'after'         => 'Após',
        'value'         => 'Valor',
        'shows'         => [
            'always'    => 'Sempre',
            'never'     => 'Nunca',
            'if_filled' => 'Se Preenchido'
        ],
        'items'         => 'Itens',
    ],

    'type' => [
        'select'        => 'Seleção',
        'radio'         => 'Radio',
        'checkbox'      => 'CheckBox',
        'text'          => 'Texto',
        'textarea'      => 'Área de Texto',
        'date'          => 'Data',
        'time'          => 'Horário',
        'date&time'     => 'Data e hora',
        'enabled'     => 'Ativado',
    ],

    'item' => [
        'action'   => 'Item Ação',
        'name'     => 'Item Nome',
        'quantity' => 'Item Quantidade',
        'price'    => 'Item Preço',
        'taxes'    => 'Item Taxas',
        'total'    => 'Item Total',
    ],
];
