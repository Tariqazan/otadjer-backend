<?php

return [

    'estimates'       => '見積もり|見積もり',
    'description'     => 'ボタンをクリックするだけで、承認済みの見積もり(見積もり) を請求書に変換できます。',
    'estimate_number' => '見積数',
    'estimate_date'   => '見積日',
    'total_price'     => '合計価格',
    'expiry_date'     => '有効 期限',
    'bill_to'         => '請求書送付先',

    'quantity'  => '数量',
    'price'     => '価格',
    'sub_total' => '小計',
    'discount'  => '割引',
    'tax_total' => '税額合計',
    'total'     => '合計',

    'item_name' => 'アイテム名|アイテム名',

    'show_discount' => '：ディスカウント％ディスカウント',
    'add_discount'  => '割引を追加',
    'discount_desc' => '小計の',

    'convert_to_invoice'       => '請求書に変換',
    'converted_to_invoice'     => '請求書に変換：請求書番号',
    'created_from_estimate'    => '作成元：タイプ：見積もり番号',
    'histories'                => '記録',
    'mark_sent'                => '送信済みマーク',
    'mark_approved_or_refused' => '見積もりを承認または拒否',
    'mark_approved'            => '承認マーク',
    'mark_refused'             => 'マーク拒否',
    'download_pdf'             => 'PDFをダウンロード',
    'send_mail'                => 'メールを送る',
    'create_estimate'          => '見積もりを作成',
    'send_estimate'            => '見積もりを送信',
    'approve'                  => '承認',
    'refuse'                   => '拒否',
    'share'                    => '共有',
    'all_estimates'            => 'すべての見積を表示するにはログイン',

    'statuses' => [
        'draft'    => 'ドラフト',
        'sent'     => '送信',
        'expired'  => '期限切れ',
        'viewed'   => '閲覧',
        'approved' => '承認済み',
        'refused'  => '拒否',
        'invoiced' => '請求済',
    ],

    'messages' => [
        'email_sent'       => '見積もりメールが送信されました！',
        'marked_sent'      => '見積もりは送信済みとしてマークされています！',
        'marked_approved'  => '見積もりは承認済みとマークされます!',
        'marked_refused'   => '拒否済みとマークされた見積もり!',
        'email_required'   => 'この顧客の電子メールアドレスがありません!',
        'expired_estimate' => '期限切れの見積は変更できません!',

        'status' => [
            'created'      => '作成日 :date',
            'viewed'       => '閲覧',
            'sent'         => [
                'draft' => '送信されない',
                'sent'  => '送信 :date',
            ],
            'invoiced'     => '請求済',
            'not_invoiced' => '請求されない',
            'approved'     => '承認済み',
            'refused'      => '拒否',
            'await_action' => '連絡先のアクションを待機中',
        ],
    ],
];
