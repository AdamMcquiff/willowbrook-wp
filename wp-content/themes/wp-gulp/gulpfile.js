const gulp = require('gulp');
const sass = require('gulp-sass');
const jshint = require('gulp-jshint');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const uncss = require('gulp-uncss');
const cssnano = require('gulp-cssnano');
const imagemin = require('gulp-imagemin');
const svgmin = require('gulp-svgmin');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const addsrc = require('gulp-add-src');
const livereload = require('gulp-livereload');
const browserSync = require('browser-sync').create();

// paths to folders
var project = "../wp-theme/";
var url = "http://localhost/wp_boilerplate";
var paths = {
    src: {
        php: project + "**/*.php",
        sass: project + "library/scss/**/*.scss",
        js: project + "library/js/src/*.js",
        jsLibs: project + "library/js/src/libs/**/*.js",
        bitmap: project + "library/img/src/**/*.{png,jpg,gif}",
        vector: project + "library/img/src/**/*.svg"
    },
    build: {
        css: project + "library/css",
        js: project + "library/js",
        img: project + "library/img/"
    },
    babel: {
        es2015: "../../../../wp-gulp/node_modules/babel-preset-es2015",
    }
}

// Convert sass to css files
gulp.task('sass', function () {
    gulp.src(paths.src.sass)
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass())
        .pipe(cssnano())
        .pipe(gulp.dest(paths.build.css))
        .pipe(browserSync.stream())
        .pipe(livereload());
});

// lints and combines JS files
gulp.task('js', function () {
    gulp.src(paths.src.js)
        .pipe(plumber(plumberErrorHandler))
        .pipe(babel({
            presets: [paths.babel.es2015]
        }))
        .pipe(addsrc(paths.src.jsLibs))
        .pipe(uglify())
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(paths.build.js))
        .pipe(browserSync.stream())
        .pipe(livereload());
});

// optimises bitmap (jpg, png, gif) images
gulp.task('bitmap', function () {
    gulp.src(paths.src.bitmap)
        .pipe(plumber(plumberErrorHandler))
        .pipe(imagemin({
            optimizationLevel: 7,
            progressive: true
        }))
        .pipe(gulp.dest(paths.build.img))
        .pipe(browserSync.stream())
        .pipe(livereload());
});

// optimises vector (SVG) images
gulp.task('vector', function () {
    return gulp.src(paths.src.vector)
        .pipe(svgmin())
        .pipe(gulp.dest(paths.build.img));
});

// watches for changes in directories
gulp.task('watch', function () {
    browserSync.init({
        proxy: url,
    });
    livereload.listen();
    gulp.watch(paths.src.sass, ['sass']);
    gulp.watch(paths.src.js, ['js']);
    gulp.watch(paths.src.bitmap, ['bitmap']);
    gulp.watch(paths.src.vector, ['vector']);
    gulp.watch(paths.src.php, function () {
        gulp.src(paths.src.php)
            .pipe(browserSync.stream())
    })
});

// error handling
var plumberErrorHandler = {
    errorHandler: notify.onError({
        title: 'Gulp',
        message: 'Error: <%= error.message %>'
    })
};

gulp.task('default', ['sass', 'js', 'bitmap', 'vector', 'watch']);
