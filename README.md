# Trunck WordPress Starter Theme Development Guide
Based on [Timber](https://github.com/timber/timber) and [Zurb Foundation](http://foundation.zurb.com/sites/docs/).

## Theme setup

### Theme dependencies
Trunck requires the following plugins to be activated. Once these plugins are activated, Trunck can be activated.
- [Timber](https://wordpress.org/plugins/timber-library/) - enables use of the Twig templating engine in WordPress templates
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) - provides back-end interface for creating different types of field inputs for post custom meta

### NPM
The build tools used in this theme requires Node JS to be installed on your computer. After cloning/downloading, cd to the theme folder and run the following commands to install required node modules:
```shell
npm install
```
These modules will reside in ```/node_modules```.
### Bower
Bower is used for web package management. Run the following command to install all dependencies such as Foundation, jQuery, and Font Awesome:
```shell
bower install
```
These packages will reside in ```/bower_components```.

## Grunt
Grunt is used to to combine/minify stylesheets, combine/minify JavaScript, SASS compilation, living styleguide generation, and copying files. To run all tasks once run the following command:
```shell
grunt
```
To run all tasks and continue to watch for your changes run the following command:
```shell
grunt dev
```
You can edit the Grunt configuration in ```/Gruntfile.js```.

## Foundation
Templates are based on the Foundation responsive front-end framework. It is important to become familiar with the framework's components and conventions by browsing its [documentation](http://foundation.zurb.com/sites/docs/). 

## Styling
Foundation's SASS components are imported in ```/scss/app.scss``` which is the source SCSS file. Here you can include or exclude components based on your needs. Other auxiliary components are imported here as well. As you create custom SASS you should import the resulting files here.

SASS files that contain styling for general components that can be used throughout templates should be placed in ```/scss/components```. SASS files that contain styling specific to page templates should be placed in ```/scss/templates```. 

Foundation's UI components are to serve as base styling and markup for templates. Further CSS customization is made by first modifying Foundation's SASS variable values. The file, ```/scss/_settings.scss``` contains, all variables exposed by Foundation used in the CSS build. You can refer to the [documentation](http://foundation.zurb.com/sites/docs/) for clarity on the impact of changing each value. At the bottom of each page there is a table explaining the purpose of these variables.

After Grunt compiles the SASS files, the following files are generated: ```/css/screen.css```, ```/css/screen.min.css```, ```/css/print.min.css```.
## JavaScript
All JavaScript plugins and utilities packaged with Foundation are included in the Grunt Javascript build. To include custom JS files in the build, edit the concat task in ```/Gruntfile.js```. All custom JS files should be placed in ```/js/source```. The final build files will be ```/js/script.js``` and ```/js/script.min.js```.

## Timber


## Coding Conventions

- Use Foundation components first
- use Foundation settings variables
- Include CSS and JS plugins with Bower
- SCSS file organization


## Viewing and extending styleguide


## Sidebars


## Template naming standards