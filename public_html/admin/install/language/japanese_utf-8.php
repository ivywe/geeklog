<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 2.2                                                               |
// +---------------------------------------------------------------------------+
// | japanese_utf-8.php                                                        |
// |                                                                           |
// | Japanese language file for the Geeklog installation script                |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2022 by the following authors:                         |
// |                                                                           |
// | Authors: Tony Bibbs        - tony AT tonybibbs DOT com                    |
// |          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net    |
// |          Jason Whittenburg - jwhitten AT securitygeeks DOT com            |
// |          Dirk Haun         - dirk AT haun-online DOT de                   |
// |          Randy Kolenko     - randy AT nextide DOT ca                      |
// |          Matt West         - matt AT mattdanger DOT net                   |
// |          Geeklog.jp group  - info AT geeklog DOT jp                       |
// |          mystral-kk        - geeklog AT mystral-kk DOT net                |
// |          Tom Homer         - tomhomer AT gmail DOT com                    |
// +---------------------------------------------------------------------------+
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+

// +---------------------------------------------------------------------------+

$LANG_CHARSET = 'utf-8';

// +---------------------------------------------------------------------------+
// | Array Format:                                                             |
// | $LANG_NAME[XX]: $LANG - variable name                                     |
// |                 NAME  - where array is used                               |
// |                 XX    - phrase id number                                  |
// +---------------------------------------------------------------------------+

// +---------------------------------------------------------------------------+
// install.php

