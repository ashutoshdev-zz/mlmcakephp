var page = require('webpage').create(),
        system = require('system'),
        address;
address = "https://www.thelotter.com/lottery-results/usa-megamillions/?DrawNumber=" + system.args[1];
page.open(address, function(status) {
    if (status !== 'success') {
        console.log('Unable to access network');
    } else {
        var ua = page.evaluate(function() {
            return $('#ctl00_ContentPlaceHolderMain_ctl00_balls_content').html();
        });
        console.log(ua);
    }
    phantom.exit();
});