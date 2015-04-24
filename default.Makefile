all:
test: db_reset db_seed
#	Run unit tests, code coverage, and linters
	phpunit --bootstrap test/bootstrap.php test/
db_init:
#	Create the database and import the table
	mysql -h [hostname] -u [username] -p < db/schema.sql
db_seed:
#	Feed the database with sample data
	mysql -h [hostname] -u [username] -p < db/seeds.sql
db_reset:
#	Reset database to the original state
	mysql -h [hostname] -u [username] -p < db/schema.sql
.PHONY: test
