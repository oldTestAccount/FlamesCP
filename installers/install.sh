#/bin/bash
os="cat /etc/centos-release"
if [ -z "$os" ]; then
echo "You must be running CentOS 6.x!"
else
if [ ! -z "$os" ]; then
echo "Installing dependencies..."
sleep 1
yum install epel-release -y
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
read -e -p "Please enter the amount of RAM that your system has. (in MB): " ram
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
mysql -uroot -e "SET PASSWORD FOR 'root'@'localhost' = PASSWORD('stapHunu3A'); flush privileges;"
mysql -uroot -pstapHunu3A -e "create database users; use users; CREATE TABLE login(id int(10) NOT NULL AUTO_INCREMENT, username varchar(255) NOT NULL, password varchar(255) NOT NULL, status varchar(50), PRIMARY KEY (id));"
sleep 2
clear
read -e -p "Please enter a administrative password: " adminpwd
mysql -uroot -pstapHunu3A -e "use users; insert into login (id, username, password, status) VALUES(1, 'admin', '$adminpwd', 'admin');"
sleep 2
echo "Copying init files..."
cp /var/www/html/init /etc/init.d/flamescpd
chmod 755 /etc/init.d/flamescpd
rm -rf /etc/vsftpd/vsftpd.conf
cp /var/www/html/vsftpd.conf /etc/vsftpd
useradd -d /SERVER ftpuser
mkdir -p /SERVER/logs
echo "[Stopped]" > /SERVER/logs/latest.log
echo "eula=true" > /SERVER/eula.txt
chown ftpuser:apache /SERVER
chown ftpuser:apache /SERVER/logs/latest.log
chown ftpuser:apache /SERVER/logs
chown ftpuser:apache /SERVER/*
chmod 770 /SERVER/*
clear
read -e -p "Please enter a FTP password: " ftppassword
echo -e "$ftppassword\n$ftppassword" | passwd ftpuser
service vsftpd restart
clear
echo " "
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
echo "Password: $ftppassword"
youripaddr=$(ifconfig | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1')
echo "IP: $youripaddr"
fi
fi
