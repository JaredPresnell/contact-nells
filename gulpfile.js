var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var browserify = require('browserify');
// var babelify = require('babelify');
// var source = require('vinyl-source-stream');
// var buffer = require('vinyl-buffer');
// var uglify = require('gulp-uglify');

var styleSRC = 'scss/style.scss';
var styleDIST = './css/';
var styleWatch = 'scss/**/*.scss';


gulp.task('style', function(){
	gulp.src( styleSRC )
		.pipe( sourcemaps.init() )
		.pipe( sass({
			errorLogToConsole: true,
			outputStyle: 'compressed' 	
		}) )
		.on( 'error', console.error.bind( console) )
		.pipe( autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( styleDIST ) );

});

gulp.task('default', [
		'style',
	]);

gulp.task('watch', ['default'], function(){
	gulp.watch( styleWatch, ['style'] );
});