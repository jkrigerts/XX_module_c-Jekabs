## How to run the project locally?

1. Clone the project: `git clone`
2. Update Composer: `composer update`
3. Copy, rename .env file: `cp .env.example .env`
4. Generate key: `php artisan key:generate`
5. Create a local database, named `XX_module_c`
6. Connect to the database by configuring .env file - host, port and user credentials must match.
7. `cd ` into the projects folder
8. `php artisan migrate:fresh --seed`
9. `php artisan serve`
10. Go to admins route: `http://127.0.0.1:8000/XX_module_c/admin`