$LANG_INSTALL = array(
    0 => 'Geeklog - The secure CMS.',
    1 => 'インストールで困ったら、こちらのサイトへ',
    2 => 'The secure CMS.',
    3 => 'Geeklogをインストールする',
    4 => 'PHP %s以上が必要です',
    5 => '残念ながらGeeklogをインストールするには最低でもPHP %sが必要です(現在のバージョンは ',
    6 => ')。自分で<a href="http://www.php.net/downloads.php">PHPをバージョンアップする</a>か、ホスティング会社に依頼してください。',
    7 => 'Geeklogファイルが見つかりません',
    8 => 'Geeklogの重要なファイルが見つかりません。既定の位置から移動させていると思われます。下のテキストボックスにファイルのパスを入力してください。:',
    9 => 'Geeklogへようこそ!　Geeklogを選んでいただき、ありがとうございます。',
    10 => 'ファイル/ディレクトリ',
    11 => 'パーミッション',
    12 => '推奨値',
    13 => '現在',
    14 => '',
    15 => 'Geeklogのフィード(RSS)が無効になっています。<code>backend</code>ディレクトリのテストを行いませんでした。',
    16 => '移行',
    17 => 'ユーザー写真が無効になっています。<code>userphotos</code>ディレクトリのテストを行いませんでした。',
    18 => '記事に画像を添付する機能が無効になっています。<code>articles</code>ディレクトリのテストを行いませんでした。',
    19 => 'Geeklogでは、いくつかのファイルとディレクトリがWebサーバーから書き込める必要があります。以下は、変更する必要のあるファイルとディレクトリの一覧です。',
    20 => '警告',
    21 => '以下のエラーが解消されるまで、インストールできません。先に必要な変更を行ってください。',
    22 => '不明',
    23 => 'インストールの種類を選択してください:',
    24 => '新規インストール',
    25 => 'アップグレード',
    26 => '変更できませんでした：',
    27 => '。ファイルはWebサーバーから書き込みできますか?',
    28 => 'siteconfig.php。このファイルはWebサーバーから書き込みできますか?',
    29 => 'Geeklog Site',
    30 => 'Another Nifty Geeklog Site',
    31 => '必須の設定情報',
    32 => 'サイト名',
    33 => 'サイトのスローガン',
    34 => 'データベースの種類',
    35 => 'MySQL',
    36 => 'MySQL(InnoDBテーブルをサポート)',
    37 => 'Microsoft SQL',
    38 => 'エラー',
    39 => 'データベースのホスト名',
    40 => 'データベース名',
    41 => 'データベースのユーザ名',
    42 => 'データベースのパスワード',
    43 => 'データベースの接頭子',
    44 => 'オプションの設定',
    45 => 'サイトのURL',
    46 => '(末尾のスラッシュをつけない)',
    47 => 'Adminディレクトリのパス',
    48 => 'サイトのEmail',
    49 => 'サイトのNo-Reply Email',
    50 => 'インストール',
    51 => '少なくともMySQL %sが必要です',
    52 => '残念ながら、Geeklogをインストールするには最低でもMySQL %sが必要です(現在のバージョンは ',
    53 => ')。自分で<a href="http://dev.mysql.com/downloads/mysql/">MySQLをアップグレードする</a>か、ホスティング会社に依頼してください。',
    54 => 'データベース情報が不正確です',
    55 => '残念ながら入力したデータベース情報が不正確です。戻ってやり直してください。',
    56 => 'データベースに接続できません',
    57 => '残念ながら指定されているデータベースが見つかりません。データベースが存在しないか、綴り(大文字小文字)が違うのでしょう。戻ってやり直してください。',
    58 => '。このファイルはWebサーバーから書き込みできますか?',
    59 => '注意',
    60 => 'お使いのMySQLのバージョンではInnoDBテーブルはサポートされていません。InnoDBサポートなしでインストールを続けますか?',
    61 => '戻る',
    62 => '次へ',
    63 => 'インストール済みのGeeklogのデータベースが既に存在しています。既存のGeeklogデータベースを上書きして新規インストールを行うことはできません。続けるには、次のどちらかを行ってください:',
    64 => '1. 既存のデータベースからテーブルを削除する。2. データベースを削除してから作成し直す。その後、下の"再試行"をクリックしてください。',
    65 => '下の"アップグレード"オプションを選択することで、(Geeklogの新バージョンへ)データベースのアップグレードを行います。',
    66 => '再試行',
    67 => 'Geeklogのデータベースを設定中にエラーが発生しました',
    68 => 'データベースが空ではありません。データベース中のテーブルを全て削除してから、やり直してください。',
    69 => 'Geeklogをアップグレード',
    70 => '始める前に現在のGeeklogのデータベースのバックアップを行ってください。インストール・スクリプトはGeeklogのデータベースを変更するので、失敗してアップグレードをやり直すには、オリジナルのデータベースのバックアップが必要になります。警告しましたよ!',
    71 => '現在のGeeklogのバージョンを下で正確に選択してください。インストール・スクリプトは入力されたバージョンから少しずつアップグレードしていきます（つまり、任意の古いバージョンから次のバージョンへアップグレードできます:',
    72 => '）。',
    73 => 'インストール・スクリプトはGeeklogのベータ版やリリース候補(RC)版からのアップグレードは行いません。',
    74 => 'データベースは既に最新の状態になっています!',
    75 => 'データベースは既に最新の状態になっているようです。以前、アップグレードを実行したことがあるのでしょう。再びアップグレードを実行する必要があるなら、データベースのバックアップから復元を行ってからにしてください。',
    76 => '現在のGeeklogのバージョンを選択してください',
    77 => 'インストーラは現在のGeeklogのバージョンを判定できませんでした。下のリストから選択してください:',
    78 => 'アップグレードエラー',
    79 => 'Geeklogのアップグレード中にエラーが発生しました。',
    80 => '変更',
    81 => 'ちょっと待って!',
    82 => '下に列挙されたファイルのパーミッションを必ず変更する必要があります。変更するまでGeeklogをインストールできません。',
    83 => 'インストールエラー',
    84 => 'パス "',
    85 => '" は正しくありません。戻ってやり直してください。',
    86 => '言語',
    87 => 'https://www.geeklog.jp/forum/index.php?forum=6',
    88 => '以下のファイルを含むディレクトリに変更してください：',
    89 => '現在のバージョン:',
    90 => 'データベースは空?',
    91 => 'データベースが空のままか、入力してデータベースの情報が不正確なようです。ひょっとすると、アップグレードではなく、新規インストールするつもりだったのではないでしょうか?　戻ってやり直してください。',
    93 => '成功',
    94 => 'パスのヒント:',
    95 => 'インストールスクリプトファイルへの完全なパスはこちらです:',
    96 => 'インストーラはここで %s を探しています:',
    97 => 'パーミッション設定',
    98 => 'アドバンストユーザ',
    99 => 'コマンドライン(SSH)が使えるなら、Webサーバーにアクアセスしてください。shellを使えば、以下のコマンドのコピー・ペーストで簡単に実行できます。:',
    100 => '無効なモードを指定',
    101 => 'ステップ',
    102 => 'コンフィギュレーションモード入力',
    103 => '',
    104 => '不正な管理者パス',
    105 => '入力した管理者のディレクトリパスは不正確でした。もう一度やり直してください。',
    106 => 'PostgreSQL',
    107 => 'データベースのパスワードが必要です。',
    108 => 'データベースドライバーがありません!',
    109 => '緊急レスキューツール',
    110 => 'パーミッションは正しいようですが、インストールスクリプトはGeeklogのディレクトリに書き込むことができません。SELinuxを使っているなら、httpd プロセスに書き込み権限を与えてください。次のコマンドを試してみてください:',
    111 => 'Geeklog のバージョン',
    112 => 'インストール(すべてのプラグインも同時に)',
    113 => 'インストール(次の画面でインストールするプラグインを選択)',
    114 => '自動インストールに対応しているプラグインだけをインストールします(コアプラグインは対応しています)。対応していないプラグインは管理画面の「プラグイン」からインストールできます。',
    115 => 'アップグレード',
    116 => '「アップグレード」ボタンをクリックすると、Geeklogを最新バージョンにアップグレードします。このとき必要ならコアプラグインもアップグレードします。',
    117 => 'キャンセル',
    118 => '言語を選択する',
    119 => 'Copyright © 2020 <a href="https://www.geeklog.net/">Geeklog</a>',
    121 => 'ホーム',
    122 => 'ヘルプ',
    123 => '文字セットとデータベースの照合順序'
);

