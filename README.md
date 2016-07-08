# DevOps-Demo

This application is used to demonstrate and test various DevOps, CI, and CD concepts.

![DevOps Demo Screenshot](https://raw.githubusercontent.com/devopslibrary/devops-demo/master/screenshots/overview.png "Overview")

Here are some of the reasons why you may want to use this for demos:

 - The app consists of two parts, a web application and a backend MySQL database.  Because of this, you can demonstrate and test continuous delivery concepts while addressing the nuances of both stateless (the Website) and stateful (MySQL) apps.
 - The app has a variable named "environment" within the config.ini file.  The value is then displayed on the web application, making it easy to demo the population of environment specific variables.
 - An application version and database version is also listed (Within the repository is a file named version1.1.tar.gz, which is used to represent a new release from the development team, as well as version1.1.sql for updating the SQL database).  By using the two files, you can create a continuous delivery process showing how the new code and database changes are applied.
 - A Vagrantfile is included, which you can use as a guide for spinning up the VMs, or for modifying the demo codebase.

### Technical
The app itself is written in PHP, and has been tested on Ubuntu 14.04, with Apache, PHP5, and MySQL installed.  It's very simple though, and should run easily on just about any OS.

### Files
* **devops-demo-1.0.tar.gz** -- This is the web application pictured above.
* **devops-demo-1.0.sql** -- This contains the SQL script for setting up the application database.  Run it on the MySQL server.
* **devops-demo-1.1.tar.gz** -- In real life, deployments never end.  Imagine this as a new package given to you by the developers, and your job is to figure out the best way of deploying new code.  You could go the immutable infrastructure route, Docker containers, etc.  It's all up to you.
* **devops-demo-1.1.sql** -- While the web server is stateless, the DB is not, and as part of the 1.1 release, you also need to deploy changes to the database :).  Enjoy!
* **deployUpdatedCode****.sh** -- The developers were kind enough to give you a shell script for deploying new code :), but will you use it?

### Installation
1. Setup two Ubuntu 14.04 VMs, one will be used to host the frontend *webserver*, the other will host the backend *database*.
2. On the *database server*, do the following:
    2.1. `apt-get install mysql-server` # To install MySQL.  Be sure to configure a root password.
    2.2. `mysql -uroot -pPassword -e "create database devopsdb"` # Use the password set previously.
    2.3. Upload the **devops-demo-1.0.sql** file to the VM.
    2.4. `mysql -uroot -pPassword devopsdb < devops-demo-1.0.sql`
3. On the *webserver*, do the following:
    3.1. `apt-get install apache2 php5 php5-mysql` # To install Apache, PHP5 and the Apache MySQL plugin.
    3.2. `rm /var/www/html/*` # To clear the apache web folder, we don't want the index.html there.
    3.3. Upload the **devops-demo-1.0.tar.gz** package, then extract the contents to /var/www/html.
    3.4. Edit the config.ini file, replacing each of the variables with the correct details to connect to MySQL.
    3.5. Replace ENVNAME in the config.ini file with "Dev", "QA", or "Production".
    3.6. **TIP!** You can use SED to script this: e.g. `sed -i -e 's/DBHOST/localhost/g' /var/www/html/config.ini`
4. Visit http://IPoftheWebServer in your browser, if all is well, you should see the app come up, great job!