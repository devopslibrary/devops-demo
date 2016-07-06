
Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "devopsdemo"
  config.vm.post_up_message = "Welcome to the DevOpsDemo VM!  This VagrantFile combines the Web and MySQL servers into a single VM for development purposes.  Enjoy!  Ken & Samantha @ DevOpsLibrary.com"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.synced_folder ".", "/data"
  config.vm.provision "fix-no-tty", type: "shell" do |s|
      s.privileged = false
      s.inline = "sudo sed -i '/tty/!s/mesg n/tty -s \\&\\& mesg n/' /root/.profile"
  end
  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    export DEBIAN_FRONTEND="noninteractive"
    debconf-set-selections <<< 'mysql-server mysql-server/root_password password devops'
    debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password devops'
    apt-get install apache2 php5 php5-mysql mysql-server -y
    echo "ServerName devopsdemo" | sudo tee /etc/apache2/conf-available/fqdn.conf
    a2enconf fqdn
    mysql -uroot -pdevops -e "create database devopsdb"
    mysql -uroot -pdevops devopsdb < /data/setup.sql
    rm -rf /var/www/html
    ln -fs /data /var/www/html
  SHELL
end
