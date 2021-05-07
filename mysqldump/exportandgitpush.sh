if [ $# != 2 ] 
then
echo 'Usage : exportandgitpush.sh searchStr replaceStr'
exit 1
fi
cd /var/www/html/fabfashn/mysqldump
echo db dump started

mysqldump --insert-ignore --user=root --password=sh22ee05 fabfashn > fabfashn.sql
#sed -i 's/192.168.1.236/localhost/g' fabfashn.sql
sed -i 's/$1/$2/g' fabfashn.sql
echo db dump done

cd /var/www/html/fabfashn/

echo add updated files
git add *
echo commit changes

git commit -a -m "latest change added in  db"

echo push changes

git push 

echo Done!
