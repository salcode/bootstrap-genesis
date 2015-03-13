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


License
----------------------------------
GPL
