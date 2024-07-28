{
  "name": "project",
  "version": "1.0.0",
  "scripts": {
    "minify-js": "uglifyjs js/*.js -o js/script.min.js",
    "minify-css": "cssnano css/*.css css/styles.min.css"
  },
  "devDependencies": {
    "uglify-js": "^3.14.4",
    "cssnano": "^4.1.11"
  }
}
