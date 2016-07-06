# DevOps-Demo

This application is used to demonstrate and test various DevOps, CI, and CD concepts.

![DevOps Demo Screenshot](screenshots/overview.png "Overview")

Here are some of the reasons why you may want to use this for demos:

 - The app consists of two parts, a web application and a backend MySQL database.  Because of this, you can demonstrate and test continuous delivery concepts while addressing the nuances of both stateless (the Website) and stateful (MySQL) apps.
 - The app has a variable named "environment" within the config.ini file.  The value is then displayed on the web application, making it easy to demo the population of environment specific variables.
 - An application version and database version is also listed (Within the repository is a file named version1.1.tar.gz, which is used to represent a new release from the development team, as well as version1.1.sql for updating the SQL database).  By using the two files, you can create a continuous delivery process showing how the new code and database changes are applied.
 - A Vagrantfile is included, which you can use as a guide for spinning up the VMs, or for modifying the demo codebase.

### Technical
The app itself is written in PHP, and has been tested on Ubuntu 14.04, with Apache, PHP5, and MySQL installed.  It's very simple though, and should run easily on just about any OS.

### Story Mode Part I
*Want to use the app the way it's meant to be used?  The story below should help you get started*

Welcome to your first day at **HaveNoAutomationYet Corp (HNAY)**.  We have an application called '**DevOps Demo**', developed in house.  We have a bunch of developers and system admins, and even a few security guys, and we've hired you to keep literally every single one of them happy and to fix every problem we've ever had with automation.

Your first task is to help Roger.  He's in operations, and each day someone...
