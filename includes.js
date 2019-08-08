var idHtmlHeader = 100; //ID de la página de header
var idHtmlFooter = 200; //ID de la página de footer

function addHeader(id){
    $(id).load(idHtmlHeader+".html");
}

function addFooter(id){
    $(id).load(idHtmlFooter+".html");
}
