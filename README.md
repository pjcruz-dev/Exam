//Installation
1. Git clone https://github.com/pjcruz-dev/Exam.git
2. Run composer install
3. copy .env.example .env
	- Go to .env put the databasename(Make sure that this is the same with phpMyAdmin)
	- Create Database Name in localhost( Xampp/Wamp )
	- Config your .env

	DB_DATABASE="exampleDB_Name"
	DB_USERNAME=root
	DB_PASSWORD=

4. Run php artisan key:generate
5. Run php artisan migrate
6. Run php artisan serve
