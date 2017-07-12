# WP Willowbrooke / README #

WP Willowbrooke is a boilerplate installation for WordPress comprised of:

* A heavily customised fork of [Bones Boilerplate](http://themble.com/bones/) theme (with SASS linter, Gulp and other improvements)
* `composer.json` file with WordPress core and selected plugins

### What plugins are included ###

* [CMB2](https://github.com/WebDevStudios/CMB2)
* [Contact Details](https://wordpress.org/plugins/contact-details/)
* [Contact Form 7](https://contactform7.com/)
* [Duplicator](https://en-gb.wordpress.org/plugins/duplicator/)
* [Force Email Login](https://wordpress.org/plugins/force-email-login/)
* [Login Lockdown](https://en-gb.wordpress.org/plugins/login-lockdown/)
* [Minqueue](https://wordpress.org/plugins-wp/minqueue/)
* [Safe SVG](https://en-gb.wordpress.org/plugins/safe-svg/)
* [User Role Editor](https://en-gb.wordpress.org/plugins/user-role-editor/)
* [White Label CMS](https://en-gb.wordpress.org/plugins/white-label-cms/)
* [Wordfence](https://www.wordfence.com/)
* [WP Super Cache](https://en-gb.wordpress.org/plugins/wp-super-cache/)
* [Yoast SEO](https://yoast.com/wordpress/plugins/seo/)

### How do I get set up? ###

##### Setup WordPress #####

1. Pull the `git` repository locally - run `git clone https://Zetec@bitbucket.org/zetecit/boilerplate-wordpress.git folder-name` in your CLI
2. Run `composer update` to install WordPress and the plugins
3. Setup WordPress following the [Famous 5-Minute Install](https://codex.wordpress.org/Installing_WordPress#Famous_5-Minute_Install).

##### Setup the Theme #####

`wp_theme`, is the theme that will be used in production.


1. Go to `wp-content/themes` and change the name of `wp_theme` to a name of your choice.
2. Run `npm install` from the CLI
3. Open `gulpfile.js` and add your WordPress directory to the `URL` variable
4. Run `gulp watch` from your CLI, this will start `BrowserSync` and start watching your files for changes.
5. 'Find and Replace': `[WEBSITE NAME]`, `[WEBSITE URL]`, `[WEBSITE DESCRIPTION]`, `[THEME SLUG]` and `theme_slug` as appropriate.
6. You can now start editing the theme within the `wp_theme` directory.

### Gulpfile ###

Within our `gulpfile.js` we are using:

* `gulp-sass` - used to convert .scss files into .css
* `gulp-jshint` - detects errors and potential problems with JS code
* `gulp-concat` - concatenates multiple files into a single file, reduces HTTP requests
* `gulp-uglify` - minifies JS code
* `gulp-babel` - converts ES6 JavaScript into older, more supported code
* `gulp-uncss` - removes unused css *(not currently in use)*
* `gulp-cssnano` - minifies CSS
* `gulp-base64` - converts images in CSS to base64 encoded
* `gulp-imagemin` - minifies bitmap images
* `gulp-svgmin` - minifies SVG images
* `gulp-plumber` - prevents errors caused by gulp plugins
* `gulp-notify` - sends errors messages
* `gulp-addsrc` - lets you add 'src' inbetween gulp pipes
* `gulp-livereload` - reloads the page
* `gulp-todo` - Generated a 'To-Do' list from comments in the code
* `browser-sync` - live CSS preview and sync across browsers

### Future Implementations ###

- [ ] Create symlink between root theme directory and a folder in wp-content/themes directory.
- [ ] Replace current grid system with [susy](http://oddbird.net/susy/).
- [ ] Add 'gulp-beer' to gulp workflow for error handling.
- [ ] Implement [TinyReset](http://jgthms.com/minireset.css/) to replace current normalisation style.

 
### Contribution guidelines ###

* The Boilerplate theme is based on [Bones Boilerplate](http://themble.com/bones/) theme.

### Who do I talk to? ###

* Supported and built by [Adam McKenna](http://www.adammckenna.co.uk)