Before you use this application, you'll need to be running Mamp or Xamp. Make sure to place the application's directory in your htdocs directory.

You'll then need to run the provided sql script (phonebook.sql) in whatever programmming you're using to manage your databases. If you're using Mamp/Xamp you'll probably be using phpMyAdmin.

You may also have to change the hostname, username, and password parameters in the mysql_connect statements inside addContact.php and removeContact.php. 

After that you should be able to interact with your databases via the front-end in index.php.