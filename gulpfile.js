// Load all the modules from package.json
var gulp = require( 'gulp' ),
  plumber = require( 'gulp-plumber' ),
  autoprefixer = require('gulp-autoprefixer'),
  watch = require( 'gulp-watch' ),
  jshint = require( 'gulp-jshint' ),
  stylish = require( 'jshint-stylish' ),
  uglify = require( 'gulp-uglify' ),
  rename = require( 'gulp-rename' ),
  notify = require( 'gulp-notify' ),
  include = require( 'gulp-include' ),
  sass = require( 'gulp-sass' ),
  imageoptim = require('gulp-imageoptim'),
  browserSync = require('browser-sync').create(),
  critical = require('critical'),
  zip = require('gulp-zip');

var config = {
  nodeDir: './node_modules' 
}


// automatically reloads the page when files changed
var browserSyncWatchFiles = [
  './*.min.css',
  './assets/js/**/*.min.js',
  './**/*.php'
];

// see: https://www.browsersync.io/docs/options/
var browserSyncOptions = {
  watchTask: true,
  proxy: "http://wp.dev/"
}

// Default error handler
var onError = function( err ) {
  console.log( 'An error occured:', err.message );
  this.emit('end');
}

// Zip files up
gulp.task('zip', function () {
 return gulp.src([
   '*',
   './assets/css/*',
   './assets/js/**/*',
   './assets/fonts/*',
   './assets/img/*',
   './inc/**/*',
   './languages/*',
   './scss/**/*',
   './template-parts/*',
   '!bower_components',
   '!node_modules',
  ], {base: "."})
  .pipe(zip('writing.zip'))
  .pipe(gulp.dest('.'));
});

// Jshint outputs any kind of javascript problems you might have
// Only checks javascript files inside /src directory
gulp.task( 'jshint', function() {
  return gulp.src( './assets/js/src/*.js' )
    .pipe( jshint() )
    .pipe( jshint.reporter( stylish ) )
    .pipe( jshint.reporter( 'fail' ) );
})


// Concatenates all files that it finds in the manifest
// and creates two versions: normal and minified.
// It's dependent on the jshint task to succeed.
gulp.task( 'scripts', ['jshint'], function() {
  return gulp.src( './assets/js/manifest.js' )
    .pipe( include() )
    .pipe( rename( { basename: 'scripts' } ) )
    .pipe( gulp.dest( './assets/js' ) )
    // Normal done, time to create the minified javascript (scripts.min.js)
    // remove the following 3 lines if you don't want it
    .pipe( uglify() )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( gulp.dest( './assets/js' ) )
    .pipe(browserSync.reload({stream: true}))
    .pipe( notify({ message: 'scripts task complete' }));
} );

// Different options for the Sass tasks
var options = {};
options.sass = {
  errLogToConsole: true,
  precision: 8,
  noCache: true,
  //imagePath: 'assets/img',
  includePaths: [
    config.nodeDir + '/bootstrap/scss',
  ]
};

options.sassmin = {
  errLogToConsole: true,
  precision: 8,
  noCache: true,
  outputStyle: 'compressed',
  //imagePath: 'assets/img',
  includePaths: [
    config.nodeDir + '/bootstrap/scss',
  ]
};

// Sass
gulp.task('sass', function() {
  return gulp.src('./scss/style.scss')
    .pipe(plumber())
    .pipe(sass(options.sass).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('.'))
    .pipe(browserSync.reload({stream: true}))
    .pipe(notify({ title: 'Sass', message: 'sass task complete'  }));
});

// Sass-min - Release build minifies CSS after compiling Sass
gulp.task('sass-min', function() {
  return gulp.src('./scss/style.scss')
    .pipe(plumber())
    .pipe(sass(options.sassmin).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(rename( { suffix: '.min' } ) )
    .pipe(gulp.dest('.'))
    .pipe(browserSync.reload({stream: true}))
    .pipe(notify({ title: 'Sass', message: 'sass-min task complete' }));
});

// Optimize Images
gulp.task('images', function() {
  return gulp.src('./assets/img/**/*')
    .pipe(imageoptim.optimize({jpegmini: true}))
    .pipe(gulp.dest('./assets/img'))
    .pipe( notify({ message: 'Images task complete' }));
});

// Generate & Inline Critical-path CSS
gulp.task('critical', function (cb) {
    critical.generate({
        base: './',
        src: 'http://wp.dev/',
        dest: 'css/home.min.css',
        ignore: ['@font-face'],
        dimensions: [{
          width: 320,
          height: 480
        },{
          width: 768,
          height: 1024
        },{
          width: 1280,
          height: 960
        }],
        minify: true
    });
});


// Starts browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    browserSync.init(browserSyncWatchFiles, browserSyncOptions);
});


// Start the livereload server and watch files for change
gulp.task( 'watch', function() {

  // don't listen to whole js folder, it'll create an infinite loop
  gulp.watch( [ './assets/js/**/*.js', '!./assets/js/*.js' ], [ 'scripts' ] )

  gulp.watch( './scss/**/*.scss', ['sass', 'sass-min'] );

  gulp.watch( './assets/img/**/*', ['images']);

  //gulp.watch( './**/*.php' ).on('change', browserSync.reload);

} );


gulp.task( 'default', ['watch', 'browser-sync'], function() {
 // Does nothing in this task, just triggers the dependent 'watch'
} );
