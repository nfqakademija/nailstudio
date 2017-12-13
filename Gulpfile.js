'use strict';

var gulp    = require('gulp');
var sass    = require('gulp-sass');
var concat  = require('gulp-concat');
var uglify  = require('gulp-uglify');

var dir = {
    assets: './src/AppBundle/Resources/',
    dist: './web/',
    npm: './node_modules/'
};

gulp.task('sass', function() {
    gulp.src([
        dir.npm + 'bootstrap-sass/assets/stylesheets/**',
        dir.assets + 'style/main.scss',
        dir.assets + 'style/services_choice.scss',

    ])
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(concat('style.css'))
        .pipe(gulp.dest(dir.dist + 'css'));
});

gulp.task('scripts', function() {
    gulp.src([
            //Third party assets
            dir.npm + 'jquery/dist/jquery.min.js',
            dir.npm + 'bootstrap-sass/assets/javascripts/bootstrap.min.js',

            // Main JS file
            dir.assets + 'scripts/googlemap.js',
            dir.assets + 'scripts/main.js',
            dir.assets + 'services_choice.js',
        // /home/benas/PhpstormProjects/nailstudio/src/AppBundle/Resources/scripts/googlemap.js

            //FullCalendar JS file
            dir.assets + 'public/js/my_fullcalendar.js',

        ])
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dir.dist + 'js'));
});

gulp.task('images', function() {
    gulp.src([
            dir.assets + 'images/**'
        ])
        .pipe(gulp.dest(dir.dist + 'images'));
});

gulp.task('fonts', function() {
    gulp.src([
        dir.npm + 'bootstrap-sass/assets/fonts/**'
        ])
        .pipe(gulp.dest(dir.dist + 'fonts'));
});

gulp.task('default', ['sass', 'scripts', 'fonts', 'images']);

// gulp.task('watch', function () {
//     var onChange = function (event) {
//         console.log('File '+event.path+' has been '+event.type);
//     };
//     gulp.watch('./src/*/Resources/public/sass/**/*.scss', ['sass'])
//         .on('change', onChange);
//     gulp.watch('./src/*/Resources/public/js/**/*.js', ['js'])
//         .on('change', onChange);
// });

// watcher
gulp.task('watch', function () {
    gulp.watch(dir.assets + 'style/*.scss', ['sass']);
    gulp.watch(dir.assets + 'scripts/*', ['scripts']);
    gulp.watch(dir.assets + 'images/*', ['images']);
});


gulp.task('default', ['sass', 'scripts', 'fonts', 'images']);
