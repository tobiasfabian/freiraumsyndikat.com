const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const imagemin = require('gulp-imagemin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const webpack = require('webpack-stream');
const named = require('vinyl-named');
const browserSync = require('browser-sync').create();
const notifier = require('node-notifier'); // show Growl



// Static Server + watching scss/html files
gulp.task('watch', function() {
  browserSync.init({
    host: 'localhost',
    port: 3000,
    proxy: 'http://freiraumsyndikat.local', // alternative to http://[::1]:8888
    ghostMode: false, // enable to sync scroll and click events
    open: false, // enable to automatically open browser
    serveStatic: [{
      route: '/assets',
      dir: 'html/assets',
    }],
  });
  gulp.watch('develop/js/**/*.js', ['js-dev']);
  gulp.watch('develop/css/**/*.scss', ['sass-dev']);
  gulp.watch(['html/**/*.yml', 'html/**/*.php'])
    .on('change', browserSync.reload) // reload browser on changes in html directory
    .on('error', function handleError(error) {
      console.log(error);
      notifier.notify({
        title: 'Error',
        message: JSON.stringify(error)
      });
      this.emit('end'); // Recover from errors
    })
});



// Compile sass into CSS & auto-inject into browsers
gulp.task('sass-dev', function() {
  return gulp.src('develop/css/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', function handleError(error) {
      console.log(error);
      notifier.notify({
        title: 'SASS Error',
        message: error.formatted
      });
      this.emit('end'); // Recover from errors
    }))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('html/assets/css'))
    .pipe(browserSync.stream());
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
  return gulp.src('develop/css/*.scss')
    .pipe(sass( { outputStyle: 'compressed' } ))
    .pipe(autoprefixer())
    .pipe(gulp.dest('html/assets/css'))
});



// Compile with Webpack with source map
// use webpack 4.0 via require
gulp.task('js-dev', function() {
  return gulp.src('develop/js/*.js')
    .pipe(named())
    .pipe(webpack({
      mode: 'development',
      devtool: 'source-map',
    }, require('webpack')).on('error', function handleError(error) {
      console.log(error);
      notifier.notify({
        title: 'JS Error',
        message: JSON.stringify(error.message)
      });
      this.emit('end'); // Recover from errors
    }))
    .pipe(gulp.dest('html/assets/js'))
    .pipe(browserSync.stream());
});

// Compile with Webpack, then do babel, then make everything ugly
// !! webpack-stream does not support Webpack 4.0 at the moment.
// use webpack 4.0 via require
gulp.task('js', function() {
  return gulp.src('develop/js/script.js')
    .pipe(webpack({
      mode: 'production',
      module: {
        rules: [
          {
            test: /\.(js|jsx)$/,
            exclude: /node_modules/,
            use: ['babel-loader']
          }
        ]
      },
    }, require('webpack')))
    .pipe(gulp.dest('html/assets/js'))
});



// Optimize all images in develop/images and save them in html/assets/images
gulp.task('optimize-images', function() {
  return gulp.src(['develop/images/**/*'])
    .pipe(imagemin([
      imagemin.gifsicle(),
      imageminMozjpeg(),
      imagemin.optipng(),
      imagemin.svgo({
        plugins: [
          { removeViewBox: false },
        ]
      }),
    ], {
      verbose: true,
    }).on('error', function handleError(error) {
      console.log(error);
      notifier.notify({
        title: 'Optimize Images Error',
        message: JSON.stringify(error)
      });
      this.emit('end'); // Recover from errors
    }))
    .pipe(gulp.dest('html/assets/images'))
});



// Just copy images from develop/images to html/assets/images
gulp.task('copy-images', function() {
  return gulp.src(['develop/images/**/*'])
    .pipe(gulp.dest('html/assets/images'))
});



gulp.task('default', ['sass-dev', 'js-dev', 'watch']);
gulp.task('build', ['sass', 'js', 'optimize-images'], function() {
  notifier.notify({
    title: 'Build complete!',
    message: 'Alles fertig gebaut.'
  });
});