// +---------------------------------------------------------------------------+
// success.php

$LANG_SUCCESS = array(
    0 => 'インストール完了',
    1 => 'Geeklog ',
    2 => ' のインストールが完了しました!',
    3 => 'おめでとうございます。Geeklogの',
    4 => 'に成功しました。少し時間をさいて、以下の情報をご覧ください。',
    5 => '新しいGeeklogサイトにログインするには、次のアカウントを使用してください:',
    6 => 'ユーザ名:',
    7 => 'Admin',
    8 => 'パスワード:',
    9 => 'password',
    10 => 'セキュリティ警告',
    11 => '次の',
    12 => 'つのことを忘れずに行ってください',
    13 => 'installディレクトリを削除またはリネームする:',
    14 => '変更する',
    15 => 'アカウントのパスワードを変更する。',
    16 => 'パーミッションを設定する:',
    17 => 'と',
    18 => 'のパーミッションを次のものに変更する:',
    19 => '<strong>注意:</strong> セキュリティモデルを変更したので、新しいサイトの管理権限を持ったアカウントを作成しました。ユーザ名は <strong>NewAdmin</strong> で、パスワードは <strong>password</strong> です。',
    20 => 'インストール',
    21 => 'アップグレード',
    22 => '移行',
    23 => 'インストールに使用したファイルとディレクトリをすべて削除しますか?',
    24 => 'はい、削除します。',
    25 => 'いいえ、後で自分で削除します。',
    26 => '注意: <code>public_html/siteconfig.php</code>内の設定でサイトを無効にしている場合、再び有効にするまではサイトを使用できません。',
    27 => 'すべてのプラグインを更新しました。',
    28 => '更新できなかったプラグインを無効にしました。',
    29 => 'お使いの言語ファイル "%s" はもはやサポートされていないため、代わりに "english.php" を使用しています。',
);

// +---------------------------------------------------------------------------+
// migration

$LANG_MIGRATE = array(
    0 => 'バックアップファイルに"DROP TABLE"が追加されている場合、同じ名前のテーブルがあれば上書きされます。',
    1 => '実行する前に',
    2 => '以前のプラグインが新しいサーバーにコピーされていることを確認してください。',
    3 => '画像ディレクトリ:<br><code>public_html/images/articles/</code><br><code>public_html/images/topics/</code><br><code>public_html/images/userphotos/</code><br>が、新しいサーバーに移行されていることを確認してください。',
    4 => '<strong>1.5.0</strong>以前のバージョンからアップグレードする場合は、<code>config.php</code>もコピーしてください。移行後、これを参照して設定できます。',
    5 => 'マイグレーションの過程でGeeklogのバージョンアップを行い、しかも、使用中のテーマがGeeklogの新しいバージョンに含まれていない場合は、<em>使用中のテーマがGeeklogの新バージョンをサポートしているのを確認してからアップロードしてください</em>。マイグレーションを行ったサイトが適切に稼働することを確認できるまで、同梱されているデフォルトのテーマ "%s" を使用してください。',
    6 => 'バックアップファイルを選択',
    7 => 'ファイル選択...',
    8 => 'サーバーのbackupsディレクトリから',
    9 => 'あなたのコンピュータから',
    10 => 'ファイル選択...',
    11 => 'バックアップファイルが見つかりませんでした。',
    12 => 'このサーバーのアップロード制限は',
    13 => 'です。バックアップファイルがこれより大きい場合は制限値の',
    14 => 'を変更してください。タイムアウトになる場合は、FTPでバックアップファイルをサーバーにアップロードしてください。',
    15 => 'バックアップディレクトリが書き込み可能になっていません。パーミッションを777に設定してください。',
    16 => '移行',
    17 => 'バックアップファイルからの移行',
    18 => 'バックアップファイルが選択されませんでした。',
    19 => '保存されませんでした',
    20 => ' へ ',
    21 => 'ファイル',
    22 => 'が既にサーバーにあります。指定したファイルに置き換えますか?',
    23 => 'はい',
    24 => 'いいえ',
    25 => '',
    26 => '移行通知:',
    27 => '"',
    28 => '" プラグインが無効になっています。いつでも管理セクションからインストールを再開できます。',
    29 => '画像 "',
    30 => '" の中の "',
    31 => '" テーブルはここにあります ',
    32 => 'このデータベースファイルには、移行スクリプトで',
    33 => 'ディレクトリへの配置ができなかったプラグインがあります。それらのプラグインは無効にしました。無効になったプラグインは管理画面でいつでもインストールして再び有効にできます。',
    34 => 'このデータベースファイル',
    35 => 'には、移行スクリプトでディレクトリへの配置ができなかったファイル情報が含まれます。詳しくは<code>error.log</code>をチェックしてください。',
    36 => 'いつでもこれらを修正できます',
    37 => '移行完了',
    38 => '移行プロセスは完了しました。次の問題があるので対応してください:',
    39 => 'Zlibモジュールが有効になっていないため、圧縮ファイルを処理することができません。',
    40 => '圧縮ファイル "%1$s" には、SQLファイルが含まれていません。移行をやり直すには、<a href="%2$s">ここ</a>クリックしてください。',
    41 => 'データベース \'%s\' におけるバックアップファイルの解凍でエラーが発生しました。',
    42 => 'バックアップファイル \'%s\' が消えました...',
    43 => 'インポートアボート: ファイル \'%s\'がSQLダンプで表示されません。',
    44 => '致命的なエラー: データベースはインポートに失敗しました。継続できません。',
    45 => 'データベースのバージョンがわかりません。手動でアップデートしてください。',
    46 => '',
    47 => 'データベースに対して %s から %s へのアップグレードに失敗しました。',
    48 => '更新できなかったプラグインがあります。そのプラグインは無効にしてください。',
    49 => '現在のデータベースのデータを使用する'
);

