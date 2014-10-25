var jsAssets = [
    
    'js/**/*'
    
];

var jsVendorAssets = [
    
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/bootstrap/dist/js/bootstrap.min.js'
    
];

module.exports = {
    options: {
        sourceMapIncludeSources: false,
        beautify: false,
        mangle: true
    },
    app: {
        options: {
            sourceMap: 'assets/app.min.js.map',
            sourceMappingURL: 'app.min.js.map'
        },
        files: {
            'assets/app.min.js': jsAssets
        }
    },
    vendor: {
        options: {
            sourceMap: 'assets/vendor.min.js.map',
            sourceMappingURL: 'vendor.min.js.map'
        },
        files: {
            'assets/vendor.min.js': jsVendorAssets
        }
    }
};
