all: db_init
test: db_reset db_seed
#	Run unit tests, code coverage, and linters
	phpunit --bootstrap test/bootstrap.php test/
db_init:
#	Create the database and import the table
	mysql -u root < db/schema.sql
db_seed:
#	Feed the database with sample data
	mysql -u root < db/seeds.sql
db_reset:
#	Reset database to the original state
	mysql -u root < db/schema.sql
.PHONY: test
