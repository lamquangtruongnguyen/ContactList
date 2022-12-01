# **Contact Lists Project**  
## Setup Guide
1. Save the entire package in htdocs folder and unzip it
2. Run **Apache Webserver** and **MySQL Database** on local machine with **XAMPP**
3. Go to web browser and type localhost as the URL and navigate to PHPMyAdmin
4. Import the sql file named **contacts.sql** (record included) or **SQLCreateContactsDB.sql** (empty table) to create your own contact database
5. Create database user and modify the credentials in **config.php**
6. Go back to browser and locate the URL localhost/ContactsList101 to run the application.

## Usage Guide

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/Verification.png)
Home page. To access the contact lists, you need to enter your name (cookie will be expired 5 minutes after entering and you will be redirected to this home page again).

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/ContactLists.png)
Contacts List page. This page shows all the contact lists, there is a button which you can use to add new contact. Each profile also has an associated button to let you view detail info. The name entered is shown on the left corner showing cookie is set for this specific user.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/AddContact.png)
Form to add new contact. There is also a button to allow you to go back to the Contacts List page.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/AddContactMessage.png)
After you succesfully add new contact, the page will reload and show the successful message.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/ListUpdated.png)
When you go back to the contacts list, you will see the new profile added.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/View.png)
Page to view detail info about a contact. There are two buttons which you can use to edit the info or go back to the contacts list page.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/Edit.png)
Edit page. The form with existing information is shown. You can edit or fill in empty info as you wish. There is also a contact list button to redirect to the list page.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/Save.png)
After you edit. You will be directed to save page showing the successful save message. You can either view it or go back to the lists by using either buttons.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/Edited.png)
The detail info in view page is updated.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/UpdateEdit.png)
The edited profile's info is also updated in the list page.

![This is an image](https://github.com/lamquangtruongnguyen/ContactList/blob/main/screenshots/Expire.png)
When the cookie expire. Any action will redirect you to the verification page.