// +---------------------------------------------------------------------------+
// install-plugins.php

$LANG_PLUGINS = array(
    1 => 'プラグインのインストール',
    2 => 'ステップ',
    3 => 'プラグインは新しい機能を提供する追加コンポーネントで、Geeklogの内部サービスを更に強化します。Geeklogはデフォルトでインストールしたくなる便利なプラグインを同梱しています。',
    4 => 'また、追加のプラグインをアップロードすることができます。',
    5 => 'アップロードしたファイルは zip または gzip 圧縮形式のプラグインファイルではありません。',
    6 => 'アップロードしたプラグインはすでに存在しています!',
    7 => '成功!',
    8 => '%s プラグインのアップロードに成功しました。',
    9 => 'プラグインをアップロードする',
    10 => 'プラグインファイルの指定',
    11 => 'アップロード',
    12 => 'インストールするプラグインを選択してください',
    13 => 'インストールする',
    14 => 'プラグイン名',
    15 => 'バージョン',
    16 => '不明',
    17 => '注意',
    18 => 'このプラグインは、プラグイン管理パネルから手動で有効化する必要があります。',
    19 => '一覧を更新',
    20 => '新しいプラグインはありません。'
);

// +---------------------------------------------------------------------------+
// bigdump.php

$LANG_BIGDUMP = array(
    0 => 'インポート開始',
    1 => ' バックアップファイル名:',
    2 => ' データベース名:',
    3 => ' データベースホスト名:',
    4 => 'シーク不可 ',
    5 => 'オープン不可 ',
    6 => ' インポート。',
    7 => '予期しないエラー：開始位置とオフセット位置が数値ではない値になっています',
    8 => '作業中 ファイル:',
    9 => 'ファイルの末尾にファイルポインタを移動できません。',
    10 => 'ファイルポインタ移動不可:',
    11 => 'PHPのMySQLエクステンションが利用できません。',
    14 => '中止した行番号:',
    15 => '。このクエリには',
    16 => '行以上が含まれています。各クエリの末尾にセミコロンを付けないツールでダンプファイルを生成した場合や、ダンプファイルの中に複数行INSERT文が含まれる場合に発生する可能性があります。',
    17 => 'エラーの発生した行番号:',
    18 => 'クエリ:',
    19 => 'MySQL:',
    20 => 'ファイルポインタオフセットを読み込めません。',
    21 => 'gzip形式で圧縮されているファイルが利用できない',
    22 => '進捗状況',
    23 => 'このデータベースの移行が正常に完了しました!',
    24 => '待機中 ',
    25 => ' ミリ秒</b> 次のセッションが始まるまで...',
    26 => 'インポート中止',
    27 => 'インポートの中止はこちら。',
    28 => 'インポートが完了するまでしばらく待ってください!',
    29 => 'エラーが発生しました。',
    30 => '最初からスタート',
    31 => '(再起動する前に古いテーブルを削除してください)'
);

// +---------------------------------------------------------------------------+
// Error Messages

