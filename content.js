(function (chrome) {
    var js = document.createElement('script');
    js.type = 'text/javascript';
    js.src = chrome.extension.getURL('inject.js');
    document.getElementsByTagName('head')[0].appendChild(js);
}(chrome));

(function(window, $, undefined){  


    $('#save_button').on('click', function(event) { 


        var campaignInfo = {
            'name' : 'test_name',
            'surname' : 'test_surname'

        };
        var datastring = JSON.stringify(campaignInfo);

        chrome.runtime.sendMessage({
            method: 'POST',
            action: 'xhttp',
            url: 'ajax.php',

            data: datastring
        }); 

        console.log(campaignInfo);


    }); 
})(window, jQuery);
