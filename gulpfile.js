const gulp = require('gulp');
const del = require('del');
const zip = require('gulp-zip');

const themeName = "araneo-theme";

function clearAll() {
    return del(['dist/*']);
}

function copyAll() {
    const copy = async (from, to) => {
        return gulp.src(from)
            .pipe(gulp.dest(to));
    }

    return gulp.series(
        () => copy('src/*', 'dist/'),
        () => copy('vendor/twbs/bootstrap/dist/js/bootstrap.min.js', 'dist/libs/'),
        () => copy('vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php', 'dist/libs/')
    );
}

function archive(from, name, to) {
    return gulp.src(from)
        .pipe(zip(name))
        .pipe(gulp.dest(to))
}

function clear() {
    return del(['dist/*', `!dist/${themeName}.zip`]);
}

exports.build = gulp.series(clearAll, copyAll, archive, clear);