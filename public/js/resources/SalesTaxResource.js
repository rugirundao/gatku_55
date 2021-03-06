
app.factory('SalesTaxResource', function($resource) {
    return $resource(
        '/sales-tax/:state',
        {state: '@state'},
        {
            update: {method: 'PUT'}
        }
    );
});