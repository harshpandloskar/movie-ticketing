## Movie Ticking Web Application

**Introduction**

The project makes use of web services and ‘oAuth’ protocol to build a web application using the technical, research and design implementation skills taught during the course period. 

The main objective is to develop a ‘Movie ticketing’ web application where in a user can simply book a ticket for a movie and can login to the web site using a Facebook account. A dummy movie data base server is used as a source of fetching the data and rendering it to the front-end page of the web site.  

The first page shows a list of movies where the user can select the available movies. The second page is a movie synopsis page which shows information about the movie in detail and this page also includes a selection section where in the user can select movie day and show time. After selecting day and showtime. The third page is a seat layout page where a user can select a number of seats of his choice. At the end, it gives confirmation details of the ticket. 

Technologies Used
-----------------

**Heroku**

A platform as a service (PaaS) technology which enables a developer to run, build, and manage applications entirely in the cloud. ‘Heroku’ is used as a free server in this project to deploy the application.

**Link -** https://dashboard.heroku.com/apps/harsh-app

**Cloudinary**

A Software as a service (SaaS) technology that provides a cloud-based image and video management solution. It enables users to upload, store, manage, manipulate and deliver images and video for their websites and apps. Since the 3rd party API did not have image data for the movie, Images for a particular movie was taken from google images manually stored in a cloud server using ‘Cloudinary’ 

**Link -**  https://res.cloudinary.com/harsh16/image/upload/v1523684880/the-jungle-book.jpg 

**Github link -** https://github.com/harshpandloskar/movie-ticketing/blob/master/assets/main.js 

Db4free
-------


Provides a testing service for the development version of the MySQL Server. It helps to easily create an account for free and test your applications. Db4free is a free hosting server which is used in this project as a MySQL database to store user’s information when he logins using Facebook account. 

**Link -**  https://db4free.net/ 

Facebook for Developers
-----------------------

The social networking site provides a set of services, tools, and products for third-party developers to create their own applications and services that access data in Facebook. These Software Development Tool Kit are used here with JavaScript to give front end access i.e. configuration and setup for oAuth is done here.  

**Link -** https://developers.facebook.com/ 

**Github link -** https://github.com/harshpandloskar/movie-ticketing/commit/32c73434e251b92229a4a2634147367bb37b4f45  

Freeprivacypolicy.com
---------------------

An Online Privacy Policy Generator where free custom privacy policies can be made. There are a simple set of questions for the product which is. It includes various tools and several compliance verification tools to help effectively protect a user’s or a customer’s privacy policy by adhering notable federal and state privacy. Facebook SDK kit required these privacy policies to be generated so this site helped to create the requirement.
 
**Link -** https://www.freeprivacypolicy.com/privacy/view/6c7ff8ec15b77eab68c99b350280694d 
 
**3rd party API**
 
The dummy data for movies is pulled from the below link. Data is consumed from this API using AJAX call 

**Link -** https://college-movies.herokuapp.com/ 

**Github link -** https://github.com/harshpandloskar/movie-ticketing/blob/master/assets/main.js 

Artifact Design & Implementation
--------------------------------


A user when goes to the application in the front-end side at the browser and the data is fetched from a remote server ‘Heruko’ using third party API’s where dummy data of movies details are stored.

The user then clicks on Facebook button to login through Facebook account where a request is made to Facebook oAuth service to get access token, the oAuth service is activated here and the Facebook server issues access token when the user has entered valid login details. If the login credentials are not matched it will throw an error message. 

In the ‘Heruko’ server, oAuth configuration is stored and it checks with Facebook oAuth server to validate the token and then sends a response validation whether the users can log in or not. 

After the authorization and authentication process is complete. The ‘Heruko’ server sends the resource i.e. sends data to the web application where a user can continue using the services on the site. 

 - First page - A user can select Movies from the main page of the
   website where few movies are listed.  
 - Second Page – A user can select a day on which he wants to see the
   movie and with every day there an associated show time available
   for the movie in a theatre.
 - Third Page – A user can select a number of seats from the seat
   layout section.
 - Facebook Account – A user can login to his existing account   
   or can sign up making a new account.
 - Administrator – A system admin can edit movie details which are
   listed on the main page, can edit date, time and monitor and edit
   seats in the seat layout section.

