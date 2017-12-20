'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglifyjs');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var bs = require('browser-sync').create();
var rename = require("gulp-rename");
var plumber = require('gulp-plumber');

gulp.task('browser-sync', ['sass'], function() {
	bs.init({
		proxy: {
	    	target: "https://localhost/naricesfrias/v2",
		},
		localOnly: true,
		reloadDebounce: 500,
		ghostMode: false,
		scrollProportionally: false
		// https: {
  //     key: "C:/.inmediative/.dev/.apache/common/ssl/d.ev/server.key",
  //     cert: "C:/.inmediative/.dev/.apache/common/ssl/d.ev/server.crt"
  //   }
  });
});


gulp.task('sass', function() {

	return gulp.src('sass/main.scss')
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(sourcemaps.write('.', {
			addComment: true, 
			includeContent: true, 
			sourceRoot: './pre'
		}))
		.pipe(gulp.dest('../app/layout'))
		.pipe(bs.reload({
			stream: true
		}));

	/*return gulp.src('main.scss')
	.pipe(sass({outputStyle: 'compressed'}))
	.pipe(autoprefixer({
    browsers: ['last 2 versions'],
    cascade: false
	}))
	.pipe(gulp.dest('../.assets/'))
	.pipe(bs.reload({
		stream: true
	}));*/
});

gulp.task('js', function() {
  return gulp.src([
  	'./js/**/*.js', 
  	])
    .pipe(plumber())
    .pipe(concat('main.js'))

    // .pipe(uglify({
    //   outSourceMap: true
    // }))
    .pipe(gulp.dest('../app/layout'))
    .pipe(bs.reload({
			stream: true
		}));
});

gulp.task('default', ['browser-sync'], function () {
	gulp.watch("./**/*.scss", ['sass', 'js']);
	gulp.watch("./**/*.js", ['js']);
});

gulp.task('g', ['sass','js'], function () {

});
