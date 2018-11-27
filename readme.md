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

## Kekurangan
TDD Tidak diterapkan secara menyeluruh
## Dummy Data
Dummy data menggunakan Seeder, berisi 3 Role dan 3 User
