"use strict";

var path = {
  build: {
    js: "../js/",
    css: "../css/"
  },
  src: {
    js: "js/main.js",
    style: "css/main.scss"
  },
  watch: {
    js: "js/**/*.js",
    css: "css/**/*.scss"
  }
};

const gulp = require("gulp"), // подключаем Gulp
  plumber = require("gulp-plumber"), // модуль для отслеживания ошибок
  rigger = require("gulp-rigger"), // модуль для импорта содержимого одного файла в другой
  sass = require("gulp-sass"), // модуль для компиляции SASS (SCSS) в CSS
  cleanCSS = require("gulp-clean-css"), // плагин для минимизации CSS
  autoprefixer = require("gulp-autoprefixer"), // модуль для автоматической установки автопрефиксов
  sourcemaps = require("gulp-sourcemaps"),
  uglify = require("gulp-uglify-es").default, // модуль для минимизации JavaScript
  babel = require("gulp-babel"),
  rename = require("gulp-rename");

// сбор стилей
gulp.task("css", function () {
  return gulp
    .src(path.src.style) // получим main.scss
    .pipe(plumber()) // для отслеживания ошибок
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on("error", sass.logError)) // scss -> css
    .pipe(autoprefixer()) // добавим префиксы
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(path.build.css));
});
gulp.task("css:build", function () {
  return gulp
    .src(path.src.style) // получим main.scss
    .pipe(plumber()) // для отслеживания ошибок
    .pipe(sass()) // scss -> css
    .pipe(autoprefixer()) // добавим префиксы
    .pipe(cleanCSS()) // минимизируем CSS
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest(path.build.css));
});

// сбор js
gulp.task("js", function () {
  return gulp
    .src(path.src.js) // получим файл js
    .pipe(rigger()) // импортируем все указанные файлы в js
    .pipe(plumber()) // для отслеживания ошибок
    .pipe(
      babel({
        presets: ["@babel/env"]
      })
    )
    .pipe(gulp.dest(path.build.js));
});
gulp.task("js:build", function () {
  return gulp
    .src(path.src.js) // получим файл js
    .pipe(plumber()) // для отслеживания ошибок
    .pipe(rigger()) // импортируем все указанные файлы в js
    .pipe(
      babel({
        presets: ["@babel/env"]
      })
    )
    .pipe(rename({ suffix: ".min" }))
    .pipe(uglify()) // минимизируем js
    .pipe(gulp.dest(path.build.js));
});

// сборка
gulp.task("build", gulp.parallel("css:build", "js:build"));
// разработка
gulp.task("dev", gulp.series("css", "js"));

// запуск задач при изменении файлов
gulp.task("watch", function () {
  gulp.watch(path.watch.css, gulp.parallel("css"));
  gulp.watch(path.watch.js, gulp.parallel("js"));
});

// задача по умолчанию
gulp.task("default", gulp.series("dev", "watch"));
