DIR=$(dirname $0)
cd "$DIR/../"
pwd
echo "=================================================="
phpunit -c . --testsuite unit