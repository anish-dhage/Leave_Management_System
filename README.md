# Leave_Management_System
A Leave Management System for college website
====================================================================================================================================================================================================

Project Title: PICT Leave Management System

====================================================================================================================================================================================================

This application is a single leave management system that is critical for Admin tasks.
It  intelligently  adapts  to  Admin  policy  of  the  management  and  allows  students, teachers
and their line superiors to manage leaves

Prerequisites:
1.  Apache or Nginx Web Server
2.  MySQL database
3.  PHP-5 support
4.  phpmyadmin application
5.  Online Web Hosting with above mentioned facilities

Steps:
1.  Copy or move this folder to /var/www/html/ (for Linux based OS) so that it can be deployed on apache server.
2.  Start Apache web server on your computer.
3.  Start MySQL server or client and use the login credentials in the source code (wherever needed).
4.  A lms_1.sql file has been included. Import the database using phpmyadmin using this file.
5.  View the application using localhost.


Sitemap:
1.  Home
	-Sign-in
	-Sign-Up
2.  SignUp
	-Student
	-Faculty
	-Head
	-Admin
3.  Student
	-Apply for Leave
	-View Profile
	-Check Status
4.  Teacher
	-Apply for Leave
	-View Leave Applications
	-Edit Profile
	-Check Status
	-Change Password
5.  HoD
	-View Leave Applications
	-Edit Profile
	-Check Status
	-Change Password
6.  Admin
	-Add Notice
	-Assign Mentor
	-Admin Controls
	
	
Structure:
1.  Every page folder has 3 things:
	a)PHP Pages	
	b)css folder
		-contains .css stylesheets relevant to the PAGE
	c)js folder
		-contains .js scripts relevant to to the PAGE

2.  An assets folder is included in the project which contains the following folders
	a)css folder
		-contains .css stylesheets relevant to the PROJECT
	b)js folder
		-contains .js scripts relevant to the PROJECT
	c)images folder
		-contains images to be used in the PROJECT

3. Seperate folders have been provided for teachers, HoD and admin modules while Student is present in the initial folder itself.

4. dist folder contains some local distributions of frameworks (Bootstrap, AngularJS, jQuery, jQuery-UI) used in the project.

5. Initial starting page is homepage.html present in main folder.

========================================================================================ACKNOWLEDGEMENT==============================================================================================

We sincerely thank our WTL Lab Coordinator Prof. P.A.Jain and Head of Department for their support, providing all the help, motivation and encouragement from beginning till end to 
make this project a grand success. Above all we would like to thank our parents for their wonderful support and blessings, without which we would not have been able to accomplish our goal.

