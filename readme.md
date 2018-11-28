# Installation
```
composer install/update
```
`npm install`

## Helper
untuk menampilkan validasi satuan di laravel biasa menggunakan

```
@if ($errors->has('password'))
<span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('password') }}</strong>
</span>
@endif
```
buat helper untuk menampilkan validasi satuan di `app\Http\Helpers`
untuk menampilkan error cukup menggunakan code
```
{!! hasError($errors,'field') !!}
```

## Queue
Queue pada Import excel dilakukan ketika data yang diimport lebih dari 500

## Observer
Observer terdapat pada model Product, dimana pada saat file foto dimasukkan, maka foto baru akan disimpan,
dan pada saat mengupdate foto, jika ada foto baru yang dimasukkan, maka foto lama akan terhapus, namun jika tidak maka foto lama tidak terhapus 

## Kekurangan
TDD Tidak diterapkan secara menyeluruh
## Dummy Data
Dummy data menggunakan Seeder, berisi 3 Role dan 3 User

## UPDATE
LOG USER Jika mencoba masuk ke halaman diluar otoritasnya

## QUEUE UPDATE
jalankan kembali `php artisan migrate` untuk memasukan table queue , untuk testing queue, import product jika lebih dari 5 maka akan di eksekusi ke queue job
jalankan `php artisan queue:work`
