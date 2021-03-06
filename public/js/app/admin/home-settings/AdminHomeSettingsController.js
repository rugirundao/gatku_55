(function () {
    app.controller('AdminHomeSettingsController', AdminHomeSettingsController);

    function AdminHomeSettingsController($scope, Image, HomeSetting, AlertService, $exceptionHandler) {

        var $ctrl = this;
        
        $ctrl.homeSetting = {};
        $ctrl.editState = false;
        $ctrl.editingNew = true;

        $ctrl.submitButton = 'Submit';

        // home settings
        function getHomeSettings() {
            HomeSetting.all().then(function (response) {
                $ctrl.homeSetting = response.data ? response.data : {};
                Squares.init();
            }, function (error) {
                $exceptionHandler(JSON.stringify(error));
                console.log("There was an error getting the home settings");
            });
        }

        $ctrl.removeImage = function(variable) {
            var r = confirm('Do you want to remove image?');

            if (r) {
                 $ctrl.homeSetting[variable] = '';
            }
        };

        $ctrl.uploadHomeImage = function ($files, model) {
            var file = $files[0];

            if (!file) return false;

            var data = {
                url: '/home-image/upload',
                file: file
            };

            $ctrl.editState = true;

            Image.upload(data).then(function (response) {
                console.log(model);
                $ctrl.homeSetting[model] = response.data;
            }, function(error) {
                $exceptionHandler(JSON.stringify(error));
                AlertService.broadcast('Sorry, there was an error, please try again', 'error');
            });

        };

        $ctrl.saveHomeSetting = function () {
            var nanobar = new Nanobar({bg: '#fff'});
            nanobar.go(40);

            HomeSetting.save($ctrl.homeSetting).then(function () {
                getHomeSettings();
                AlertService.broadcast('Photo was successfully updated.', 'success');
                nanobar.go(100);
            }, function(error) {
                $exceptionHandler(JSON.stringify(error));
                console.log('Something went wrong.');
            });
        };

        getHomeSettings();
    }
}());
