# Boarding pass test

## Requirements
- Docker
- Any operating system (linux, macos, windows)

## Installation

In order to install the application, proceed with the following:
- clone this repository
- run `chmod +x run.sh`
- run `./run.sh`

## Running the application

To run the application, run the following commands:
- run `docker ps` to get your container ID
- run `docker exec -it <ID> bash`
- you are now in the /var/www/html folder of the container
- run `php application.php` to get the response

## Description of the project

Given a random set of boarding cards containing the following:
- departure
- destination
- sit

The application should behave like an internal API, so it will only communicate with other 
php applications. Consider `application.php` as another application which
needs the output from our internal API.

## Input / Ouput 

The sorting application receives an array of boarding cards, checks if these
boarding cards meet the requirements defined, creates boarding card objects and
sorts them. Output will be also an array of strings.

### Input example

```$xslt
$data = [
    [
        'type'      => 'Plane',
        'departure' => 'Munchen',
        'arrival'   => 'London',
        'sit'       => '32B'
    ],
    [
        'type'      => 'Boat',
        'departure' => 'Belgrad',
        'arrival'   => 'Munchen',
        'sit'       => '40'
    ],
    [
        'type'      => 'Plane',
        'departure' => 'Paris',
        'arrival'   => 'Belgrad',
        'sit'       => '54F'
    ],
    [
        'type'      => 'Boat',
        'departure' => 'London',
        'arrival'   => 'Feroe Islands',
        'sit'       => '21'
    ],
];
```

### Output example

```$xslt
array(5) {
  [0]=>
  string(49) "Take Plane from Paris to Belgrad. Sit in seat 54F"
  [1]=>
  string(49) "Take Boat from Belgrad to Munchen. Sit in seat 40"
  [2]=>
  string(50) "Take Plane from Munchen to London. Sit in seat 32B"
  [3]=>
  string(54) "Take Boat from London to Feroe Islands. Sit in seat 21"
  [4]=>
  string(31) "You arrived at the destination!"
}
```

## Input requirements

The input requirements are held in the `src/Utils/Interfaces/RequiredInputInterface.php`.
If the user needs to modify the structure of the input array or add new structure
elements, it will only modify in that place.

## Defined boarding cards and extending them

Currently there are 2 types of boarding cards: Boat and Plane.

If someone would need to extend the application with a new type of transport ticket,
lets say Car, just follow the instructions below:

- create a new file called `Car.php` within `/src/Utils/BoardingPasses` folder
- your new `Car` class will extend `AbstractBoardingPass` class.
- instantiate the constructor of the parent.

## Changing card's output or adding other variables in the object

Assuming that you created a new `Car` class and you want to change the output string
of your object, just set your new string to `$this->output`.

If you need to add new properties or methods to your object, just add them within your
`Car` class.

## Running the unittests

To run the unittests, just do the following:

- `./vendor/phpunit/phpunit/phpunit`

Take in consideration that they are run also when the docker container is built.



----------

Author Dumitru Alexandru