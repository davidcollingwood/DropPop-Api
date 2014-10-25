module.exports = function(grunt) {

    var path = require('path');

    // Loads task options from `tasks/options/`
    // and loads tasks defined in `package.json`
    var config = require('load-grunt-config')(grunt, {
        configPath: path.join(__dirname, 'tasks/options'),
        init: false
    });

    // Loads tasks in `tasks/` folder
    grunt.loadTasks('tasks');

    // fire the missles
    grunt.initConfig(config);
};
