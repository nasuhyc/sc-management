
# School Management System

- This project is a school management system application that stores information about schools and enrolled students in a database. It also includes a RESTful API for user access.

- The project has been completed and the test have been written.You can find the test images in the "sc-file" folder.

## Run it on your computer

Clone the project
- This project has been executed on Sail. Run the project using the Ubuntu operating system.
- You can refer to the following link for more information: https://laravel.com/docs/10.x/sail

```bash
git clone https://github.com/nasuhyc/sc-management.git
```
```bash
cd sc-management
```
Install required packages

```bash
composer update
```

```bash
./vendor/bin/sail up
```

### Configuring A Shell Alias

#### Bash | Zsh

- If you are using Bash

```bash
echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.bashrc
```
```bash
source ~/.bashrc
```


- If you are using Zsh

```bash
echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.zshrc
```
```bash
source ~/.zshrc
```

### Run
```bash
sail up
```


#### `.env`
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=*
DB_USERNAME=root
DB_PASSWORD=


MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=*
MAIL_PASSWORD=*
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="${APP_NAME}"

```


```bash
  sail artisan migrate:fresh --seed
```

## REST API Usage


#### Register
```http
  POST - http://localhost:80/api/register

```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | Nasuh |
| `email` | `string` | nasuhyc@gmail.com |
| `password` | `string` | 123123 |
| `password_confirmation` | `string` | 123123 |

#### Login

```http
  POST - http://localhost:80/api/login
```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | nasuhyc@gmail.com |
| `password` | `string` | 123123 |


#### Logout

```http
  POST - http://localhost:80/api/logout
```

----

#### School
POST
- http://localhost:80/api/school/
```http
  {
    "name":"School 1"
  }
```
GET
- http://localhost:80/api/school/

GET-ID
- http://localhost:80/api/school/{id}

PUT
- http://localhost:80/api/school/{id}
```http
  {
    "name":"UpdateSchool"
  }
```
DELETE
- http://localhost:80/api/school/{id}

----
#### Student

POST
- http://localhost:80/api/school/
```http
  {
    "name":"Nasuh Nasuh",
    "school_id":1
  }
```
GET
- http://localhost:80/api/student/

GET-ID
- http://localhost:80/api/student/{id}

PUT
- http://localhost:80/api/student/{id}
```http
  {
    "name":"Update Name Name"
  }
```
DELETE
- http://localhost:80/api/student/{id}
  
