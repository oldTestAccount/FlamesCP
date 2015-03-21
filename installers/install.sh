#/bin/bash
if [ -z "$1" ]; then
echo "Usage: ./install.sh --install"
else
if [ "$1" == "--install" ]; then
os="cat /etc/centos-release"
if [ -z "$os" ]; then
echo "You must be running CentOS 6.x!"
else
if [ ! -z "$os" ]; then
echo "Installing dependencies..."
sleep 1
yum install -y httpd php php-gd nc git zip unzip
echo "Grabbing latest release..."
cd /var/www/html
wget https://github.com/FlamesRunner/FlamesCP/archive/master.zip
mv master master.zip
unzip master.zip
mv /var/www/html/FlamesCP-master/* /var/www/html
cd /
mv /var/www/html/DAEMON .
mv /var/www/html/flamescpd .
echo "bash /flamescpd" >> /etc/rc.d/rc.local
mv /var/www/html/security /var/www/security
mkdir /SERVER
cd /SERVER
wget https://s3.amazonaws.com/Minecraft.Download/versions/1.8.3/minecraft_server.1.8.3.jar
mv minecraft_server.1.8.3.jar minecraft_server.jar
clear
echo "Please enter the amount of RAM that your system has. (in MB)"
read ram
mem="-Xmx${ram}M"
echo "java $mem -jar minecraft_server.jar nogui" >> start.sh
echo "cd /SERVER" >> /var/www/startserver
echo "bash start.sh" >> /var/www/startserver
sleep 1
echo "Installation complete! Please run: bash /flamescpd to start the daemon."
else
echo "Invalid option."
echo "Usage: ./install.sh --install"
fi
fi
fi
fi
