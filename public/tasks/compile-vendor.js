module.exports = function(grunt) {

    grunt.registerTask('compile-vendor', ['clean:vendor', 'less:vendor', 'uglify:vendor']);

};
