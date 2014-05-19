mysqldump -u root -ppassword db-name>/home/user/grbackupdb/sql_`date +%Y%m%d%H%M%S`.sql
cd /home/user/grbackupdb
git add .
git commit . -m 'backup  sql'
git push origin master
