# EC-CUBE2 Installer for Composer

EC-CUBE2 の Plugin / Module / Template を Composer で管理できるようになります。

EC-CUBE2への実際のインストールなどは分離しました。`ec-cube2/cli` を利用してください。

## Installation / Usage

### 1. コマンドを実行してください。

例) ExamplePlugin ( `ec-cube2-plugin/example_plugin` ) をインストールする場合

以下のようにコマンドを実行してください。  
もちろん、プラグインのバージョン指定も可能です。

```sh
$ composer require ec-cube2-plugin/example_plugin
```

もちろん、通常のComposerと同様にGitHubなどの外部リポジトリをそのまま指定することも可能です。  
Composer の[ドキュメント](https://getcomposer.org/doc/05-repositories.md#vcs)を参照してください。

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ec-cube2-plugin/example_plugin"
        }
    ],
    "require": {
        "ec-cube2-plugin/example_plugin": "dev-master"
    }
}
```



インストールしたいパスを変更したい場合

```
{
    "extra": {
        "installer-paths": {
            "data/downloads/plugin/{$name}/": ["type:eccube2-plugin"],
            "data/downloads/module/{$name}/": ["type:eccube2-module"],
            "data/Smarty/templates/{$name}/": ["type:eccube2-template"]
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


## composer.json

### プラグイン

以下のように準備してください。
Packagist に登録する場合、 `ec-cube2-plugin` 部分はあなた専用の Namespace を指定する必要があります。  
`example_plugin` 部分は小文字で指定する必要があります。インストール時に ExamplePlugin のように CamelCase に変換されます。

```
{
    "name": "ec-cube2-plugin/example_plugin",
    "description": "サンプルプラグイン",
    "type": "eccube2-plugin",
    "license": "LGPL",
    "homepage": "http://www.example.com/",
    "require": {
        "ec-cube2/plugin-installer": "^1.0"
    }
}
```


### モジュール

以下のように準備してください。
Packagist に登録する場合、 `ec-cube2-module` 部分はあなた専用の Namespace を指定する必要があります。  
`mdl_example` 部分が、モジュールの code になります。他のモジュールと重複しない必要があります。

※オーナーズストア経由で導入したモジュールと同一もモジュールをインストールすると動作に影響する可能性があります。

```
{
    "name": "ec-cube2-module/mdl_example",
    "description": "サンプルモジュール",
    "type": "eccube2-module",
    "license": "LGPL",
    "homepage": "http://www.example.com/",
    "require": {
        "ec-cube2/plugin-installer": "^1.0"
    }
}
```


### テンプレート

以下のように準備してください。
Packagist に登録する場合、 `ec-cube-plugin` 部分はあなた専用の Namespace を指定する必要があります。  
`sample` 部分が、テンプレートの code になります。他のテンプレートと重複しない必要があります。

```
{
    "name": "ec-cube2-template/sample",
    "description": "サンプルテンプレート",
    "type": "eccube2-template",
    "license": "LGPL",
    "homepage": "http://www.example.com/",
    "require": {
        "ec-cube2/plugin-installer": "^1.0"
    }
}
```

## Requirements

PHP 5.3.3 以上
