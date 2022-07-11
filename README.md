# Laravel Vue Quiz

Step to run 

```sh
git clone https://github.com/ibu123/recurrance-event.git
cp .env-example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed

npm install
npm run prod

```

please fill up database details in enviornment
set google client id and secret in enviornment file
```
GOOGLE_CLIENT_ID 
GOOGLE_CLIENT_SECRET
```

make sure to run application using localhost don't run application using php artisan serve beacuse 127.0.0.1:8000 not accepted as valid javascript origin by google.

if application in sub folder don't foreget to set

```
APP_URL 

```

And in vue pass sub folder path in createWebHistory function inside resources\js\quiz.js file like below in createRouter function

```
history: createWebHistory("/laravel-vue-quiz/")
```

make sure to run below command and dont forget to set proper APP_URL
```
php artisan ziggy:generate
```