$LANG_ERROR = array(
    0 => 'アップロードしたファイルは、php.iniで指定された制限 upload_max_filesize を超えています。他の方法、たとえばFTPでアップロードしてください。',
    1 => 'アップロードしたファイルのサイズは、HTMLのフォームで指定した MAX_FILE_SIZE を超えています。バックアップファイルをFTPなどの他の方法でアップロードしてください。',
    2 => 'ファイルの一部しかアップロードされませんでした。',
    3 => 'ファイルはアップロードされませんでした。',
    4 => '一時フォルダがありません。',
    5 => 'ディスク書き込みエラーです。',
    6 => '拡張子制限により、アップロードを中止しました。',
    7 => 'アップロードするファイルは php.ini で指定された post_max_size を超えています。データベースをFTPなどでアップロードしてください。',
    8 => 'エラー',
    9 => 'データベース接続エラー:',
    10 => 'データベースの設定をチェックしてください。',
    11 => '警告',
    12 => '情報',
    13 => '<p>インストーラーは<strong>Geeklog v%s から v%s</strong>へのアップグレードを検出しました。</p><p>インストーラーが検出した注意・警告・エラーは以下の通りです。インストールされているバージョンがかなり古い場合を考慮して、Geeklogのバージョンごとに表示しています。</p><p><strong>重要なメッセージをすべて注意深く読んでください。</strong>。これらはアップグレードと関係しており、アップグレードの前後であなたが従うべき追加の処置を表示しています。<em>エラーメッセージ</em>が表示されている場合は、問題点を修正するまで先に進むことはできません。</p><p>このページの最後で(エラーがなければ)インストールを継続するか前のページへ戻るかが表示されます。</p>',
    14 => 'アップグレードの注意点',
    15 => '話題IDと話題の最大長が128文字から75文字へ変更されました。このため、アップグレードの際に話題IDが強制的に切り詰められ、問題が発生するかもしれません(話題IDが75文字を超える場合)。75文字を超える話題IDを75文字に切り詰めたものが他の話題IDと重複しないか確認してください。',
    16 => '話題IDと話題の最大長が128文字から75文字へ変更されました。アップグレードを進める前に修正する必要のある話題IDを検出しました。',
    17 => 'Professionalテーマはサポートされなくなりました。Geeklog 2.1.1以前からProfessionalテーマやProfessional_cssテーマを使っている場合はサイトが正常に機能しなくなる可能性があります。',
    18 => 'コメントの署名',
    19 => "Geeklog 2.2.0より前のバージョンでは、コメントの署名はコメントともに保存されていました。現在のバージョンではコメントが表示されるときに署名が追加されます。後方互換性のためにアップグレードの際に保存されている署名をすべて削除します。
(これにより署名が二重に表示されることがなくなります。)",
    20 => 'プラグインの互換性',
    21 => 'Geeklogの内部構造の変更によりしばらく更新されていない一部の古いプラグインと互換性がなくなっている可能性があります。Geeklog 2.2.0へアップグレードする前に、インストール済みのすべてのプラグインを最新のものにしてください。<br><br>Geeklog 2.2.0へアップグレードしたいが、プラグインに関して自信を持てない場合は <a href="https://www.geeklog.net/forum/index.php?forum=2" target="_blank">Geeklog Forum</a> で質問してください。または、該当プラグインを無効化ないしアンインストールしてからGeeklog本体のアップグレードを行ってください。<br><br>アップグレードの際に問題が生じる場合は、<a href="/admin/rescue.php">緊急レスキューツール</a>を使用して、該当プラグインを無効にすることができます。',
    22 => 'デフォルトのセキュリティグループの割り当て',
    23 => '"Root"グループと"All Users"グループへのユーザーの割り当てが"Admin"ユーザー(ユーザーID: 2)とともに修正されます。"Admin"ユーザーが重複した権限を持っている場合、このアップグレードの際に解消されます。<br><br>注意: 権限の重複所有を引き起こしていた問題は既に修正されていますが、Geeklog 2.2.1よりも前にユーザーエディターで編集していたすべてのユーザーが影響を受けていた可能性があります。セキュリティグループをネストしている場合、影響を受けるのは権限のみです。ユーザーを保存した時点ではこれらの権限は正しいものになっているのですが、その後でセキュリティグループを修正すると、もはや所属していないセキュリティグループに対しても依然としてアクセス権を所有しているかもしれません。サイトごとの設定が違う以上、この状況を解消する唯一の方法は管理者が手動で個々のユーザーを調べて権限を確認するしか手立てがありません。',
    24 => 'FCKEditorの削除',
    25 => '開発が中止されているため、FCKEditorをGeeklogから削除しました。FCKEditorを使用する設定になっている場合、アップグレードの際にCKEditorを使用する設定に変更されます。',
    26 => 'Google+ OAuthログイン',
    27 => '<a href="https://support.google.com/plus/answer/9195133" target="_blank">Google+サービスが2019年4月2日に終了しました</a>。Geeklog 2.2.1では、Google+ OAuth認証をGoogle OAuth認証へ変更します。この変更のため、またGoogle APIを作成した時期により、コンフィギュレーションでAPIキーを変更する必要が生じたり、ユーザーがログインできなくなるかもしれません。<br><br>現在の Geeklog はリモートアカウントをローカルアカウントへ変更する方法を提供しています。リモートアカウント(Google OAuth, Facebook OAuth, OpenID など)を持っている場合、ユーザーのアカウントを変換・編集するために、「リモートアカウントをローカルアカウントへ変換する」にチェックを入れてから保存します。この時点でアカウントはローカルアカウントへ変換され、ランダムなパスワードが生成されます。アカウントにメールアドレスが登録されており、ユーザーの状態が有効な場合、アカウントのアクセス方法を書いたメールが自動的にユーザーに送られます。そうでない場合は、アカウントのアクセス方法を書いたものを用意し、ユーザーに知らせる必要があります。',
    28 => 'ユーザー名の重複とユーザー名末尾のスペース',
    29 => 'ユーザーが重複ないし空白のリモートアカウント(ユーザーの末尾にスペースがついたものを含む)を作成することが可能になっていました。前者はリモートアカウントを用いたログインに失敗した結果であり、削除されます。重複したユーザー名を持つアカウント(ローカルアカウントを含む)はユーザー名が変更されます。ローカルアカウントのユーザーの一部は、新しいユーザーを知るために「パスワード再設定」リンクを使用する必要があるかもしれません。<br><br>注意: この問題は極めてまれにしか見られないものであり、リモートアカウントを持つユーザーがいる場合に限って起こる可能性があります。ほとんどのユーザーは影響を受けません。',
    30 => '不適切な権限で投稿された記事',
    31 => 'Geeklog 2.0.0以降、ユーザーが投稿した記事を承認したり、記事エディターで編集する際に、デフォルトの記事の権限と記事管理者グループが使用されていませんでした。代わりに、その記事に対するデフォルトの話題の権限と話題管理者が使用されていました。この問題は現在では修正されていますが、以前に投稿された記事の権限をすべて調べ、必要なら更新する必要があります。<br><br>すべての記事の所有者と権限をデフォルトに変更する場合は、<a href="https://www.geeklog.net/forum/viewtopic.php?showtopic=97115" target="_blank">Geeklog Support Forum(英語)</a>をご覧ください。',
    32 => '静的ページの検索結果の修正',
    33 => '静的ページをPHPを有効にしたり、テンプレートともに使用している場合、Geeklogの検索結果がページに埋め込まれているコードを表示していた可能性があります。このような機能を使用していたページでは最終的に実行したページのキャッシュを保存しないようにしたため、この問題は現在では修正されています。ページを新規作成し、エディターでページを保存する際にキャッシュされたページは生成されていました(ページキャッシュが有効な場合)。つまり、ページへアクセスできるユーザー全員が同じ検索結果のキャッシュを見ていることになります。自動タグやPHPコード、モバイル用のテンプレート変数がページで使用されている場合、ユーザーによっては違うコンテンツが生成されるかもしれません。検索結果のキャッシュはそのページのビューの一つに過ぎないため、それがずっと検索されることになります。そのため、ユーザーがページを訪問して閲覧するものと検索結果がわずかに違うものになるかもしれません。静的ページでテンプレートやPHPコードを使用し、コンフィギュレーションで「静的ページPHPを含む」や「テンプレートページを含む」を「はい」に設定している場合には、このようなマイナス面を考慮してください。<br><br>残念ながら、実行時エラーが発生してインストールが中断する可能性があるため(そのページでインストーラーがアクセスできないものを使用している場合など)、アップグレードの際にこの検索結果のキャッシュを更新することはできません。<em>それゆえ、アップグレード終了後にこれらのページの検索結果のキャッシュが作られる前に、キャッシュされていないページをもう一度保存し直す必要があります。キャッシュを使用しているページはもう一度訪問したり、保存し直したりする必要があります。<strong>これを行わないと、検索結果にこれらのページが表示されません。</strong></em> For an automated script to perform this process automatically after the upgrade is complete, please check out the <a href="https://www.geeklog.net/forum/viewtopic.php?showtopic=97222" target="_blank">Geeklog Support Forum</a> for more information.',
    34 => 'データベースの文字セットが必要です。',
    35 => 'MySQLないしPostgreSQLの文字セットが定義されていません。dbconfig.phpを編集して、$_DB_charset変数に適切な文字セットを設定してください。<br><br>データベースの文字セットがサイトの既定の文字セット(public_htmlディレクトリ内の siteconfig.php で定義されています)と互換性が保たれていることを確認してください。様々な言語、文字セット、MySQL/PostgreSQLデータベースの照合順序(サイトの文字セットに基づいた適切な設定値を含みます)については、詳しくは<a href="/docs/japanese/install.html" target="_blank">Geeklogインストールドキュメント</a>をご覧ください。'
);

