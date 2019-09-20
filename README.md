# HNG6_Task1

Task on Login And Sign Up Page 

Login Process Overview

E-mail address and password are entered into the input field and submitted, if you have an account; if you don't, create one.
Login credentials are validated, then, passed to the authentication script
Authentication script check for the database connection and matches the input data with table records.
Display authorization message.
Software Requirements

PHP
WAMPServer

NOTE: MySQL implemented during this task is online-based, so that the credentials can be read without downloading the .sql file. It also has an integrated phpMyAdmin

STEPS TO DEVELOP THE LOGIN PAGE
It must be established that the team was divided into three (3) sub-teams to communicate and perform more efficiently. The sub-teams include the design, front-end and back-end. The steps outlined below are categorized under the various sub-teams.

DESIGN & PROTOTYPE

We created a Design: The login page was designed by one (1) of the team member as a prototype for the proposed website. The design tool used is Figma, it’s a collaborative interface design tool with cool functionalities and features to foster professional designs. 

Sign Up Design

Login Design


FRONT-END

The front-end was developed using HTML5 and CSS3 and JavaScript; these are the steps that were taken:

We replicated our design using HTML and CSS. We decided to go with plain old HTML and CSS to help others on the team collaborate and also to reduce boilerplate code.
We achieved basic responsiveness using @media queries in CSS.
We also leveraged CSS variables in order to remain consistent with our color palette.
Basic front-end validation was done on the form inputs to prevent the user from submitting blank forms and incorrect email structures.
We used vanilla JS throughout the front-end project - this was majorly due to the simplicity of the project and also to make it easier for a good number of team members to collaborate on the project.
We updated the view accordingly once we received a response (whether success or failure) from the back-end.
BACK-END

These were the steps that were taken:

We pondered on how to store login information (i.e user e-mail and password), since we wanted to implement the sign up feature also we decided to use a mySQL database.
We used an online remote SQL database that also has a phpmyadmin. It can be found on http://databases.000webhost.com
After signing up and creating a database we created a table called users where we stored user's sign in credentials. The table had Fullname, Username, email and password columns.
In our script, we first connected to our remote database using the in-built mysqli_connect function which we assigned to a $connection variable that will be used to process queries to the database.
For sign up, we are expecting two post variables; a $_POST['signup'] and $_POST['login'] submit values from the html form, both form inputs will contain the email and password of the user.
If we get a $_POST['signup'] , the first thing we did was to assign the username and password to a variable to make the code easier to read, thereafter we used mysqli_real_escape_string to escape special characters and also prevent a possible SQL Injection.
The next check we did was to ensure all fields were properly filled, so we used isset() for each of the post variables to see if all fields contained valid data.
After that we used the email collected and queried against our records in the database, if it exists, we alert the user that that particular email has been chosen and they have to choose another one.
If that check is passed, we then run a query that will insert the user email and password into our database and return a success message, prompting them to proceed to login.
If we get a $_POST['login'] request, we collect the data as usual is to escape special characters and assign that data to variables.
Then we run a query that checks the database if the user exists, if they don't, we returned a failure message to alert the user to try again. If they exist, we saved the user id and email to a session where we keep alive on all pages the user will be visiting using session_start() .
So, these are the main steps we took in the development of the login and signup page. It’s good to note that in our quest to deliver promptly, we had to work smart by having the front-end and back-end work simultaneously on independent steps. Then, when the front-end sub-team had concluded their work, the back-end basically just integrated their piece of the puzzle and we rounded off with performing tests.
