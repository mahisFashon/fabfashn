cd /var/www/html/fabfashn
echo pull changes

git pull
cd /var/www/html/fabfashn/mysqldump

#echo import sql db

#sed -i 's/localhost/192.168.1.236/g' mahisfashiondb.sql

#mysql -f --user=root --password=sh22ee05 fabfashn < fabfashn.sql
echo Done!
