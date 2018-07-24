var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('autoprefixer');

gulp.task('sass', function(){
  return gulp.src('scss/**/*.scss')
    .pipe(sass()) // Using gulp-sass
    .pipe(gulp.dest(''))
});

gulp.task('watch', ['sass'], function(){
  gulp.watch('scss/**/*.scss', ['sass']);
  // Other watchers
})

gulp.task('autoprefixer', function () {
    return gulp.src('*.css')
        .pipe(postcss([ autoprefixer() ]))
        .pipe(gulp.dest('./dest'));
});
