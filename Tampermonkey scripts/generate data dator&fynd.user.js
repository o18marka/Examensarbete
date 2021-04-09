// ==UserScript==
// @name         generate data dator&fynd
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @match        http://multipage.test:8081/addproduct
// @grant        none
// @require     https://rawcdn.githack.com/HGustavs/ContextFreeLib/bc0c77ed578c91c44231faed788df0691f7c6e9b/js/contextfreegrammar.js
// ==/UserScript==



(function() {
    var prefix = ['atx','btx','ctx','dtx','etx','ftx','gtx','htx','itx','jtx','ktx','ltx','evo'];
    var suffix = ['super','ultra','OC','speed','wind','mega','fast','extra','standard','value',' ','new','x']

    document.getElementById('type').value='Grafikkort'; //Ändra här för att välja typ av produkt som ska genereras

    if (window.localStorage.getItem("loops") === null){ //If the localstorage value doesn't exist, create it and make it 0
        window.localStorage.setItem("loops", 0);
    }

    var n = window.localStorage.getItem("loops");
    window.localStorage.setItem("loops", ++n);


    function generateContent(){ //Generate sentences in description
        document.getElementById('description').value='';
        for(var i=0;i<20;i++){
            var content=generate_sentence(0.5,0.5,0.5,0.5,null,null,null,null,null,null,null);
            document.getElementById('description').value+=content;
        }
    }

    function generateTitle(){ // Generate title
            var randomnumber = Math.floor(Math.random()*290)*10;
            var title=prefix[Math.floor(Math.random()*prefix.length)]+' '+randomnumber+' '+suffix[Math.floor(Math.random()*prefix.length)]
            document.getElementById('title').value=title;
    }

     function generatePrice(){ // Generate price
            var randomnumber = Math.floor(Math.random()*1000)*10;
            document.getElementById('price').value=randomnumber;
    }

    function generateClockspeed(){ // Generate clockspeed
        var randomnumber = Math.floor(Math.random()*200)*10;
        document.getElementById('clockspeedinput').value=randomnumber;
    }

    function generateWatt(){ // Generate watt
        var randomnumber = Math.floor(Math.random()*(200-30)+30)*10;
        document.getElementById('wattinput').value=randomnumber;
    }


    generateContent();
    generateTitle();
    generatePrice();
    if(document.getElementById('type').value == 'Grafikkort' || document.getElementById('type').value == 'Processor' || document.getElementById('type').value == 'Minne'){
        generateClockspeed();
    }
    if(document.getElementById('type').value == 'Nataggregat' || document.getElementById('type').value == 'Grafikkort'){
        generateWatt();
    }

    var clickEvent = new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    });

    window.addEventListener('load', function() {
        if(window.localStorage.getItem("loops") <= 100){ //Loop x amount of time creating x amount of products
            document.getElementById("submit").dispatchEvent (clickEvent); //Clicks the submit button
        }
        else{ //Upon desired loops reached, reset localstorage
            window.localStorage.setItem("loops", 0);
        }
    }, false);

})();