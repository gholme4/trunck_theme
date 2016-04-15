# Trunck WordPress Starter Theme Development Guide
Based on [Timber](https://github.com/timber/timber) and [Zurb Foundation](http://foundation.zurb.com/sites/docs/).

## Theme setup

### Theme dependencies
Trunck requires the following plugins to be activated. Once these plugins are activated, Trunck can be activated.
- [Timber](https://wordpress.org/plugins/timber-library/) - enables use of the Twig templating engine in WordPress templates
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) - provides back-end interface for creating different types of field inputs for post custom meta

### NPM
The build tools used in this theme requires Node JS to be installed on your computer. After cloning/downloading, cd to the theme folder and run the following commands to install required node modules with NPM:
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
Foundation's SASS components are imported in /scss/global.scss which is imported in /scss/app.scss, the source SCSS file.

SASS files that contain styling for general components that can be used throughout templates should be placed in /scss/components and imported in /scss/global.scss. SASS files that contain styling specific to page templates should be placed in /scss/templates and imported in /scss/app.scss. This allows developers to choose to link a stylesheet in their respective page templates while linking /css/global.css in every web page. Alternatively one can choose to use /css/all.css on every page which will include all CSS.

Foundation's UI components are to serve as base styling and markup for templates. Further CSS customization is made by first modifying Foundation's SASS variable values. The file, ```/scss/_settings.scss``` contains, all variables exposed by Foundation used in the CSS build. You can refer to the [documentation](http://foundation.zurb.com/sites/docs/) for clarity on the impact of changing each value. At the bottom of each page there is a table explaining the purpose of these variables.

Print specific styling is compiled from ```/scss/print.scss```.

After Grunt compiles the SASS files, the following files are generated: ```/css/screen.css```, ```/css/screen.min.css```, ```/css/print.min.css```.
## JavaScript
All JavaScript plugins and utilities packaged with Foundation are included in the Grunt Javascript build. To include custom JS files in the build, edit the concat task in ```/Gruntfile.js```. All custom JS files should be placed in ```/js/source```. The final build files will be ```/js/script.js``` and ```/js/script.min.js```.

## Timber
The Timber plugin allows for rendering WordPress templates with [Twig](http://twig.sensiolabs.org/). It is important to become familiar with the Timber framework's classes and conventions by reading it's [documentation](http://timber.github.io/timber/#getting-started). The purpose of using Timber is to minimize the amount of logic mixed with HTML markup.

Timber is initialized in ```/lib/init.php```. This is where Timber is configured. This includes adding Twig filters and specifying the location of Twig templates.

Custom page templates and tandard WordPress HTML parts like ```single.php```, ```header.php```, and ```search.php``` don't contain HTML markup. They specify the appropriate Twig template to render and content that should be available in that template. Custom page templates are to be placed in ```/templates```. Their respective Twig views are to be placed in ```/views```.

The base Twig template is ```/views/base.twig```. Navigation menus are coded in this template. ```header.php``` and ```footer.php``` are included via their Twig templates. The remaining Twig templates generally extend ```/views/base.twig```.

## Viewing and extending styleguide
During development, changes to SCSS files will update the living styleguide. The styleguide can be viewed by loading ```/styleguide/index.html``` in the browser. 

The SCSS files containing the KSS comments used to build the styleguide are located in ```/scss/styleguide```. To add another page to the styleguide create a new SCSS file in this folder following the current numbering convention. Read this [guide](http://warpspire.com/kss/syntax/) for instruction on the KSS comment format.

To customize the living styleguide template, update ```/kss-node-template/index.html```,
## Development Conventions

- Make use Foundation UI components first before adding custom components. For example, implement and customize [Reveal](http://foundation.zurb.com/sites/docs/reveal.html) before developing new modal functionality.
- Change values of Foundation settings variables for custom styling before adding new CSS rules.
- Don't reference files directly in Bower packages. Instead include them in the JS/SCSS builds or copy needed assets to the appropriate folders. For example, if a font file is needed from a Bower package copy it to ```/fonts``` with the Grunt copy task. Or for a JS file include it in the concat Grunt task.
- Comment liberally

## Theme file structure
- ```acf-json/``` - advanced custom fields JSON sync files
- ```bower_components/``` - Front-end asset packages
- ```css/``` - stylesheets
- ```fonts/``` - font files
- ```images/``` - images
- ```js/``` - JavaScript files
- ```kss-node-template/``` - template files used in generating living styleguide
- ```lang/``` - .mo and .po translation files
- ```lib/``` - files with WordPress boilerplate code included in ```functions.php```
- ```node_modules/``` - Node JS modules
- ```scss/``` - SCSS files
- ```styleguide/``` - living styleguide site files