## About this starter kit

This kit is a scaffolding basic that you can start your project with.

### Installation
- Open terminal and clone the repo : 
``` bash
git clone https://github.com/jichiduo/laravel8_livewire2_bootstrap4_starter.git 
```
- Go to the project directory and copy the `env.example` as `.env` file
- Update the `.env` file as you need. Especially the database config
- Run `composer install`
- Run `npm install && npm run dev`
- Run `php artisan migrate:fresh --seed`  
- The default username/password is `admin@admin.com/password`
- Run `php artisan key:generate`
- Run `php artisan serve`
- Open the browser and type `http://localhost:8000`

### Global Toastr Notifications
System provide a global toastr notifications system. You can use it to show success, error, warning, info, and others.
At the bottom of the `app.blade.php` file, you can find the following code to show a success message:
```javascript
    <script>
        window.addEventListener('toastr', event => {
            toastr.success(event.detail.message);
        });
    </script>
```
In the liveware componet class you can use the following code to dispatch an event to show a success message:
```php
$this->dispatchBrowserEvent('toastr', ['message' => 'User successfully updated.']);
```

## License

This kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


