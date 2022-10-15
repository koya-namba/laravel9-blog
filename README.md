# laravel9-カリキュラム

## 概要
カリキュラムの9-3まで実装済み．  
(カリキュラム9-2)は未実装．  
問題を作成しているので，簡単なテストができる．

## 問題
### 問題1
web.phpについて
```php
Route::get('/', 'index')
```
indexは何を表しているか．  

### 問題2
PostControllerのindexについて
```php
view('posts/index')
```
上記は何を表しているか．  

### 問題3
index.blade.phpについて
```php
{{ $post->id }}
```
$postはどこで定義されているか．  

### 問題4
index.blade.phpについて
```php
@foreach ($posts as $post)
```
$postsはどこで定義されているか．  

### 問題5
web.phpについて
```php
Route::get('/posts/{post}', 'show');
```
{post}はどこの何と一致している必要があるか．  

### 問題6
create.blade.phpについて
```php
<form action="/posts" method="POST">
```
action="/posts"はどこと一致している必要があるか．  

### 問題7
PostControllerのstoreについて
```php
$input=$request['post'];
```
$inputには何と何のデータが入っているか．  

### 問題8
PostControllerのstoreについて
```php
$post->fill($input)->save();
```
fill()を実行する前にはどこに何を記述すべきか．  

## メモ：インストール
初期設定
```bash
git clone git@github.com:koya-namba/laravel9-blog.git
cd laravel9-blog
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```

.envを設定
```bash
DB_DATABASE=blog
DB_USERNAME=dbuser
DB_PASSWORD={db_password}
```

実行
```bash
php artisan migrate:fresh --seed
php artisan serve --port=8080
```
