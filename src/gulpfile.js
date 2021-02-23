'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCss = require('gulp-clean-css');
var rename = require('gulp-rename');
var scsslint = require('gulp-scss-lint');
//const postcss = require('gulp-postcss');
const autoprefixer = require('gulp-autoprefixer');

sass.compiler = require('node-sass');
 

var paths = {
  sass: ['./scss/**/*.scss']
};

gulp.task('sass', function(done) {
  gulp.src('./scss/**/*.scss')
    .pipe(sass())
    .on('error', sass.logError)
    //.pipe(postcss([ autoprefixer('last 2 version') ]))
    .pipe(gulp.dest('./static/css/'))
    .pipe(cleanCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({extname: '.min.css'}))
    .pipe(gulp.dest('./static/css/'))
    .on('end', done);
});

gulp.task('lint', function() {
  return gulp.src('/scss/**/*.scss')
    .pipe(scsslint());
});


gulp.task('watch', function () {
  gulp.watch(paths.sass, gulp.series('sass'));
});

gulp.task('default', gulp.series('sass'));


