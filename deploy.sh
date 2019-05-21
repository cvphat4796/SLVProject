echo "Pulling from Master" 

git pull origin master

echo "Pulled successfully from master"

echo "Restarting server..."

service nginx restart

echo "Server restarted Successfully"