# Police-Inventory-for-COVID-crisis
Database Management System Project on Police Inventory Management for COVID-19 Crisis

# Purpose:

* The purpose of this website is that during the COVID-19 crisis, it has become difficult for police department to cope up and maintain the records of each and every detail, whether it is patient lists, new hospitals emerging for treatment, cropping of new containments zones due to increasing number of patients etc. 
* The main factor of maintaining a registry of all the crime records whether they are solved or pending is also resolved in this software. The whole project is implemented using WAMP Stack i.e. the database is hosted on MySQL server and the connection is done using PHP.

## Technology Stack:

* MySQL
* PHP
* Apache Server

# Walkthrough:

* The user will be already registered and will put in the login credentials i.e. email and password before getting access to the Inventory. 

* Once logged in the user navigates to the home page of the application.

* The Home page displays all sub categories of the inventory in a table, they are as follows:

  * Crime Register
  * Containment Zones
  *	Patients List
  *	Hospitals

*	First, the Crime Register displays all the crime records stored in the database in a tabular format.

*	There is a search option in this page where the user will have to enter the crime_id from the below table. After entering the crime_id, a detailed view showing every single data registered related to that particular id for example, accuser details, victim details, witness details, section-id details, police officer who lodged the complaint etc are displayed.

*	Since the user has administrative rights, he/she/they can ADD, EDIT as well as DELETE the data entered in the crime register.

*	Similarly, in the Containment Zones register, the data is displayed in the form as per the parameters of municipality_id, number of patients, number of hospitals, remarks (like RED alert) etc.

*	The user can also ADD, EDIT & DELETE from the Containment Zones register.

*	The Patients register displays the list of all the COVID affected patients. Details such as name, number of family members, previous medical history (if any), Aadhar number, date they were admitted in the hospital, DOB, gender, etc.

*	For the patients register, data can only be added and edited but not deleted since the database has to maintain the records of all the people who have ever been affected by COVID even after being recovered.

*	The Hospitals register displays the list of all the COVID treating hospitals on the lines of parameters like containment_zone_id, municipality_id, number of beds available, expiration range of medical supplies etc.

*	Data can be added and edited but not deleted from the hospitals registry.

