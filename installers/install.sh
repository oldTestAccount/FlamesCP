#/bin/bash
os="cat /etc/centos-release"
if [ -z "$os" ]; then
echo "You must be running CentOS 6.x!"
else
if [ ! -z "$os" ]; then
echo "Installing dependencies..."
sleep 1
yum install epel-release
yum install -y httpd php php-gd nc git zip unzip screen gcc make gc sudo java7 vsftpd php-mysql mysql mysql-server
echo "Grabbing latest release..."
cd /var/www/html
wget https://github.com/FlamesRunner/FlamesCP/archive/master.zip
mv master master.zip
unzip master.zip
mv /var/www/html/FlamesCP-master/* /var/www/html
cd /
cp /var/www/html/cpuprot /DAEMON
chmod 755 /cpuprot
mv /var/www/html/DAEMON .
mv /var/www/html/flamescpd .
echo "bash /flamescpd" >> /etc/rc.d/rc.local
mv /var/www/html/security /var/www/security
cd /var/www/html/installers/cpulimit
make
cp /var/www/html/installers/cpulimit/src/cpulimit /usr/bin
mkdir /SERVER
cd /SERVER
wget https://s3.amazonaws.com/Minecraft.Download/versions/1.8.3/minecraft_server.1.8.3.jar
mv minecraft_server.1.8.3.jar server.jar
clear
echo "Please enter the amount of RAM that your system has. (in MB)"
read ram
mem="-Xmx${ram}M"
echo "java $mem -jar server.jar nogui" >> start.sh
echo "cd /SERVER" >> /var/www/startserver
echo "bash start.sh" >> /var/www/startserver
sleep 1
service httpd start
/bin/cp -rf /var/www/html/newsudofile /etc/sudoers
/bin/cp -rf /var/www/html/sendcmd /bin
chmod 755 /bin/sendcmd
echo "Configuring MySQL..."
service mysqld start
mysql -uroot -e use mysql; "use mysql; update user set password=PASSWORD("stapHunu3A") where User='root'; flush privileges;"
mysql -uroot -pstapHunu3A -e 'create database users; CREATE TABLE login(id int(10) NOT NULL AUTO_INCREMENT, username varchar(255) NOT NULL, password varchar(255) NOT NULL, status varchar(50), PRIMARY KEY (id));'
sleep 2
clear
echo "Please enter a administrative password."
read adminpwd
mysql -uroot -pstapHunu3A -e 'use users; insert into login (id, username, password, status) VALUES(1, "admin", "$adminpwd", "admin");'
sleep 2
echo "Copying init files..."
cp /var/www/html/init /etc/init.d/flamescpd
chmod 755 /etc/init.d/flamescpd
rm -rf /etc/vsftpd/vsftpd.conf
cp /var/www/html/vsftpd.conf /etc/vsftpd
useradd -d /SERVER ftpuser
chown ftpuser:apache /SERVER
chown ftpuser:apache /SERVER/*
chmod 770 /SERVER/*
clear
echo "Please enter a password for the FTP user."
read password
spawn passwd ftpuser
expect "Password:"
send "$password\r"
expect "Retype new password:"
send "$password\r"
interact
clear
echo " "
echo "Please edit /var/www/security/password_protect.php and find the login details. You may change them too."
echo "Installation complete! Please run: service flamescpd start to start the daemon."
echo " "
echo "-----------------------------------------------------------------------------"
echo " "
echo "Default administrator details:"
echo "Username: admin"
echo "Password: $adminpwd"
echo " "
echo "-----------------------------------------------------------------------------"
echo " "
echo "You may modify server details through FTP with the details:"
echo "Username: ftpuser"
echo "Password: $password"
echo "IP: <yourserverIPaddress>"
fi
fi
