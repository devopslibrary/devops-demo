
Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.synced_folder ".", "/data"
  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    export DEBIAN_FRONTEND="noninteractive"
    debconf-set-selections <<< 'mysql-server mysql-server/root_password password devops'
    debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password devops'
    apt-get install apache2 php5 php5-mysql mysql-server -y
    mysql -uroot -pdevops -e "create database devopsdb"
    mysql -uroot -pdevops devopsdb < /data/setup.sql
    rm -rf /var/www/html
    ln -fs /data /var/www/html
  SHELL
end
