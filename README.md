# Skeleton-MVC-Composer
A very simple skeleton to begin a website.

# Download
First of all, you need to download [Composer](https://getcomposer.org/download/). If you are more comfortable, you can download [Git](https://git-scm.com/).

In order to retrieve this folder, you have to go to the right folder using CMD, Terminal or any other command prompt and then, write the following commands:

Using Git command

```bash
  $ git clone https://github.com/MrAnyx/Skeleton-MVC-Composer.git
```

Using Composer create-project command
```bash
 $ composer create-project mranyx/skeleton --prefer-dist name_of_the_project
```

# Project structure
 ```bash
│   .gitignore
│   README.md
│   composer.json
│   composer.lock
├───App
│   ├───Controllers
│   ├───Includes
│   │       config.php
│   │       functions.php
│   ├───Models
│   │   ├───Repository
│   │   │       Repository.php
│   │   └───Users
│   │           Users.php
│   │           UsersRepository.php
│   └───Views
│       │   index.php
│       └───Commons
│               footer.php
│               header.php
│               navbar.php
└───vendor
    │   autoload.php
    └───composer
 ```
The most important parts of this project are :
  - composer.json
  - App/



