var cssAssets = [

    'css/app.less'

];

var cssVendorAssets = [

    'bower_components/bootstrap/dist/css/bootstrap.css'

];

module.exports = {
    options: {
        compress: true,
        cleancss: false,
        report: 'min',
        sourceMap: true,
        sourceMapRootpath: '../'
    },
    app: {
        options: {
            sourceMapFilename: 'assets/app.min.css.map',
            sourceMapURL: 'app.min.css.map'
        },
        files: {
            'assets/app.min.css': cssAssets
        }
    },
    vendor: {
        options: {
            sourceMapFilename: 'assets/vendor.min.css.map',
            sourceMapURL: 'vendor.min.css.map'
        },
        files: {
            'assets/vendor.min.css': cssVendorAssets
        }
    }
};
