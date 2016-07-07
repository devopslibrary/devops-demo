mysql -uroot -pdevops devopsdb < /data/devops-demo-1.1.sql
tar -xvf /data/devops-demo-1.1.tar.gz -C /var/www/html
sed -i -e 's/DBHOST/localhost/g' /var/www/html/config.ini
sed -i -e 's/SQLUSER/root/g' /var/www/html/config.ini
sed -i -e 's/SQLPASSWORD/devops/g' /var/www/html/config.ini
sed -i -e 's/SQLDBNAME/devopsdb/g' /var/www/html/config.ini
sed -i -e 's/ENVNAME/Production/g' /var/www/html/config.ini