# NFL Arrests App

This project is our IT490 (Systems Integration) Site. 
It shows NFL Arrest data for every active/inactive player in the league.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.
See deployment for notes on how to deploy the project on a live system.

Just git clone the repository and run a composer install then do a million other things and it'll work. Sweet...

### Prerequisites

What things you need to install the software and how to install them

```
sudo rm -Rf *
```

### Installing

A step by step series of examples that tell you have to get a development env running

```
git clone git@github.com:IT490/Football_Project.git football_project

cd football_project

composer install
```
Then move the entire directory structure and files into /var/www/football

And 

```
cd /etc/apache2/sites-available

sudo cp 000-default.conf 001-project.conf

sudo vim 001-project.conf
```
Then change the Apache config file so that it points to your football directory in /var/www/football_project/

After this is done

```
cd ../sites-enabled

sudo ln -s ../sites-available/001-project.conf
```

Then troubleshoot for a month and it works!

## Running the tests

Tests... Ha! We laugh at testing. (We really dont)

## Deployment

To deploy on your system you must configure Apache sites-enabled and sites-available files
as well as create a directory structure similar to the repo in /var/www/

## Built With

* Custom-built MVC Framework - The web framework used
* [Composer](https://www.composer.com) - Dependency Management
* [NFL Arrests](https://www.nflarrests.com/api/) - Used to gather Arrest data
* [NFL Player Data](http://developer.fantasydata.com/docs) - Used for Player data
* [Github](http://www.github.com) - Used for source control
* [Bootstrap](http://www.bootstrap.com) - Used for CSS Styling
* [Love](http://www.google.com)
* [Honey Mustard](http://www.heinz.com)

## Versioning

This is currently version 1.0

## Authors

* **Branden Robinson** - *Player List, Start/Sit, RabbitMQ Integration, Newsriver Integration, and Site Re-Design* - [Branden Github](https://github.com/br66)
* **Jason Sevilla** - *Cron scripts, Wireframing* - [Jason Github](https://github.com/js296)
* **Yuval Klein** - *MVC Framework abstracts, Arrest integration, Login, Signup, Weekly Rankings, RabbitMQ Integration* - [Yuval Github](https://github.com/yk92)

## License

This project is licensed under the MIT License

## Acknowledgments

* MunchiesNJ (god those burgers are good)
* Annabella's Kitchen patty melt
* Honey Mustard
* Mr. DJ Kehoe for making us do the stupid carousel
* Inspiration - Sometimes
* etc - yes, lots of etc. That guy was clutch
* Bootstrap 

