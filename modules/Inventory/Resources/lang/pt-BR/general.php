<?php

return [
    'name'                      => 'Inventário',
    'description'               => 'Gerenciamento de Contas e Inventário agrupados',

    'items'                     => 'Item|Itens',
    'inventories'               => 'Inventário|Inventários',
    'options'                   => 'Opção|Opções',
    'manufacturers'             => 'Fabricante|Fabricantes',
    'transfer_orders'           => 'Pedido de transferência|Pedidos de transferência',
    'warehouses'                => 'Depósito|Depósitos',
    'histories'                 => 'Histórico|Históricos',
    'item_groups'               => 'Grupo|Grupos',
    'sku'                       => 'SKU',
    'quantity'                  => 'Quantidade',
    'edit_warehouse'            => 'Editar :type Armazém',
    'default'                   => 'Padrão',
    'stock'                     => 'Estoque',
    'information'               => 'Informação',
    'default_warehouse'         => 'Armazém padrão',
    'track_inventory'           => 'Rastrear Inventário',
    'negatif_stock'             => 'Estoque Negativo',
    'expented_income'           => 'Receita esperada',
    'sale_item_quantity'        => 'Quantidade de itens a venda',
    'sale_item_amount'          => 'Valor do Item Vendido',
    'purchase_item_quantity'    => 'Quantidade de itens comprada',
    'purchase_item_amount'      => 'Preço de compra do item',
    'income'                    => 'Receita',
    'invalid_stock'             => 'Estoque no armazém :stock',
    'low_stock'                 => ':name Baixo Estoque (:count - :warehouse)',

    'menu' => [
        'inventory'             => 'Inventário',
        'item_groups'           => 'Grupos',
        'options'               => 'Opções',
        'manufacturers'         => 'Fabricante',
        'warehouses'            => 'Depósitos',
        'histories'             => 'Histórico',
        'reports'               => 'Relatórios',
    ],

    'document' => [
        'detail'                => 'Um :class armazém é usado para uma boa escrituração do seu :type e para manter seus relatórios precisos.',
    ],

    'reports' => [
        'name' => [
            'stock_status'      => 'Status do Estoque',
            'sale_summary'      => 'Resumo financeiro',
            'purchase_summary'  => 'Resumo de compras',
            'income_status'     => 'Status de Receitas',
            'profit_loss'       => 'Lucros e Perdas (Inventário)',
            'income_summary'    => 'Resumo de Renda (Inventário)',
            'expense_summary'   => 'Resumo de Despesas (Inventário)',
            'income_expense'    => 'Renda vs Despesa (Inventário)',

        ],

        'description' => [
            'stock_status'      => 'Rastreamento de estoque dos itens',
            'sale_summary'      => 'Rastreamento de estoque dos itens a venda',
            'purchase_summary'  => 'Rastreamento de estoque dos itens comprados',
            'income_status'     => 'Status das Receitas',
            'profit_loss'       => 'Lucro & perda trimestral por inventário.',
            'income_summary'    => 'Resumo mensal de receitas por inventário.',
            'expense_summary'   => 'Resumo mensal de despesas por inventário.',
            'income_expense'    => 'Resumo mensal de receitas vs. despesa por inventário.',
        ],
    ],
];
