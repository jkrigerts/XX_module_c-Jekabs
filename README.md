## How to run the project locally?

1. Clone the project: `git clone https://github.com/jkrigerts/XX_module_c-Jekabs.git`
2. `cd ` into the projects folder
3. Update Composer: `composer update`
4. Copy, rename .env file: `cp .env.example .env`
5. Generate key: `php artisan key:generate`
6. Create a local database, named `XX_module_c`
7. Connect to the database by configuring .env file - host, port and user credentials must match.
8. `php artisan migrate:fresh --seed`
9. `php artisan serve`
10. Go to admins route: `http://127.0.0.1:8000/XX_module_c/admin`
