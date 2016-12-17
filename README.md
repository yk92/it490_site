# NFL Arrests App

This project is my IT490 (Systems Integration) Site. 
It shows NFL Arrest data for every active/inactive player in the league.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.
See deployment for notes on how to deploy the project on a live system.

Just git clone the repository and run a composer install then do a million other things and it'll work. Sweet...

### Prerequisites

What things you need to install the software and how to install them

```
An installed, configured, and running virtual machine. 

**Preferably Ubuntu 16.04 but any Linux distro will work**

Time - lots and lots of time...
```

### Installing

A step by step series of examples that tell you how to get a development env running

```
git clone git@github.com:IT490/Football_Project.git football_project

cd football_project

composer install
```
Once you have the repo cloned onto your local disk, you must

then move the entire directory structure and files into /var/www/football_site:

```
sudo mv ~/football_project /var/www/football_site

```
Now, you need to set up Apache to recognize the site as available and enabled. 

*** [ A demo apache .conf file will be added to this repository ]
```
cd /etc/apache2/sites-available

sudo cp 000-default.conf 001-project.conf

sudo vim 001-project.conf
```
Now that you have an apache conf file, change the file so that it points 
to your football directory in /var/www/football_project/. [ Look at demo file ]

After this is done create a sym link in sites-enabled:

```
cd ../sites-enabled

sudo ln -s ../sites-available/001-project.conf
```
If you are running on a VM (as is recommended) you now need to edit your /etc/hosts file
to allow your new apache .conf to "exist" on the web

*** [ This configuration still needs to be added to the README ]

## Running the tests


## Deployment

To deploy on your system you must configure Apache sites-enabled and sites-available files
as well as create a directory structure similar to the repo in /var/www/

Then edit the /etc/hosts file and cycle your network connection so Linux picks up /etc/hosts changes

## Built With

* Custom-built MVC Framework - I created a simple MVC-Light "framework"
* [Composer](https://www.composer.com) - Dependency Management
* [NFL Arrests](https://www.nflarrests.com/api/) - API Used to gather Arrest data
* [NFL Player Data](http://developer.fantasydata.com/docs) - API Used for Player data
* [Github](http://www.github.com) - Used for source control
* [Bootstrap](http://www.bootstrap.com) - Used for CSS Styling
* [Love](http://www.google.com)
* [Honey Mustard](http://www.heinz.com)

## Versioning

This is currently version 1.0

## Authors

* **Branden Robinson** - *Player List, Start/Sit View - [Branden Github](https://github.com/br66)
* **Yuval Klein** - *MVC Framework abstracts, Arrest integration, Login, Signup, Weekly Rankings, Models, RabbitMQ Integration, RPC Servers, custom Thumper classes, index.php * - [Yuval Github](https://github.com/yk92)

## License

This project is licensed under the MIT License

## Acknowledgments

* MunchiesNJ (god those burgers are good)
* Annabella's Kitchen patty melt
* Honey Mustard
* Prof. Chaos (DJ Kehoe) for making us do the stupid carousel
* Inspiration - On a good day

