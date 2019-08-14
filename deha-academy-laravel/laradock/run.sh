git stash
git checkout develop
docker-compose up -d nginx mysql
docker-compose exec workspace composer install
docker-compose exec workspace php artisan key:generate
docker-compose exec workspace php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
docker-compose exec workspace php artisan migrate:reset
docker-compose exec workspace php artisan migrate
docker-compose exec workspace php artisan db:seed --class=UsersTableDataSeeder
docker-compose exec workspace npm install
docker-compose exec workspace npm run watch