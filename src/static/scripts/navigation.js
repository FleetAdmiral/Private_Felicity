var $html = $('html');
var $toggle = $('#toggle');
var $about = $('#about');

(function() {
    $toggle.on('click', function(event) {
        $toggle.hasClass('i') ? showDetails() : hideDetails();
    });
})();


function showDetails() {
    $toggle.css('display', 'block');
    $about.removeClass('hide');
    $toggle.removeClass('i');
    $('.btn-box').css('display', 'none');
    $about.css('display', 'table');
    slideout.close();
    $('.content-center').css('display', 'none');
}

function hideDetails() {
    planeExit();
    flagExit();
    document.querySelector('#panelcontainer').style.backgroundImage = "url(" + baseUrl + "static/images/bg.jpg)";
    $about.addClass('hide');
    $toggle.css('display', 'none');
    setTimeout(function() {
        $about.css('display', 'none');
    }, 500);
    $toggle.addClass('i');
    setTimeout(function() {
        $('.btn-box').fadeIn().css('display', 'block');
    }, 200);
    history.pushState(localeBaseUrl, null, localeBaseUrl);
    $('.content-center').fadeIn(1400).css('display', 'block');
}

function toggleDetails(type) {
    $toggle.hasClass('i') ? showDetails() : hideDetails();
    showPage(type);
}

function openPage(type) {
    showPage(type);
    showDetails();
}

var urlHelper = {
    getPageUrl: function(pageName) {
        var pagePath = pageName.replace('-', '/');
        return localeBaseUrl + pagePath + '/';
    },

    getAltPageUrl: function(pageName, lang) {
        var pagePath = '';
        if (pageName) {
            pagePath = pageName.replace('-', '/') + '/';
        }
        return baseUrl + lang + '/' + pagePath;
    },

    getPageName: function(pageUrl) {
        return pageUrl.split('?')[0].split('#')[0].replace(localeBaseUrl, '').replace(/\/+$/, '');
    }
};

function showPage(type) {
    var newUrl = urlHelper.getPageUrl(type);
    loadContent(newUrl, $(".content-holder"));
    history.pushState(newUrl, null, newUrl);
    planeEnter();
    globeSpin();
    flagEnter(type);
    slideout.close();
}

function planeEnter() {
  $('#plane').addClass('planeEnter');
  setTimeout(function(){
    console.log("Done");
    $('#plane').removeClass('planeEnter');
    $('#plane').addClass('planeWait');
  }, 2001);
}

function planeExit() {
  $('#plane').removeClass('planeWait');
  $('#plane').addClass('planeExit');
  setTimeout(function(){
    $('#plane').removeClass('planeExit');
  }, 1001);
}

function flagEnter(type) {
  $('#flag').addClass('flagEnter ' + type);
  setTimeout(function(){
    console.log("Done");
    $('#flag').removeClass('flagEnter');
    $('#flag').addClass('flagWait');
  }, 2001);
}

function flagExit() {
  $('#flag').removeClass('flagWait');
  $('#flag').addClass('flagExit');
  setTimeout(function(){
    $('#flag').removeClass('flagExit');
  }, 1001);
}

function globeSpin() {
    $('.globe').addClass('globeSpinUp');
    setTimeout(function(){
        $('.globe').removeClass('globeSpinUp');
    }, 2500);
}
