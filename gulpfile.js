var gulp = require('gulp'),
	jshint = require('gulp-jshint'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	less = require('gulp-less'),
	minify = require('gulp-minify-css'),
	watch = require('gulp-watch'),
	rename = require('gulp-rename'),
	fileconcat = require('gulp-file-concat');

// admin base
gulp.task('adminbaseless', function(){
	var base = 'admin/src/style/base/base.less',
		baseDest = 'admin/dest/style/base';
	// base
	gulp.src(base)
	.pipe(less())
	.pipe(gulp.dest(baseDest))
	/*.pipe(rename('base.css'))
	.pipe(gulp.dest(baseDest))*/
	.pipe(minify())
	.pipe(gulp.dest(baseDest));
});

gulp.task('adminbasejs', function(){
	var base = 'admin/src/script/base/base.js',
		baseDest = 'admin/dest/script/base/';
	// base
	gulp.src(base)
	.pipe(fileconcat({
		relativeUrls: './admin/src/script/base/'
	}))
	.pipe(gulp.dest(baseDest))
	.pipe(uglify())
	.pipe(gulp.dest(baseDest));
});

// admin page
gulp.task('adminless', function(){
	var page =  'admin/src/style/page/*.less',
		pageDest = 'admin/dest/style/page';
	// page
	gulp.src(page)
	.pipe(less())
	.pipe(gulp.dest(pageDest))
	.pipe(minify())
	.pipe(gulp.dest(pageDest));

});

gulp.task('adminjs', function(){
	var page = ['admin/src/script/page/*.js', '!admin/src/script/page/_*.js'],
		pageDest = 'admin/dest/script/page' ;
	// page
	gulp.src(page)/*
	.pipe(fileconcat({
		relativeUrls: './src/script/'
	}))
	.pipe(gulp.dest(pageDest))*/
	.pipe(uglify())
	.pipe(gulp.dest(pageDest));
});


// 基础css和js 无需一直监听改变
gulp.task('adminbase', ['adminbaseless', 'adminbasejs']);

/*gulp.task('admin', ['adminless', 'adminjs'], function () {
    gulp.watch(['admin/src/style/page/*.less', 'admin/src/script/page/*.js'], ['adminless', 'adminjs']);
});*/
gulp.task('adminwatch', ['adminless', 'adminbaseless', 'adminbasejs'], function () {
    gulp.watch(['admin/src/style/page/*.less', 'admin/src/style/base/*.less', 'admin/src/script/base/*.js'], ['adminless', 'adminbaseless', 'adminbasejs']);
});
