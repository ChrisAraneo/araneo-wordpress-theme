const gulp = require('gulp');
const del = require('del');
const zip = require('gulp-zip');
const sass = require('gulp-sass');
sass.compiler = require('node-sass');
const cleancss = require('gulp-clean-css');

const themeName = "araneo-theme";

// =====

gulp.task('clean', function () {
    return del(['dist/*']);
});

gulp.task('sass', function () {
    return gulp.src('src/styles/**.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('src/styles/'));
});

gulp.task('minify-css', function () {
    return gulp.src('src/styles/**.css')
        .pipe(cleancss({ compatibility: 'ie8' }))
        .pipe(gulp.dest('src/styles/'));
});

gulp.task('clean-!zip', function () {
    return del(['dist/*', `!dist/*.zip`]);
});

gulp.task('clean-styles', function () {
    return del(['dist/styles/*.map', 'dist/styles/*.scss']);
});

gulp.task('copy-src', function () {
    return gulp.src(['src/**', '!src/screenshot-git.png'])
        .pipe(gulp.dest('dist/'));
});

gulp.task('copy-bootstrap', function () {
    return gulp.src('vendor/twbs/bootstrap/dist/js/bootstrap.min.js')
        .pipe(gulp.dest('dist/libs/'));
});

gulp.task('copy-navwalker', function () {
    return gulp.src('vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php')
        .pipe(gulp.dest('dist/libs/'));
});

gulp.task('archive', function () {
    return gulp.src('dist/**')
        .pipe(zip(`${themeName}.zip`))
        .pipe(gulp.dest('dist/'))
});

gulp.task('success', function () {
    console.log("Success!");
    return null;
})

// =====

gulp.task('build', gulp.series('clean', 'sass', 'minify-css', gulp.parallel('copy-src', 'copy-bootstrap', 'copy-navwalker'), 'clean-styles', 'archive', 'clean-!zip'));