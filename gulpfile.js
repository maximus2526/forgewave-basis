const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const rename = require('gulp-rename');
const path = require('path');

// Source and destination directories
const baseSrc = 'assets/scss';
const baseDest = 'assets';

// List of modules
const modules = ['admin', 'common', 'frontend'];

// Tasks for compiling Sass for each module
modules.forEach(module => {
  // Define source and destination paths
  const src = path.join(baseSrc, module, 'main.scss').replace(/\\/g, '/');
  const dest = path.join(baseDest, module, 'css');

  // Define a Gulp task for each module
  gulp.task(`sass-${module}`, () => {
    return gulp.src(src, { allowEmpty: true })  // Added allowEmpty: true
      .pipe(sass().on('error', sass.logError))
      .pipe(rename({ basename: module, extname: '-styles.css' }))
      .pipe(gulp.dest(dest));
  });
});

// Watch task to recompile Sass when files change
gulp.task('watch', () => {
  modules.forEach(module => {
    const src = path.join(baseSrc, module, '**/*.scss');
    gulp.watch(src, gulp.series(`sass-${module}`));
  });
});

// Default task to compile Sass for all modules
gulp.task('default', gulp.series(modules.map(module => `sass-${module}`)));
