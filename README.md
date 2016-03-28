**Welcome!**

This project is to help simplify the Detail System at Route 60 Auto Wash & Detail. This helps make the switch from paper tickets, which have proven to be unreliable and easily lost, to a website that is easy to use, with a database that is easily accessible and keeps records for future use.

**Information**

A lot of the functionality is really basic, simply adding and updating information from the database. Rarely is anything ever deleted. There is also a cronjob running via phpmyadmin (info can be found in the .sql file inside /details/assets/) that runs every night at midnight to lock tickets to prevent them being modified (they only lock if the status is set to Paid/Completed, so Prepaid and Appointment tickets aren't locked). Once they are locked, they can only be printed. The only way to delete a record once it is locked is to do so manually via phpmyadmin.

**Yahoo! Weather API**

The Yahoo! Weather API is in use on the main pages of the Report and Detail manager, displaying current weather conditions for today and 4 days in advance. It simply gets information from a JSON request made via a URL (ie. https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text=%27mundelein,%20il%27)&format=json) and uses PHP's json_decode function to get all needed information. The max amount of API calls per day is 2,000.