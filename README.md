## PHP test assignment


## Project setup

To run the project, run:

```
php artisan serve 
php artisan migrate
npm install
npm run dev
```
Copy the contents of the .env file to .env.local file and enter the Q_SYMFONY_SKELETON_API value, including the trailing / at the end

### Project components

The project consists of the following pages/components:

- Login
- Dashboard
- Authors
- Add a new book
- Navigation/Logout
- Console command

### Login Page

This is the first page that you see when you open the project.
On the login page you can log into the application using credentials provided in the task description.
Login token is saved into the session (encrypted).
The session is valid for 120 minutes or until you close the application.
After a successful login, you will be redirected to dashboard


### Dashboard

This is the first page that you see after login.
You can see user first and last name on the dashboard.

### Authors

You can access this page by clicking the "Authors" tab on the top of the page.
On the authors page, there is a table with all the authors' data listed.
You can view details of any author or delete authors that have no books linked to them.
On the authors details page, you can see a list of all the books by that author and you can delete any od the books listed.

### Add a new book

You can access this page by clicking the "Add a new book" tab on the top of the page.
Once you enter the form data, you will be redirected to the authors page. 

###  Navigation/Logout

In the top righ corner of the page you will see a small dropdown navigation.
You can log out of the application by clicking on the "Logout" link here.

###  Console command

You can add a new author by running the following command:

```
php artisan app:create-author
```

You will be prompted to enter all the author data.

### Project code

You can find most of the application code in the app folder, the rest is mostly config and views. 
QSS Api connection is handled in ```app/Handler/QSSApiHandler.php```
All of the actions are implemented in the Controller folder and then you can find your path from there.