// +---------------------------------------------------------------------------+
// help.php

$LANG_HELP = array(
    0 => 'Geeklogインストールヘルプ',
    'description' => '<p>このヘルプページでは、Geeklogの新規インストールとマイグレーション(サイト移行)の際に入力を要求される各項目の意味を説明します。</p><p>インストール・アップグレード・マイグレーションで問題が生じた場合は、<a href="/docs/japanese/install.html">Geeklogインストール用ドキュメント</a>をご覧ください。他の疑問や問題点については、<a href="https://www.geeklog.net/forum/index.php?forum=1">Geeklog Install Support Forum(英語)</a>で同様の問題について調べたり、投稿してください。</p>',
    'site_name' => 'サイト名を入力します。後から変更することもできます。',
    'site_slogan' => 'サイトのスローガンを入力します。後から変更することもできます。',
    'db_type' => 'Geeklogは、MySQLかPostgreSQLをデータベースとして使用してインスト－ルすることができます。どちらを選ぶべきかよくわからなければ、ホスティング会社に連絡してください。<br><br><strong>注意</strong> InnoDBテーブルは(非常に)大規模なサイトではパフォーマンスが向上しますが、バックアップを取るのが複雑になります。',
    'db_host' => 'ホスト名を入力します。',
    'db_name' => 'データベース名を入力します。',
    'db_user' => 'データベースのユーザ名（アカウント）を入力します。',
    'db_pass' => 'パスワードを入力します。',
    'db_prefix' => 'テーブル名の接頭子を入力します。データベース内に他にテーブルがなければ、既定値を変更する必要はありません。',
    'site_url' => 'サイトのURLを入力します。',
    'site_admin_url' => 'AdminディレクトリのURLを入力します。',
    'site_mail' => 'サイト管理者のEmailアドレスを入力します。',
    'noreply_mail' => 'サイト管理者の No-Reply Email (返信を受け付けないEmailアドレス)を入力します。',
    'utf8' => 'サイトの文字セットの既定値としてUTF-8を用いるかどうかを指定します(データベースでUTF-8が使用可能な場合は、自動的にUTF-8を使用します)。多言語サイトを構築する場合にUTF-8を推奨します。絵文字をサポートする場合はUTF-8は必須です。<br><br>チェックするとデータベースの文字セットをUTF-8に設定します。<strong>チェックする場合は</strong>、データベースの照合順序が文字セットと互換性があることを確認してください(普通、照合順序は<strong>utf8_general_ci</strong>か、絵文字をサポートしたい場合は<strong>utf8mb4_general_ci</strong>)です。<em>ここをチェックしてもデータベースの照合順序が変わるわけではありません。インストールを行う前に手動で行う必要があります。</em><br><br>Geeklogのサイトの文字セットの既定値は \'iso-8859-1\' (Latin-1) で、MySQLの文字セット \'latin1\' (latin1_swedish_ci) と互換性があります。インストールに使用する言語を変更すると、使用する文字セットも変わります。中には限られた数の言語しかサポートしていない伝統的な古い文字セットもあります。\'UTF-8を使用する\' のチェックをはずすと、言語ごとの既定の文字セットを使用します。',
    'charactersets' => "以下に示すのは、Geeklogがインストール時にサポートする言語の文字セットと対応するデータベースの文字セット、推奨するデータベースの照合順序です。文字セットとデータベースの文字セット/照合順序に関する詳しい情報は、<a href=\"/docs/english/install.html\">Geeklogインストールドキュメント</a>をご覧ください。
    <div class=\"uk-overflow-auto\">
    <table class=\"uk-table uk-table-striped\">
        <thead>
            <tr>
                <th>言語</th><th>サイトの文字セット</th><th>MySQLの文字セット</th><th>MySQLの照合順序</th><th>PostgreSQLの文字セット</th><th>PostgreSQLの照合順序</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>英語</td><td>iso-8859-1</td><td>latin1</td><td>latin1_swedish_ci</td><td>LATIN1</td><td>?</td>
            </tr>
            <tr>
                <td>英語 (UTF-8)</td><td>utf-8</td><td>utf8/utf8mb4</td><td>utf8_general_ci/utf8mb4_general_ci</td><td>UTF8</td><td>en_US.UTF-8</td>
            </tr>
            <tr>
                <td>日本語</td><td>utf-8</td><td>utf8/utf8mb4</td><td>utf8_general_ci/utf8mb4_general_ci</td><td>UTF8</td><td>ja_JP.UTF-8</td>
            </tr>
            <tr>
                <td>ドイツ語</td><td>iso-8859-15</td><td>latin1</td><td>latin1_swedish_ci</td><td>LATIN9</td><td>?</td>
            </tr>
            <tr>
                <td>ヘブライ語</td><td>utf-8</td><td>utf8/utf8mb4</td><td>utf8_general_ci/utf8mb4_general_ci</td><td>UTF8</td><td>he_IL.UTF-8</td>
            </tr>
            <tr>
                <td>ポーランド語</td><td>iso-8859-2</td><td>latin2</td><td>latin2_general_ci</td><td>LATIN2</td><td>?</td>
            </tr>
            <tr>
                <td>中国語(簡体字)</td><td>utf-8</td><td>utf8/utf8mb4</td><td>utf8_general_ci/utf8mb4_general_ci</td><td>UTF8</td><td>zh_CN.UTF-8</td>
            </tr>
            <tr>
                <td>中国語(繁体字)</td><td>utf-8</td><td>utf8/utf8mb4</td><td>utf8_general_ci/utf8mb4_general_ci</td><td>UTF8</td><td>zh_TW.UTF-8</td>
            </tr>
        </tbody>
    </table>
    </div>",
    'migrate_file' => '移行するバックアップファイル(*.sql)を選択します。"backups"ディレクトリ内のファイルから、あるいはあなたのコンピュータからファイルをアップロードできます。または、データベースの現在の内容を移行することもできます。',
    'plugin_upload' => 'アップロードするプラグインの圧縮ファイル(.zip, .tar.gz, .tgzファーマット)を選んでインストールしてください。'
);

