var tstates = 0;
var running;
var event_next_event;
var breakpointHit = false;

function loadRomData(name) {
    "use strict";
    var path = "sms/" + name;
    console.log("Loading ROM from " + path);
    var request = new XMLHttpRequest();
    request.open("GET", path, false);
    request.overrideMimeType('text/plain; charset=x-user-defined');
    request.send(null);
    if (request.status != 200) return [];
    return request.response;
}

function go(mi_sms) {

    z80_init();
    miracle_init();
    miracle_reset();
    loadRom(mi_sms, loadRomData(mi_sms));
    start();
}

/*
$(function () {
    go();
});
*/