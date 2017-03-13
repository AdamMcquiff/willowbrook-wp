const gulp = require('gulp');
const sass = require('gulp-sass');
const jshint = require('gulp-jshint');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const uncss = require('gulp-uncss');
const cssnano = require('gulp-cssnano');
const base64 = require('gulp-base64');
const imagemin = require('gulp-imagemin');
const svgmin = require('gulp-svgmin');
const shorthand = require('gulp-shorthand');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const addsrc = require('gulp-add-src');
const todo = require('gulp-todo');
const livereload = require('gulp-livereload');
const browserSync = require('browser-sync').create();

// paths to folders
const URL = "http://localhost/wp_boilerplate";
const paths = {
    src: {
        php: "**/*.php",
        sass: "library/scss/**/*.scss",
        js: "library/js/src/*.js",
        jsLibs: "library/js/src/libs/**/*.js",
        bitmap: "library/img/src/**/*.{png,jpg,gif}",
        vector: "library/img/src/**/*.svg"
    },
    build: {
        css: "library/css",
        js: "library/js",
        img: "library/img/"
    },
    babel: {
        es2015: "node_modules/babel-preset-es2015",
    }
}

// Convert sass to css files
gulp.task('sass', function () {
    gulp.src(paths.src.sass)
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass())
        .pipe(shorthand())
        .pipe(base64())
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
        .pipe(gulp.dest(paths.build.img))
        .pipe(browserSync.stream())
        .pipe(livereload());
});

// watches for changes in directories
gulp.task('watch', function () {
    browserSync.init({
        proxy: URL,
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

// Generated 'todo' list
gulp.task('todo', function() {
    gulp.src(paths.src)
        .pipe(todo())
        .pipe(gulp.dest('./'));
});

// error handling
var plumberErrorHandler = {
    errorHandler: notify.onError({
        title: 'Gulp',
        message: 'Error: <%= error.message %>'
    })
};

gulp.task('default', ['sass', 'js', 'bitmap', 'vector', 'watch']);
