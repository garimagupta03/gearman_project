# GEARMAN Project

This project will take 3 arguments i.e. name, email and phone and stores it in database using GEARMAN Job Server, also create a JSON for the same.
  - See HTML

### Tech
> Prerequisites PHP, MySQL, APACHE
* [GEARMAN] - Job server

### Installation

You need to install GEARMAN JOB SERVER:
```sh
sudo apt-get install gearman-job-server
```
Install GEARMAN PHP extension
```sh
sudo apt-get install php5-gearman
sudo service apache2 restart
```
DB queries can be found here:
* [db.sql]

Run GEARMAN worker with this command
```sh
php worker.php
```
