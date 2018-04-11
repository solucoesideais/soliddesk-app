function resizeBroadcast() {
    var timesRun = 0;
    var interval = setInterval(function () {
        timesRun += 1;
        if (timesRun === 5) {
            clearInterval(interval);
        }
        if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > 0) {
            var evt = document.createEvent('UIEvents');
            evt.initUIEvent('resize', true, false, window, 0);
            window.dispatchEvent(evt);
        } else {
            window.dispatchEvent(new Event('resize'));
        }
    }, 62.5);
}

function toggleMenu() {
    $('.app').toggleClass('sidebar-hidden');
    resizeBroadcast();
}

function toggleMenuMobile() {
    $('.app').toggleClass('sidebar-mobile-show');
    resizeBroadcast();
}
