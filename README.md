# Clean-Looms-Near-Me ![apis](https://img.shields.io/badge/GOOGLE-Maps%20API-orange)
- 🚩 This project shows you how to build a Google Maps application for finding nearby clean looms in malls,complexs and Restaurant. The project suits people with intermediate knowledge of HTML, JavaScript, PHP and MySQL.
# [![GitHub issues](https://img.shields.io/github/issues/bhavesh2699/clean-looms-near-me)](https://github.com/bhavesh2699/clean-looms-near-me/issues) ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/bhavesh2699/clean-looms-near-me) ![GitHub repo size](https://img.shields.io/github/repo-size/bhavesh2699/clean-looms-near-me)  ![PHP from Packagist (specify version)](https://img.shields.io/packagist/php-v/symfony/symfony/v2.8.0) ![PyPI - Python Version](https://img.shields.io/pypi/pyversions/Django) ![node](https://img.shields.io/node/v/passport?label=flask) ![Sonar Tests](https://img.shields.io/sonar/tests/org.ow2.petals:petals-se-ase?compact_message&failed_label=failed&passed_label=passed&server=http%3A%2F%2Fsonar.petalslink.com&skipped_label=skipped&sonarVersion=4.2) ![GitHub issues](https://img.shields.io/badge/DATABASE-MYSQL-red) ![GitHub issues](https://img.shields.io/badge/SERVER-XAMPP-brightgreen)

# GOOGLE API KEY
- Firstly Create a google API key from Your account.
- Place unique key in [index.html](https://github.com/bhavesh2699/clean-looms-near-me/blob/master/index.html)
```javascript

function doNothing() {}
  </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= API KEY HERE!" >
    </script>
  </body>
```
# Creating a table in MySQL
Create a table in MySQL containing attributes of the markers on the map, like the marker id, name, address, lat, and lng. The id attribute serves as the primary key.
To keep the storage space for your table at a minimum, you can specify the lat and lng attributes to be floats of size (10,6). This allows the fields to store 6 digits after the decimal, plus up to 4 digits before the decimal.
```mysql
CREATE TABLE `markers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL
) ENGINE = MYISAM ;
```
# Populating the table
You can import the marker data into the SQL database using the 'Import' functionality of the phpMyAdmin interface which allows you to import data in various formats.
```
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('1','Heir Apparel','Crowea Pl, Frenchs Forest NSW 2086','-33.737885','151.235260');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('2','BeeYourself Clothing','Thalia St, Hassall Grove NSW 2761','-33.729752','150.836090');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('3','Dress Code','Glenview Avenue, Revesby, NSW 2212','-33.949448','151.008591');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('4','The Legacy','Charlotte Ln, Chatswood NSW 2067','-33.796669','151.183609');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('5','Fashiontasia','Braidwood Dr, Prestons NSW 2170','-33.944489','150.854706');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('6','Trish & Tash','Lincoln St, Lane Cove West NSW 2066','-33.812222','151.143707');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('7','Perfect Fit','Darley Rd, Randwick NSW 2031','-33.903557','151.237732');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('8','Buena Ropa!','Brodie St, Rydalmere NSW 2116','-33.815521','151.026642');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('9','Coxcomb and Lily Boutique','Ferrers Rd, Horsley Park NSW 2175','-33.829525','150.873764');
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES ('10','Moda Couture','Northcote Rd, Glebe NSW 2037','-33.873882','151.177460');
```
# Outputting data as XML using PHP
At this point, you should have a table named markers containing the map marker data. This section shows you how to export the table data from the SQL database in an XML format, using PHP statements. The map can use the XML file to retrieve the marker data through asynchronous JavaScript calls.

Using an XML file as an intermediary between your database and your Google map allows for faster initial page load, and a more flexible map application. It makes debugging easier as you can independently verify the XML output from the database, and the JavaScript parsing of the XML. You can also run the map entirely based on static XML files only, and not use the MySQL database.

If you have never used PHP to connect to a MySQL database, visit php.net and read up on mysql_connect, mysql_select_db, my_sql_query, and mysql_error.

When using a public browser to access a database using PHP files, it's important to ensure that your database credentials are secure. You can do this by putting your database connection information in a separate PHP file to that of the main PHP code.

Create a new file in a text editor and save it as phpsqlsearch_dbinfo.php. The file with your credentials should look like the one below, but containing your own database information.
```
<?php
$username="username";
$password="password";
$database="username-databaseName";
?>
```
# Finding locations with MySQL
To find locations in your markers table that are within a certain radius distance of a given latitude/longitude, you can use a SELECT statement based on the Haversine formula. The Haversine formula is used generally for computing great-circle distances between two pairs of coordinates on a sphere. An in-depth mathemetical explanation is given by Wikipedia and a good discussion of the formula as it relates to programming is on the Movable Type Scripts website.

Here's the SQL statement that finds the closest 20 locations within a radius of 25 miles to the -33, 151 coordinate. It calculates the distance based on the latitude/longitude of that row and the target latitude/longitude, and then asks for only rows where the distance value is less than 25, orders the whole query by distance, and limits it to 20 results. To search by kilometers instead of miles, replace 3959 with 6371.

```
SELECT id, ( 3959 * acos( cos( radians(37) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(-122) ) + sin( radians(37) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < 25 ORDER BY distance LIMIT 0 , 20;
```

![GitHub followers](https://img.shields.io/github/followers/bhavesh2699?style=social)  [![LinkedIn](https://img.shields.io/static/v1.svg?label=connect&message=@bhavesh2699&color=success&logo=linkedin&style=flat&logoColor=white&colorA=blue)](https://www.linkedin.com/in/bhavesh-solanki-02884717a) [![Facebook](https://img.shields.io/static/v1.svg?label=follow&message=@bhavesh.solanki&color=9cf&logo=facebook&style=flat&logoColor=white&colorA=informational)](https://www.facebook.com/bhavesh.solanki.3781995) [![Instagram](https://img.shields.io/static/v1.svg?label=follow&message=@bhavesh26.dj&color=grey&logo=instagram&style=flat&logoColor=white&colorA=critical)](https://www.instagram.com/bhavesh26.dj/)  [![GMAIL](https://img.shields.io/static/v1.svg?label=send&message=bs1852985@gmail.com&color=red&logo=gmail&style=social)](https://www.github.com/bhavesh2699)
#
[![Stay Motivated](https://img.shields.io/badge/Stay-Motivated-teal.svg?style=for-the-badge)](https://github.com/bhavesh2699) [![Think Big](https://img.shields.io/badge/Think-Big-orange.svg?style=for-the-badge)](https://github.com/bhavesh2699) [![Work Hard](https://img.shields.io/badge/Work-Hard-blue.svg?style=for-the-badge)](https://github.com/bhavesh2699) 

