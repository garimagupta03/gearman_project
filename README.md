Prerequisites PHP, MySQL, APACHE

Install GEARMAN JOB SERVER 
sudo apt-get install gearman-job-server

Install GEARMAN PHP extension
sudo apt-get install php5-gearman
sudo service apache2 restart

DB queries can be found in db.sql

Run GEARMAN worker
Execute the following command through terminal to run worker for gearman
php worker.php


