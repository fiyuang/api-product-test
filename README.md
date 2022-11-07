<div align="center">
      <h1> <img src="https://thumbs.dreamstime.com/z/product-icon-symbol-creative-sign-quality-control-icons-collection-filled-flat-computer-mobile-illustration-logo-150923733.jpg" width="80px"><br/>API Product Test</h1>
     </div>


# Description
A simple API Product with CRUD function and JWT auth.

# Features
This API developed by PHP 8.0 with Lumen Framework 9.0

# Screenshots
 <img src="https://drive.google.com/file/d/1nmKbAJAY1cZxme9p98ERjOUEdheiFKRT"> <img src="https://drive.google.com/file/d/16eMpkatFgfy5PJexRqFFnSKAMvvB0y-C/view?usp=sharing"> <img src="https://drive.google.com/file/d/1GNKrm-xYOnIMthvZsxl4P0swdWEZqGsD/view?usp=share_link"> <img src="https://drive.google.com/file/d/1OAAW4AFEicDr4YWL6ku_ZKHE_baDisOE/view?usp=share_link"> <img src="https://drive.google.com/file/d/1epauUI0eACNXJ0Yr15oQh_bd1fJmASdr/view?usp=share_link">
 
# Tech Used
 ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![JWT](https://img.shields.io/badge/JWT-black?style=for-the-badge&logo=JSON%20web%20tokens) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white) ![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)
      
# Getting Start:
Before you running the program, make sure you've run this command:
- `composer install` or `composer update`
-  Rename `.env.example` to `.env`
-  Generate the jwt secret key with `php artisan jwt:secret`

### Database setup:
- Create your own database, and put the credential in env file
- Run the migration with `php artisan migrate`
- Run db seeder with `php artisan db:seed --class=UsersTableSeeder`

### Run the program
`php -S localhost:8000 -t public`

The program will run on http://localhost:8000

### Credential Account
- email: demo@mail.com
- password: demo

### API Route List
| Method | URL | Description |
| ----------- | ----------- | ----------- | 
| POST | localhost:8000/login  | Login User |
| POST | localhost:8000/logout  | Logout User |
| GET | localhost:8000/product  | Get All Product |
| POST | localhost:8000/product  | Create & Update Product (Add 'id' params in request body for the update function) |
| GET | localhost:8000/product/{id}  | Get Detail a Product |
| DELETE | localhost:8000/product/{id}  | Delete a Product |
 


      
<!-- </> with 💛 by readMD (https://readmd.itsvg.in) -->
