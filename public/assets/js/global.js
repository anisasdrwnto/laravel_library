console.log("global js");
var base_url = window.location.origin;
console.log(base_url);

var ajax = {
    ajaxTest:function(json){
        console.log("Test ajax");
        console.log(json);
    },
    ajaxGet:function (url, data, next){
        console.log(base_url+url);
        $.ajax({
            // method : "GET",
            type: "GET",
            url: base_url + url,
            data: data,
            dataType: "json",
            success: function (result) {
                next(result);
            },
            error: function(err){
                var msg = "Error, Please contact the Administrator";
                var data = {
                    err : err,
                    msgErr : msg
                }
                next(data);
            }
        });
    },
    ajaxPost:function (url, data, next){
        console.log(base_url+url);
        $.ajax({
            // method : "GET",
            type: "POST",
            url: base_url + url,
            data: data,
            dataType: "json",
            success: function (result) {
                next(result);
            },
            error: function(err){
                var msg = "Error, Please contact the Administrator";
                var data = {
                    err : err,
                    msgErr : msg
                }
                next(data);
            }
        });
    },
    ajaxPostWithFile:function (url, data, next){
        $.ajax({
            method: "POST",
            url: base_url + url,
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (result) {
                next(result);
                return view('home');
            },
            error: function(err){
                var msg = "Error, Please contact the Administrator";
                var data = {
                    err : err,
                    msgErr : msg
                }
                next(data);
            }
        });
    }
}

$(document).ready(function(){
    $("#btn-logout").click(function(){
        // alert('test');
        location.href = base_url+"/logout";
    });

});