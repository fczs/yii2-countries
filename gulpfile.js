var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    uglifycss = require('gulp-uglifycss'),
    rename = require('gulp-rename'),
    minimist = require('minimist'),
    options = minimist(process.argv.slice(2), {string: ['src', 'dist']}),
    destDir = options.dist.substring(0, options.dist.lastIndexOf("/")),
    destFile = options.dist.replace(/^.*[\\\/]/, '');

gulp.task('compress-js', function () {
    return gulp.src(options.src)
        .pipe(uglify())
        .pipe(rename(destFile))
        .pipe(gulp.dest(destDir))
});

gulp.task('compress-css', function () {
    return gulp.src(options.src)
        .pipe(uglifycss({
            "maxLineLen": 500
        }))
        .pipe(rename(destFile))
        .pipe(gulp.dest(destDir))
});