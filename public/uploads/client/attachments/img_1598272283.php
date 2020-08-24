If your application doesn’t need registration, 
you may disable it by removing the newly created RegisterController and modifying your route declaration: 
Auth::routes(['register' => false]);.



in cmd ==>
php artisan tinker // used to check DB relationships
 App\User::find(2)
