try {
    window.$ = window.jQuery = require('jquery');

    require('selectize');

} catch (e) {}

// Admin scripts
require('./admin/index');