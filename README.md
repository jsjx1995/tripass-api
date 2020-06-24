# tripass-api

laradockを使って環境構築しています。

## 1. laradockインストール

laravelプロジェクト用の好きなディレクトリを作成してlaradockをインストールする

```
mkdir {project_dir}
cd {project_dir}
git clone https://github.com/Laradock/laradock.git
```

## 2. laradock内のenv-exampleファイルをコピーし、`.env`ファイルを作成

```
cd laradock
cp env-example .env
```

## 3. laravelインストール

このプロジェクトをインストールする

```
git clone https://github.com/ainoue1995/tripass-api.git
```

## 4. laradockディレクトリの中の`.env`ファイルを編集して、プロジェクトへのパスを記入

```
# Point to the path of your applications code on your host
APP_CODE_PATH_HOST=../tripass-api
```

## 5. コンテナを起動してworkspaceに入る

サーバはnginx、DBはmariadbを使用しています。

```
docker-compose up -d nginx mariadb workspace
docker-compose exec --user=laradock workspace bash
```

laradockユーザでログインしないとrootで入ってしまうので、composer installができない。

(入ってから`su - laradock`でもいいと思ったけど、カレントディレクトリの設定をしているので、
rootユーザで入ってしまうと、プロジェクトのディレクトリに入ることができない)


## 6. composer install

```
composer install
```

## 7. コンテナを再起動して反映させる

```
docker-compose restart
```

## localhostにアクセスし、TRIPASSがタイトルのページを確認する

![laravel-tripass](https://user-images.githubusercontent.com/42629073/84569919-eecf9c00-adc4-11ea-824e-cf8b81e51425.png)

