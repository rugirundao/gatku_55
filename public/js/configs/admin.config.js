app.config(function($routeProvider) {

    $routeProvider
        .when('/discounts', {
            templateUrl : 'js/app/admin/discounts/AdminDiscounts.html',
            controller: 'AdminDiscountsController',
            controllerAs: '$ctrl'
        })
        .when('/home-settings', {
            templateUrl : 'js/app/admin/home-settings/AdminHomeSettings.html',
            controller: 'AdminHomeSettingsController',
            controllerAs: '$ctrl'
        })
        .when('/email-settings', {
            templateUrl : 'js/app/admin/email-settings/AdminEmailSettings.html',
            controller: 'AdminEmailSettingsController',
            controllerAs: '$ctrl'
        })
        .when('/orders', {
            templateUrl : 'js/app/admin/orders/AdminOrders.html',
            controller: 'AdminOrdersController',
            controllerAs: '$ctrl'
        })
        .when('/products', {
            templateUrl : 'js/app/admin/products/AdminProducts.html',
            controller: 'AdminProductsController',
            controllerAs: '$ctrl'
        })
        .when('/shelves', {
            templateUrl : 'js/app/admin/shelves/AdminShelves.html',
            controller: 'AdminShelvesController',
            controllerAs: '$ctrl'
        })
        .when('/images', {
            templateUrl : 'js/app/admin/you/AdminImages.html',
            controller: 'AdminImagesController',
            controllerAs: '$ctrl'
        })
        .when('/quantity-sale-report', {
            templateUrl : 'js/app/admin/quantity-sale-report/AdminQuantitySaleReport.html',
            controller: 'AdminQuantitySaleReportController',
            controllerAs: '$ctrl'
        })
        .when('/sales-tax', {
            templateUrl : 'js/app/admin/sales-tax/AdminSalesTax.html',
            controller: 'AdminSalesTaxController',
            controllerAs: '$ctrl'
        })
    ;
});
