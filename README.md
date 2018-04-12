# Tajawal Coding Challenge
A webapp to retrieve, filter, sort, and serve back hotel information.

## Technical details:

### Packages used:

1. Symfony skeleton, the minimum and most light-weight Symfony app that can be created
2. SensioFrameworkExtraBundle, handles basic MVC webapp functionality. Routing, basic security.. etc
3. Guzzle, to retrieve hotel information
4. Gson-php, to easily deserialize JSON objects to PHP objects 
5. PHPUnit-bridge (dev only) , to run PHP unit tests
6. Web server bundle (dev only), to run testing server

## How to use the app:

- Prerequisites: 

You must have [php](http://php.net/downloads.php) and [composer](https://getcomposer.org/download/) installed on your machine and accessible from whatever command line interface you prefer.

1. Clone the repository:

		$ git clone https://github.com/MmdohAhmd/Tajawal-Task.git .

2. Install missing dependencies:

		$ composer install

3. Start the test server:

		$ php bin/console server:run 127.0.0.1:8000

4. Test the application:

Use a web browser or any api testing tool (e.g. Postman) to test the api endpoint "/hotels".

You can use the following parameters to filter the results:

- name :

It can be used to filter the result based on name using one or more keywords.

 examples : 

		127.0.0.1:8000/hotels?name=rotana

		127.0.0.1:8000/hotels?name=rotana,one

- City :

It can be used to filter the result based on city using one or more keywords.

 examples : 

		127.0.0.1:8000/hotels?city=cairo

		127.0.0.1:8000/hotels?city=cairo,dubai

- Price :

It can be used in two different ways. "price_from" to set a lower limit for the prices in the result while "price_to" is used to set an upper limit for the perices in the result set.

 examples : 

		127.0.0.1:8000/hotels?price_from=80

		127.0.0.1:8000/hotels?price_to=130

		127.0.0.1:8000/hotels?price_from=80&price_to=130

- Availability :

It can be used to filter by the availability of hotels given a range of dates. 

(Note that all the date ranges should be in the form of "dd-mm-yyyy:dd-mm-yyyy" and in case of multiple ranges, they should be separated by a comma)

examples : 

		127.0.0.1:8000/hotels?avail=10-10-2010:30-10-2010

		127.0.0.1:8000/hotels?avail=10-10-2010:30-10-2010,01-11-2010:30-11-2010


- Sorting : 

The result set can be sorted by price or name, according to the 'sort_by' parameter in the request. 

(note that if the 'sort_by' parameter is absent the default behavious is that the result set will be sorted by price)

examples : 

		127.0.0.1:8000/hotels?sort_by=name

		127.0.0.1:8000/hotels?sort_by=price

### **You can mix and match different search parameters to your liking**

## Running Unit tests:

       $ php bin/phpunit

## Possible improvements:

### The app can be optimized for larger datasets by:
- Implementing faster and more efficient sorting and searching algorithms. 
- Optimising the way data is pulled from the remote endpoint to be retrieved as a stream rather than one large chunk of data.
- Making use of a temporary caching technology to decrease the number of hits to the remote endpoint.