// which texts to use as labels, so they don't have to be translated again
$LANG_LABEL = array(
    'site_name'      => $LANG_INSTALL[32],
    'site_slogan'    => $LANG_INSTALL[33],
    'db_type'        => $LANG_INSTALL[34],
    'db_host'        => $LANG_INSTALL[39],
    'db_name'        => $LANG_INSTALL[40],
    'db_user'        => $LANG_INSTALL[41],
    'db_pass'        => $LANG_INSTALL[42],
    'db_prefix'      => $LANG_INSTALL[43],
    'site_url'       => $LANG_INSTALL[45],
    'site_admin_url' => $LANG_INSTALL[47],
    'site_mail'      => $LANG_INSTALL[48],
    'noreply_mail'   => $LANG_INSTALL[49],
	'charactersets'  => $LANG_INSTALL[123],
    'migrate_file'   => $LANG_MIGRATE[6],
    'plugin_upload'  => $LANG_PLUGINS[10]
);

// +---------------------------------------------------------------------------+
// rescue.php

$LANG_RESCUE = array(
    0 => 'ログインに成功しました。',
    1 => 'Geeklog緊急レスキューツール',
    2 => 'インストーラーへ',
    3 => 'Geeklog緊急レスキューツール',
    4 => '終了したら、<strong>必ずこのファイル( {{SELF}} )を削除してください!</strong>  他のユーザーがパスワードの推測に成功した場合、インストールしているGeeklogが重大な被害を被る可能性があります。',
    5 => '状態',
    6 => 'これからセキュリティで保護されたセクションにアクセスします。セキュリティ・チェックに合格しなければ、先に進むことはできません。',
    7 => '本人確認のために、データベースのパスワードを入力する必要があります。パスワードはGeeklogの "非公開領域/db-config.php" に保存されています。',
    8 => 'パスワード',
    9 => '確認する',
    10 => 'パスワードが不正です!',
    11 => '有効化 ',
    12 => '無効化 ',
    13 => '成功 ',
    14 => 'エラー ',
    15 => '設定を更新する際にエラーが発生しました。',
    16 => '設定を更新しました。',
    17 => 'パスワードを更新する際にエラーが発生しました。',
    18 => 'Geeklogパスワードリクエスト',
    19 => 'パスワードをリクエストしました',
    20 => '誰か(あなたであれば幸いです)がGeeklog緊急レスキューツールの緊急パスワードリクエストフォームにアクセスしました。新しいパスワード "%s" (アカウント "%s" サーバー %s)が作成されました。',
    21 => 'リクエストした覚えがない場合、サイトのセキュリティを確認してください。緊急レスキューツール "/admin/install/rescue.php" を忘れずに削除してください。',
    22 => '新しいパスワードが記録されたメールアドレスへ送られました。',
    23 => 'メールを送る際にエラーが発生しました。件名: ',
    24 => 'PHP情報',
    25 => 'メイン画面へ戻る',
    26 => 'システム情報',
    27 => 'PHPバージョン',
    28 => 'Geeklogバージョン',
    29 => 'オプション',
    30 => 'サイトに不具合を引き起こすプラグインやアドオンをインストールしてしまった場合、以下のオプションで問題点を修正できます。',
    31 => 'プラグインの有効化/無効化',
    32 => 'ブロックの有効化/無効化',
    33 => '主要な$_CONF変数の編集',
    34 => '管理者パスワードのリセット',
    35 => 'このサイトに現在インストールされているプラグインを有効/無効にできます。',
    36 => 'プラグインを選択してください',
    37 => '有効化',
    38 => '無効化',
    39 => 'このサイトに現在インストールされているブロックを有効/無効にできます。',
    40 => 'ブロックを選択してください',
    41 => '実行',
    42 => '主要な$_CONF変数を編集できます。',
    43 => 'Geeklogのroot/adminパスワードをリセットできます。',
    44 => 'パスワードをメールで送信する',
    45 => 'Geeklogのデータベースにコア情報がないため、Geeklogは未インストールまたはインストールが正常に完了していないようです。したがって、このレスキューツールを使用することはできません。'
);
