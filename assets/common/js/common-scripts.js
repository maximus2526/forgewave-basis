document.addEventListener('DOMContentLoaded', function () {

    // Color picker control.

    var colorPickerControls = document.querySelectorAll('.fwb-color-picker-control-wrapper');

    colorPickerControls.forEach(function (control) {
        var colorPicker = control.querySelector('.fwb-color-picker-control');
        var clearButton = control.querySelector('.fwb-clear-color-button');

        var defaultColor = clearButton.dataset.default;

        clearButton.addEventListener('click', function () {
            colorPicker.value = defaultColor;
        });
    });
});