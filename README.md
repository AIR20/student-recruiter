# Student Recruiter System

This project is concerned with developing the StudentRecruiter System (SRS). This system is designed for universities who need to manage visits from schools and students to their campus.

The stakeholders involved include: University Administrators, Academic Departments, Students, and Teachers.

The SRS will provide facilities to enable the co-ordination of events organised by Academic Departments, from general university open days, large introductory sessions, individual department visits, and career services, to receptions, public lectures, speeches, and concerts. Centralising the organisation of all university events into a single system will make it easier for the university to manage and track what is happening on campus. It will also make it easier for prospective Students and Teachers who wish to attend events.

# Installation Guide

## Requirement

- PHP 5.3.13 or above
- MySQL

## Steps

1. Import SQL schemas and sample data to MySQL server.

	```shell
    $ make
	```
1. Copy `default.config.php` to `config.php` and modify the configuration.

    ```shell
    $ cp default.config.php config.php
    ```
1. Make sure `upload` folder has correct permission.

    ```shell
    $ chmod 777 upload
    ```

# Contribution

Contributions and bug reports are welcome!

