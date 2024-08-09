document.addEventListener('DOMContentLoaded', function () {
    var getInvolvedToggle = document.getElementById('getInvolvedToggle');
    var getInvolvedMenu = document.getElementById('getInvolvedMenu');

    getInvolvedToggle.addEventListener('click', function () {
        getInvolvedMenu.classList.toggle('hidden');
    });

    // Close the dropdown if clicked outside
    document.addEventListener('click', function (event) {
        var isClickInside = getInvolvedToggle.contains(event.target) || getInvolvedMenu.contains(event.target);

        if (!isClickInside) {
            getInvolvedMenu.classList.add('hidden');
        }
    });
});