<?php

return [
    'title'                    => 'メールテンプレート',
    'estimate_new_customer'    => [
        'subject' => '{estimate_number} 見積もりが作成されました',
        'body'    => '様 {customer_name},' .
                     '<br /><br />' .
                     '私たちはあなたのために以下の見積もりを用意しました: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     '見積もりの​​詳細は以下のリンクからご覧いただけます: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'ご不明な点がございましたら、お気軽にお問い合わせください。' .
                     '<br /><br />' .
                     '宜しくお願いします、' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => '{estimate_number} 推定思い出の通知',
        'body'    => '様 {customer_name},' .
                     '<br /><br />' .
                     'これは思い出にくい通知です <strong>{estimate_number}</strong> 見積もり。' .
                     '<br /><br />' .
                     '推定合計は {estimate_total} で期限切れになります <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     '見積もりの​​詳細は以下のリンクからご覧いただけます: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     '宜しくお願いします、' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => '{estimate_number} 推定思い出の通知',
        'body'    => 'こんにちは，' .
                     '<br /><br />' .
                     'これは、通知を思い出させる <strong>{estimate_number}</strong>に見積もり {customer_name}.'
                     .
                     '<br /><br />' .
                     '推定合計は {estimate_total} で期限切れになります<strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     '次のリンクから見積もりの​​詳細を確認できます。: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     '宜しくお願いします、' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => '{estimate_number} 承認された見積もり',
        'body'    => 'こんにちは，' .
                     '<br /><br />' .
                     '{customer_name} 承認された <strong>{estimate_number}</strong> 見積もり.' .
                     '<br /><br />' .
                     '次のリンクから見積もりの​​詳細を確認できます。: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     '宜しくお願いします、' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => '{estimate_number} 拒否された見積もり',
        'body'    => 'こんにちは，' .
                     '<br /><br />' .
                     '{customer_name} 拒否した <strong>{estimate_number}</strong> 見積もり.' .
                     '<br /><br />' .
                     '次のリンクから見積もりの​​詳細を確認できます。: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     '宜しくお願いします、' .
                     '<br />' .
                     '{company_name}',
    ],

];
