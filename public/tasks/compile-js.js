module.exports = function(grunt) {

    grunt.registerTask('compile-js', ['clean:js', 'uglify:app']);

};
