var gulp = require('gulp'),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    prefix = require('gulp-autoprefixer'),
    cssmin = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    sourcemaps = require('gulp-sourcemaps');
concat = require('gulp-concat');
uglify = require('gulp-uglify');


var onError = function (err) {
    notify.onError({
        title: "Gulp",
        subtitle: "Failure!",
        message: "Error: <%= error.message %>",
        sound: "Basso"
    })(err);
    this.emit('end');
};

var sassOptions = {
    outputStyle: 'expanded'
};


var prefixerOptions = {
    browsers: ['last 2 versions']
};


gulp.task('sass', function () {
    return gulp.src('assets/scss/style.scss')
        .pipe(plumber({errorHandler: onError}))
        .pipe(sourcemaps.init())
        .pipe(sass(sassOptions)) // Converts Sass to CSS with gulp-sass
        .pipe(prefix(prefixerOptions))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist/styles'));
});

// PROCESS JAVASCRIPT
gulp.task('js', function () {
    return gulp.src([
        'assets/scripts/**/*.js',
    ])
        .pipe(plumber())
        .pipe(concat('script.js'))
        .pipe(gulp.dest('library/js/build'))
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('dist/scripts'));
});