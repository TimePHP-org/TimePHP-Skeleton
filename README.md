# Skeleton-MVC-Composer
A very simple skeleton to properly begin a website.

# Download
In order to retrieve this folder, you have to go to the right folder using CMD, Terminal or any other command prompt and then, write the following commands:

```bash
  $ git clone https://github.com/MrAnyx/Skeleton-MVC-Composer.git
  $ cd Skeleton-MVC-Composer
  $ composer install
  $ composer update
```

# Important
- The library [Composer](https://getcomposer.org/download/) is needed
- If you write the identifiers you use in the "config.php" file, do not forget to add this file to the .gitignore file by using the following command : 
```gitignore
  App/Includes/config.php
```
- If you use templates or whatever, you can also add the vendor folder to the .gitignore file with the following command : 
```gitignore
  vendor/
```
# During your project
If you add classes to the Models folder, don't forget to update the autoloader using the following command : 
```bash
  $ composer update
```
