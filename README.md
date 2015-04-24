# Student Recruiter System

This project is concerned with developing the StudentRecruiter System (SRS). This system is designed for universities who need to manage visits from schools and students to their campus.

The stakeholders involved include: University Administrators, Academic Departments, Students, and Teachers.

The SRS will provide facilities to enable the co-ordination of events organised by Academic Departments, from general university open days, large introductory sessions, individual department visits, and career services, to receptions, public lectures, speeches, and concerts. Centralising the organisation of all university events into a single system will make it easier for the university to manage and track what is happening on campus. It will also make it easier for prospective Students and Teachers who wish to attend events.

# Installation

1. Import SQL schema file `db/schema.sql` to your MySQL server.

	```shell
	mysql -h [hostname] -u [username] -p < db/schema.sql
	```
2. Import sample data from `db/seeds.sql`.

	```shell
	mysql -h [hostname] -u [username] -p < db/seeds.sql
	```
2. Copy all the PHP files and assets files to your web root directory.

3. Copy `default.config.php` to `config.php` and modify the database configuration.

4. Copy `default.htaccess` to `.htaccess` to enable URL rewrite on Apache.

	Note: To enable URL rewrite on department server, uncomment the line with `RewriteBase` and change it to the base URL after the hostname `cgi.csc.liv.ac.uk`.
	
	```htaccess
	RewriteBase /~username/student-recruiter/
	```
    
    And ensure you have correct permission for `.htaccess` file.
    ```shell
    chmod 755 .htaccess
    ```

5. Make a folder `tmp` with 777 permission if you are using department server.

	```shell
	mkdir -m 777 tmp
	```
