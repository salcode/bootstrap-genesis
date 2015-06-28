bootstrap-genesis
=================
WordPress Genesis Child Theme setup to use Bootstrap 3, Sass, and Grunt.

Contributors
----------------------------------
[@salcode](https://github.com/salcode), [@dustyndoyle](https://github.com/dustyndoyle),
[@codenameEli](https://github.com/codenameeli), [@bryanwillis](https://github.com/bryanwillis)


The CSS is Missing
----------------------------------
I hear from a lot of users, "Hey, I tried to use your theme but there is no CSS."

### Quick Fix
Download the latest [Bootstrap Genesis release](https://github.com/salcode/bootstrap-genesis/releases) and use that.

### The Long Version
This is the base theme I use for the projects I build.  Part of my workflow includes using
[GruntJS](http://gruntjs.com/) for my CSS/Sass and JavaScript compilation, concatenation, and minification.
Because the resulting `css/style.min.css` and `js/javascript.min.js` files are compiled files, I do NOT
check them into version control (i.e. they are listed in the `.gitignore` file).

The result of all this is the files in the repo are a copy of the theme with all the source
files for the CSS and JavaScript but not the final CSS and JavaScript.

If you're running [GruntJS](http://gruntjs.com/) and have [Sass](http://sass-lang.com/)
installed you can run `npm install` and `grunt` from the command line and the
CSS and JavaScript will be generated.  If you're not running these tools yet,
you can use the latest
[Bootstrap Genesis release](https://github.com/salcode/bootstrap-genesis/releases),
which includes the compilied CSS and JavaScript.


Why no CSS in style.css?
----------------------------------
Since I'm treating the CSS as a compiled asset that I do not want to include it
in version control, I use `style.css` only for the theme header information and
all applied CSS is stored in `css/style.min.css`


Menu Modifications
----------------------------------
The menu is modified to use Bootstrap markup and the menus are placed at the top
of the page by default.
All menu modifications are removed, when the [Ubermenu](http://wpmegamenu.com/)
plugin is present


Project Goal
----------------------------------
This theme was created as my own starting point when building custom
Genesis child themes using the Bootstrap front-end framework.

The goal is to leverage Bootstrap as much as possible by adding the appropriate
markup to trigger Bootstrap styling.

Whenever there is a choice between making an adjustment via the markup
or via Sass/CSS, markup modifications are preferrable.  There are two
justifications for this:

1. We want to keep the CSS as small as possible for load time
2. By using Bootstrap Markup we make the Bootstrap integration more transparent
and easier understand and manipulate.


How to Update Bootstrap
----------------------------------
Here are my notes on updating Bootstrap in this project.

#### Warning
After updating the Bootstrap files, the Grunt task must be run to update
`css/style.min.css` and `js/javascript.min.js`.  There are the only two files
loaded for CSS and JavaScript, all of the other files are the source files
which are used to create these two minified files.

### Steps
- Download the latest [Sass version of Bootstrap](https://github.com/twbs/bootstrap-sass)
- Replace the JavaScript file. Move the new `assets/javascripts/bootstrap.js` to `js/vendor/bootstrap/`
- Replace the fonts.  Move all files in the new download from `assets/fonts/bootstrap/` to `fonts/bootstrap/`
- Replace the top level Sass file.  Move the new `assets/stylesheets/_bootstrap.scss` to `css/sass/supporting/bootstrap.scss`
- Replace the Bootstrap partial and mixin files.  Mall all files in the new download from `assets/stylesheets/bootstrap/` to `css/sass/supporting/bootstrap/`




License
----------------------------------
GPL
