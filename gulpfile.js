var gulp    = require('gulp');
var phpspec = require('gulp-phpspec');
var watch   = require('gulp-watch');

gulp.task('default', ['phpspec']);

gulp.task('watch', function () {
    gulp.watch(['iCal/**/*.php', 'spec/**/*.php'], function(){
        gulp.run('test');
    });
});

gulp.task('test', function() {
    gulp.src('phpspec.yml').pipe(phpspec('./vendor/bin/phpspec run'));
});