# online_ticket_booking_system
This system is developed to provide online ticket booking system for the transportation buses. 
# Online Ticket Car Booking System

The Online Ticket Car Booking System is a web-based application developed using PHP, HTML, and CSS. It provides users with the ability to book car tickets online and offers an admin dashboard to manage various aspects of the system. This README file provides an overview of the system's features, setup instructions, and usage guidelines.

## Features

1. **User Registration and Login**: Users can create an account and log in to the system to access the booking functionalities.

2. **Seat Availability**: The system displays the availability of seats for different car routes. Users can view and select the desired seats for their journey.

3. **Express Car Availability**: Users can check the availability of express cars for their preferred date and time. The system provides information about the car type, available seats, and fares.

4. **Booking Process**: Users can book car tickets by selecting the desired seat(s) and providing necessary details such as the journey date, passenger information, and payment method.

5. **Admin Dashboard**: The admin dashboard allows the system administrator to manage various aspects of the system, including car routes, seat availability, car types, and user accounts.



## Setup Instructions

To set up the Online Ticket Car Booking System, follow these steps:

1. **Clone the Repository**: Clone the project repository to your local machine or web server.

2. **Database Configuration**: Create a MySQL database and import the provided SQL file (`database.sql`) to set up the required database schema.

3. **Configure Database Connection**: Open the `config.php` file and update the database connection settings with your MySQL database credentials.

4. **Access Permissions**: Set appropriate read and write permissions for the system files and directories to ensure that the application can read and write necessary data.

5. **Access the Application**: Open a web browser and navigate to the URL where you have deployed the application. You should see the login page.

6. **Admin Account Creation**: To create the first admin account, you can manually insert a record into the `users` table with a suitable role (e.g., 'admin').

## Usage Guidelines

1. **User Registration**: Users can create a new account by clicking on the registration link and providing the required details.

2. **User Login**: Existing users can log in to the system using their registered email and password.

3. **Booking Process**: After logging in, users can select the desired car route, check seat availability, choose seats, provide passenger details, select the journey date, and proceed to payment.

4. **Admin Dashboard**: The admin dashboard provides access to various administrative functionalities, including managing car routes, seat availability, car types, and user accounts. Only users with admin privileges can access the admin dashboard.

5. **System Maintenance**: Regularly back up the database to avoid data loss. Keep the system up to date with the latest security patches and updates.

6. **Customization**: You can modify the system's appearance and functionality by editing the PHP, HTML, and CSS files according to your requirements.

