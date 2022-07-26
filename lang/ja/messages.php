<?php

return [

    // 例外メッセージ
    'exceptions' => [
        '400'                  => 'リクエストが不正です。',
        '401'                  => '認証が必要です。',
        '403'                  => 'アクセスが禁止されています。',
        '404'                  => 'コンテンツが見つかりません。',
        '408'                  => 'リクエストがタイムアウトしました。',
        '414'                  => 'URIが長すぎます。',
        '500'                  => 'サーバ内部のエラーです。',
        '503'                  => 'サービスがご利用になれません。',
    ],

    // 通常 メッセージ
    'info.logged.in'           => 'ログインしました。',
    'info.logged.out'          => 'ログアウトしました。',

    // 成功 メッセージ
    'success.created'          => ':name を登録しました。',
    'success.updated'          => ':name を更新しました。',
    'success.deleted'          => ':name を削除しました。',
    'success.sent'             => ':name を送信しました。',
    'success.imported'         => ':name を取り込みました。',
    'success.imported.users'   => 'ユーザマスタ を取り込みしました。ユーザ情報が変更になりましたので、再度ログインください。',
    'success.exported'         => ':name をCSV出力しました。',
    'success.uploaded'         => ':name をアップロードしました。',
    'success.cleared'          => ':name をクリアしました。',
    'success.completed'        => ':name に成功しました。',
    'success.account_payable.sent' => '仕入先コード :credit_account_code へ買掛金計上通知書送信しました。',
    'success.change_order'     => ':name の順番を変更しました。',

    // 警告 メッセージ
    'warning.already'          => ':name は既に登録されています。',
    'warning.edit'             => ':name は編集できません。',
    'warning.edit_for'         => ':name は:forのため、編集できません。',
    'warning.send'             => ':name は送信できません。',
    'warning.send_for'         => ':name は:forのため、送信できません。',
    'warning.select'           => ':name 選択されていません。',
    'warning.no_authority'     => 'このページへのアクセス権限がありません。',
    'warning.user_not_exists'  => ':name のユーザーは存在しません。',

    // エラー メッセージ
    'danger.not_found'          => ':name が見つかりませんでした。',
    'danger.session.timeout'    => 'セッションタイムアウトとなりました。お手数ですがもう一度操作をやり直してください。',
    'danger.imported'           => ':name を取り込みに失敗しました。システム管理者にお問い合わせください。',
    'danger.account_payable'    => '仕入先コード :name には、買掛金計上通知書送信対象のデータがありません。',
    'danger.account_payable.send' => '仕入先コード :credit_account_code へ買掛金計上通知書の送信に失敗しました。 仕入先名: :slip_header_text 支店名: :branch_name 宛先: :mail',
    'danger.error_capture'      => ':name の取込でエラーが発生しました。ファイル内容を確認して再度お試しください。',
    'danger.error_inputfile'    => ':name の取込で項目エラーが発生しました。ファイル内容を確認して再度お試しください。<br/>設定項目：:cloumn <br/>取込項目：:errcloumn',
    'danger.failed'             => ':name に失敗しました。',
    'danger.swift_transport_exception' => '買掛金計上通知書の送信に失敗しました。GMailとの接続に失敗しました。',
];