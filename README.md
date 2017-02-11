# Zetec WordPress Boilerplate / README #

This is a boilerplate installation for WordPress comprised of:

* A heavily customised version of [Bones Boilerplate](http://themble.com/bones/) theme
* Gulp file setup for theme development
* [WordPress Core Version 4.7.2](https://wordpress.org/download/)
* A handful of select plugins


### What plugins are included ###

* [Advanced Custom Fields](http://advancedcustomfields.com/)
* [Contact Form 7](https://contactform7.com/)
* [Duplicator](https://en-gb.wordpress.org/plugins/duplicator/)
* [Minqueue](https://wordpress.org/plugins-wp/minqueue/)
* [Safe SVG](https://en-gb.wordpress.org/plugins/safe-svg/)
* [User Role Editor](https://en-gb.wordpress.org/plugins/user-role-editor/)
* [White Label CMS](https://en-gb.wordpress.org/plugins/white-label-cms/)
* [Wordfence](https://www.wordfence.com/)
* [Yoast SEO](https://yoast.com/wordpress/plugins/seo/)
* [WP Fastest Cache](http://www.wpfastestcache.com/)

### How do I get set up? ###

##### Setup WordPress #####

1. Pull the `git` repository locally - run `git clone https://Zetec@bitbucket.org/zetecit/boilerplate-wordpress.git` in your CLI
* Setup WordPress following the [Famous 5-Minute Install](https://codex.wordpress.org/Installing_WordPress#Famous_5-Minute_Install) guide - start from step 2.

##### Setup the Theme #####

We have two themes within our `themes` directory. The first directory, `wp_theme`, is the actual theme that will be used in production.

The second directory, `wp_gulp`, handles all of the production task running stuff, such as generating CSS from our SASS files,
minifying JavaScript and images, etc.

We are also using `BrowserSync` to live preview our theme as we build it.

1. Go to `wp-content/themes` and change the name of `wp_theme` to a name of your choice.
* Go to `wp-content/themes/wp_gulp` and run `npm install` from your CLI.
* Open `gulpfile.js` and add your new theme directory and localhost URL in the `project` and `url` variables
* Run `gulp watch` from the same directory from your CLI, this will start `BrowserSync` and start watching your files for changes.
* You can now start editing the theme within the `wp_theme` directory.

### Gulpfile ###

Within our `gulpfile.js` we are using:

* `gulp-sass` - used to convert .scss files into .css
* `gulp-jshint` - detects errors and potential problems with JS code
* `gulp-concat` - concatenates multiple files into a single file, reduces HTTP requests
* `gulp-uglify` - minifies JS code
* `gulp-babel` - converts ES6 JavaScript into older, more supported code
* `gulp-uncss` - removes unused css *(not currently in use)*
* `gulp-cssnano` - minifies CSS
* `gulp-imagemin` - minifies bitmap images
* `gulp-svgmin` - minifies SVG images
* `gulp-plumber` - prevents errors caused by gulp plugins
* `gulp-notify` - sends errors messages
* `gulp-addsrc` - lets you add 'src' inbetween gulp pipes
* `gulp-livereload` - reloads the page
* `browser-sync` - live CSS preview and sync across browsers

### Contribution guidelines ###

* The Boilerplate theme is based on [Bones Boilerplate](http://themble.com/bones/) theme.

### Who do I talk to? ###

* Supported and built by [Zetec IT Solutions](https://www.zetec-it.com)