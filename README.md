
# API Demo  
This is an example project asked to create in task documentation  

## Requirements

 - PHP     : 8.3
 - MySQL   :  8.*
 - Laravel : 11
 - Node    : 20.*

## Run Locally  

Clone the project
run below commands
 - `composer install`
 - `php artisan migrate` 
 - `php artisan serve` Or you can create virtual host what suits you

~~~bash  
  git clone https://github.com/Prateik2710/upwork-api-demo.git
~~~

Go to the project directory  

~~~bash
  cd api-project
~~~

Install dependencies  

~~~bash  
composer install
~~~

Start the server  

~~~bash  
php artisan serve
~~~

## Description

  - Base api is as below
  - `http://localhost:8000/api/v1` 

   - use endpoint submission with given parameters and it will store the data in jobs table

  - after that you need to run one command `php artisan queue:work` in order to store the data in submissions table
  - once you run the command it will create two events

  - one is using observer (additionally create just for sharing my knowledge)
  - another is submissionSaved event which is mentioned in the task