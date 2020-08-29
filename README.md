
# # Altar Site Profile
Paket Profile Situs. Paket yang terintegrasi dengan Altar ([https://github.com/aldhix/altar](https://github.com/aldhix/altar))

## Use
- Laravel 7 ([https://laravel.com/](https://laravel.com/))
- Bootstrap v4.4.1 ([https://getbootstrap.com/](https://getbootstrap.com/))
- AdminLTE  v3.0.5 ([https://adminlte.io/](https://adminlte.io/))
- Altar Admin ([https://github.com/aldhix/altaradmin](https://github.com/aldhix/altaradmin))

## Instalasi
Pastikan Altar dan Altar Admin sudah terinstal dan sudah mengkonfigurasi koneksi database pada laravel di file `.env` dan `config/database.php` apabila tahap ini belum dilakukan jangan dulu ketahap berikutnya. 

### Command
Pada terminal lakukan perintah dibawah ini:

    composer require aldhix/altarsiteprofile
    php artisan vendor:publish --provider=Aldhix\Altarsiteprofile\ServiceProvider --force
    composer dump-autoload
    php artisan migrate:fresh
    php artisan db:seed

### Routes
Lakukan penambahan route pada `routes\web.php` tambahkan perintah.

    Altaradmin::routes('administrator', function(){
    	Demo::routes();
    	Route::group(['middleware'=>'altaradmin.role:super,admin'], function ()
    	{
    		Altarsite::routes();
    		Route::resource('admin', 'AdminController');
    	});	
    });

## Fitur

### Altarsite Class

Mengambil data situs profile /`site_profiles` dengan perintah `Altarsite::data()` atau `Altarsite::profile()`.
 
 contoh :
 
`{{  Altarsite::data()->name }}`

output:

Altar
