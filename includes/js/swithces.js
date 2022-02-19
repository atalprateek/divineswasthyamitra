"use strict";
$(document).ready(function () {
    var elems = document.querySelectorAll('.js-switch');

    for (var i = 0; i < elems.length; i++) {
      var switchery = new Switchery(elems[i],{ color: '#188038', secondaryColor: '#f00', jackColor: '#fff', jackSecondaryColor: '#fff' });
    }
});