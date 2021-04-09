// ==UserScript==
// @name         Redirect
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @match        http://multipage.test:8081/insert.php
// @grant        none
// ==/UserScript==

(function() {
    var clickEvent = new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    });
    document.getElementById("addnew").dispatchEvent (clickEvent); //Clicks the submit button
})();