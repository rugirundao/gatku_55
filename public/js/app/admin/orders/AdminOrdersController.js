(function () {

    app.controller('AdminOrdersController', AdminOrdersController);

    function AdminOrdersController($scope, Order, ResendOrderEmails, AlertService, $uibModal, $http, $exceptionHandler) {

        var $ctrl = this;

        $ctrl.placeholderToday = dateToYMD(new Date());

        $ctrl.orders = [];
        $ctrl.pageno = 1;
        $ctrl.itemsPerPage = 15;

        $ctrl.orderResent = [];

        $ctrl.getData = function (pageno, start_date, end_date) {
            $ctrl.orders = [];

            $ctrl.pageno = pageno;

            var Url = "/orderall/" + $ctrl.itemsPerPage + "/" + pageno;
            try {
                if ($scope.order_start_date) {
                    Url = Url + "/" + $scope.order_start_date;
                }
                if($scope.order_end_date){
                    Url = Url + "/" + $scope.order_end_date;
                }
            } catch (e) {
                $exceptionHandler(JSON.stringify(e));
            }

            $http.get(Url).then(function (response) {
                $ctrl.orders = response.data.orders;
                $ctrl.total_count = response.data.total_count;
            }, function (error) {
                $exceptionHandler(JSON.stringify(error));
                console.log('Something went wrong.');
            });
        };

        $ctrl.getData($ctrl.pageno);

        $ctrl.searchOrder = function () {
            if ($scope.order_start_date) {
                $ctrl.getData(1, $scope.order_start_date, $scope.order_end_date);
            } else {
                alert('Select start date.');
            }
        };

        $ctrl.resetDateFilter = function () {
            $scope.order_start_date = ''
            $scope.order_end_date = '';
            $ctrl.getData(1, $scope.order_start_date, $scope.order_end_date);
        };

        $ctrl.resendOrderEmails = function(order) {

            var modalInstance = $uibModal.open({
                templateUrl: 'js/app/admin/orders/modals/AdminOrderEmailPickerModal.html',
                controller: 'AdminOrderEmailPickerModalController',
                controllerAs: '$ctrl',
                resolve: {
                    order: function() {
                        return order;
                    }
                }
            });

            modalInstance.result.then(function(pickedEmails) {

                var emails = {
                    emailListForEmailsOrderAdminArray: [],
                    emailListForEmailsOrderArray: []
                };

                //adminEmailAdresses
                angular.forEach(pickedEmails.adminEmailAdresses, function (record) {
                    if (record.checked) {
                        emails.emailListForEmailsOrderAdminArray.push(record.email);
                    }
                });

                //customerEmailAdresses
                angular.forEach(pickedEmails.customerEmailAdresses, function(record) {
                    if (record.checked) {
                        emails.emailListForEmailsOrderArray.push(record.email);
                    }
                });

                //Request to send emails
                ResendOrderEmails.resend(order.id, emails).then(function() {
                    //Screen notification
                    var nanobar = new Nanobar({bg: '#fff'});
                    nanobar.go(100);
                    AlertService.broadcast('Email(s) sent', 'success');
                });

            });
        };

        function dateToYMD(date) {
            var d = date.getDate();
            var m = date.getMonth() + 1; //Month from 0 to 11
            var y = date.getFullYear();
            return '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
        }
    };
}());

