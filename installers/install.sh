#/bin/bash
whoami2=`whoami`
if [ "$whoami2" != "root" ] ; then
	echo "Please run the installer as the root user."
	exit 1
fi
os="cat /etc/centos-release"
if [ -z "$os" ]; then
echo "You must be running CentOS 6.x!"
exit 0
else
if [ ! -z "$os" ]; then
echo "Configuring IPTables Rule for FlamesCP..."
iptables -A INPUT -p tcp --dport 5555 -j ACCEPT
iptables -A INPUT -p udp --dport 5555 -j ACCEPT
service iptables save &> /dev/null
service iptables restart &> /dev/null
sleep 2
clear
if [ "$1" == "--verbose" ]; then
echo "Installing dependencies..."
sleep 1
yum install epel-release -y
yum install -y httpd php php-gd nc git zip unzip screen gcc make gc sudo java7 vsftpd php-mysql mysql mysql-server
else
echo "Installing dependencies..."
sleep 1
yum install epel-release -y &> /dev/null
yum install -y httpd php php-gd nc git zip unzip screen gcc make gc sudo java7 vsftpd php-mysql mysql mysql-server &>/dev/null
fi
mkdir /usr/local/flamescp
echo '
Listen 5555
<VirtualHost *:5555>
ServerName localhost:5555
ServerAdmin user@localhost
DocumentRoot /usr/local/flamescp
</VirtualHost>
' > /etc/httpd/conf.d/flamescp.conf
service httpd reload &> /dev/null
echo "Grabbing latest release..."
cd /usr/local/flamescp
mkdir /DAEMON
wget https://github.com/FlamesRunner/FlamesCP/archive/master.zip
mv master master.zip
unzip master.zip
mv /usr/local/flamescp/FlamesCP-master/* /usr/local/flamescp
cp /usr/local/flamescp /DAEMON/
chmod 755 /cpuprot
mv /usr/local/flamescp/DAEMON/* /DAEMON/
mv /usr/local/flamescp/cpuprot /DAEMON
mv /usr/local/flamescp/flamescpd /
echo "bash /flamescpd" >> /etc/rc.d/rc.local
rm -rf /usr/local/flamescp/security
cd /usr/local/flamescp/installers/cpulimit
make
make install
cp /usr/local/flamescp/installers/cpulimit/src/cpulimit /usr/bin
mkdir /SERVER
cd /SERVER
wget https://s3.amazonaws.com/Minecraft.Download/versions/1.8.3/minecraft_server.1.8.3.jar
mv minecraft_server.1.8.3.jar server.jar
clear
read -e -p "Please enter the amount of RAM that you want to allocate to the Minecraft server (in MB): " ram
mem="-Xmx${ram}M"
echo "java $mem -jar server.jar nogui" >> start.sh
echo "cd /SERVER" >> /usr/local/flamescp/startserver
echo "bash start.sh" >> /usr/local/flamescp/startserver
sleep 1
service httpd start
/bin/cp -rf /usr/local/flamescp/newsudofile /etc/sudoers
/bin/cp -rf /usr/local/flamescp/sendcmd /bin
chmod 755 /bin/sendcmd
echo "Configuring MySQL..."
service mysqld start &> /dev/null
cd /usr/local/flamescp/
clear
read -e -p "Please enter a MySQL password: " MYSQLPASS
cat <<EOF >> config.php
	<?php
	\$mysqlpass = "$MYSQLPASS";
	?>
EOF
mysql -uroot -e "SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MYSQLPASS'); flush privileges;"
mysql -uroot -p$MYSQLPASS -e "create database users; use users; CREATE TABLE login(id int(10) NOT NULL AUTO_INCREMENT, username varchar(255) NOT NULL, password varchar(255) NOT NULL, status varchar(50), PRIMARY KEY (id));"
sleep 2
clear
read -e -p "Please enter a password for the administrative user: " adminpwd
mysql -uroot -p$MYSQLPASS -e "use users; insert into login (id, username, password, status) VALUES(1, 'admin', '$adminpwd', 'admin');"
sleep 2
echo "Copying init files..."
cp /usr/local/flamescp/init /etc/init.d/flamescpd
chmod 755 /etc/init.d/flamescpd
rm -rf /etc/vsftpd/vsftpd.conf
cp /usr/local/flamescp/vsftpd.conf /etc/vsftpd
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
chmod -R 755 /usr/local/flamescp
read -e -p "Please enter a FTP password: " ftppassword
echo -e "$ftppassword\n$ftppassword" | passwd ftpuser
service vsftpd restart
service flamescpd start
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
echo "Control Panel URL: http://$youripaddr:5555"
yourpubip=`curl -q -s icanhazip.com`
echo "Public IP: $yourpubip"
fi
fi
