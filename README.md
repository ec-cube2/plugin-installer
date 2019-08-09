# EC-CUBE2 Plugin / Module Installer for Composer

EC-CUBE2 の Plugin / Module を Composer で管理できるようになります。

EC-CUBE2への実際のインストールなどは分離しました。`eccube2/cli` を利用してください。

## Installation / Usage

### 1. コマンドを実行するか `composer.json` を編集してください

例) ExamplePlugin ( `eccube2/example_plugin` ) をインストールする場合

以下のようにコマンドを実行してください。  
もちろん、プラグインのバージョン指定も可能です。

```sh
$ composer require eccube2/example_plugin
```

以下のようにEC-CUBEのルートディレクトリの `composer.json` を編集してください。  
`require-dev` はテストを実行しない場合、記載は不要です。

```json
{
    "require": {
        "eccube2/example_plugin": "*"
    },
    "require-dev": {
        "satooshi/php-coveralls": "dev-master",
        "phpunit/phpunit": "3.7.*"
    }
}
```

パスを変更したい場合

```json
{
    "extra": {
        "installer-paths": {
             "data/downloads/plugin/{$name}/": ["type:eccube2-plugin"],
             "data/downloads/module/{$name}/": ["type:eccube2-module"]
        }
    }
}
```

### 2. Composer を実行してください。

```sh
$ composer install --no-dev
```

### 3. これで終了。

これだけです。



### プラグイン用 composer.json

以下のように準備してください。
Packagist に登録する場合、 `eccube2` 部分はあなた専用の Namespace を指定する必要があります。  
`example_plugin` 部分は小文字で指定する必要があります。インストール時に ExamplePlugin のように CamelCase に変換されます。

Git で管理する場合には適切なバージョンの tag をつければ Packagist が自動で認識してくれます。

```json
{
    "name": "eccube2/example_plugin",
    "description": "サンプルプラグイン",
    "type": "eccube2-plugin",
    "license": "LGPL",
    "homepage": "http://www.example.com/",
    "authors": [
        {
            "name": "Tsuyoshi Tsurushima",
            "homepage": "http://www.example.com/"
        }
    ],
    "require": {
        "eccube2/plugin-installer": "^1.0"
    }
}
```



### モジュール用 composer.json

以下のように準備してください。
Packagist に登録する場合、 `ec-cube-plugin` 部分はあなた専用の Namespace を指定する必要があります。  
`mdl_example` 部分が、モジュールの code になります。他のモジュールと重複しない必要があります。

Git で管理する場合には適切なバージョンの tag をつければ Packagist が自動で認識してくれます。

※オーナーズストア経由で導入したモジュールと同一もモジュールをインストールすると動作に影響する可能性があります。

```json
{
    "name": "eccube2/mdl_example",
    "description": "サンプルモジュール",
    "type": "eccube2-module",
    "license": "LGPL",
    "homepage": "http://www.example.com/",
    "authors": [
        {
            "name": "Tsuyoshi Tsurushima",
            "homepage": "http://www.example.com/"
        }
    ],
    "require": {
        "eccube2/plugin-installer": "^1.0"
    }
}
```

## Requirements

PHP 5.3.3 以上


## Author

Tsuyoshi Tsurushima


## License

EC-CUBE Plugin / Module Composer Installer は LGPL-3.0 でライセンスされています。 - LICENSE ファイルに詳細の記載があります。  
EC-CUBE Plugin / Module Composer Installer is licensed under the LGPL-3.0 License - see the LICENSE file for details.
