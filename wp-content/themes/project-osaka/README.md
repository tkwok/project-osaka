# Theme-testing-framework

### Unit Testing with PHPUnit
The goal of unit test is to prevent regression bugs/issues from happening with each deployment cycle, ensuring no new code/features would interfere existing features

We will be using **PHPUnit 7** for WordPress theme unit testing, currently the latest version that works with WordPress

#### Prequisites
- git (to clone this repo, and setting up WordPress test instance)
- wget
- svn (for cloning WordPress unit test setup dependencies)
- mysqladmin
- local MySQL credential
  - a **new** database name for testing only **<db-name>** (this name must NOT exist as script will create the db during installation)
  - database user name **<db-user>**
  - database password **<db-pass>**
  - database host **[db-host]** (typically **localhost** or **127.0.0.1** on the local environment)


#### Installation
1. Clone this repository into the ```/demandbase``` theme folder on your **local machine**
- The current setup requires all unit tests and configuration files to reside in the theme in question for testing
- From this step on, make sure you are in the ```/demandbase``` theme folder

2. Install PHPUnit 7 in the theme folder and verify installation
- Download PHPUnit 7 with **wget**

```wget -O phpunit https://phar.phpunit.de/phpunit-7.phar```

- Make the compiled script executable

```chmod +x phpunit```

- Test PHPUnit is running and installed proper version

```./phpunit --version```

3. Run install shell script (this is where local MySQL credential is entered as parameters for installations script)

```./bin/install-wp-tests.sh <db-name> <db-user> <db-pass> [db-host] latest```

#### Usage
1. To run ALL tests, enter the following
```./phpunit```

2. TO run specific test files, enter the following
```./phpunit test-<your test filename>.php```

#### Notes
* Please make sure systems prequisites are met before starting the process, as **install-wp-tests** script may not report all errors

* Tests files that are in the **/tests** folder with the word **test-** prefix in filenames are the **only** files ran with the ```./phpunit``` command , all other files will be ignored when running **PHPUnit**


### Code Quality Testing with PHP CodeSniffer and WordPress Standard
CodeSniffer can help identify poor/outdated codes depending on the PHP version, and maintain code quality across development teams

#### Prequisites
- PHP 7.x version installed locally

#### Installation
Both PHP CodeSniffer and WordPress Standard are pre-installed as local builds in the ```/phpcs``` and ```/wpcs``` respectively to ensure compatibility across different OSX versions

To confirm installation is working, enter the following under terminal in the ```/demandbase``` theme folder

```cd phpcs```

```./bin/phpcs -i```

Terminal should show 

```The installed coding standards are PEAR, Zend, PSR2, MySource, Squiz, PSR1, PSR12, WordPress, WordPress-Extra, WordPress-Docs and WordPress-Core```

#### Usage
1. To run a specific PHP file with the WordPress standards in the root ```/demandbase``` theme folder, enter the following in the ```phpcs/``` folder

```./bin/phpcs --standard=WordPress ../<specific php filename.php>```

#### Notes
* If there is an issue with **phpcs** showing errors, enter the following in the```phpcs/```folder

```./bin/phpcs --config-set installed_paths ../wpcs```

