module.exports = {
    less: {
        files: ['css/**/*'],
        tasks: ['compile-css']
    },
    js: {
    	files: ['js/**/*'],
    	tasks: ['compile-js']
    },
    vendor: {
        files: ['bower_components/**/*'],
        tasks: ['compile-vendor']
    }
};
