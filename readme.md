PHP Login Registration API using JWT
Here you find two API - User Registration and Login

User Registration API - 
  URL- http://host/registration.php
  Method - POST
  Body Data Type- JSON(application/json)
  Body Data -
          {
            "user_name": "abc",
            "user_email": "abc@xyz.com",
            "user_password": "123456"
          }
          
User Login API - 
  URL- http://host/login.php
  Method - POST
  Body Data Type- JSON(application/json)
  Body Data -
          {
            "user_email": "abc@xyz.com",
            "user_password": "123456"
          }
