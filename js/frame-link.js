// Melo-tech Frame Link Management System 3.2.1
// This script updates the URL on each page, allowing you to share and bookmark frameset and iFrame links!
// Feel free to steal this code!
// Get help here - https://forum.melonking.net/index.php?topic=115

// oO How to use this code Oo
// 1. Add '<script src="https://melonking.net/scripts/frame-link.js"></script>' to your <head>.
// 2. Add 'id="mainframe"' to your main iFrame or Frame window.
// Optional: Create a second <script></script> section AFTER you link the frame-link.js
// Optional: add 'updateTitle = false;' if you want to disable title updating. (Default is true)
// Optional: add 'titlePrefix = "My Site ";' if you want to add a prefix to your titles. (Default is none)
// Optional: add 'pageParam = "z";' if you want to change the url path of your pages. (Default is z)
// Optional: if you use a hitCounter like GoatCounter add 'hitCounterFunction = function () { XXX MY HIT COUNTER CODE }', this function will automaticly be called each time someone click a page, so you can log per page hits within your frame.
// See https://melonking.net/melon.html for a working example! GOOD LUCK!

var mainFrame;
var firstLoad = true;
var updateTitle = true;
var pageParam = "z";
var titlePrefix = "";
var hitCounterFunction = undefined;

//Event to handle first page load - Also sets up the mainFrame
window.addEventListener("DOMContentLoaded", (e) => {
    mainFrame = document.getElementById("mainframe");
    mainFrame.addEventListener("load", updateHistory, false);
    setMainFrame();
});

//Event to handle back button presses
window.addEventListener("popstate", function (e) {
    if (e.state !== null) {
        setMainFrame();
    }
});

//Checks to see if a page parameter exists and sets the mainframe src to that page.
function setMainFrame() {
    let params = new URLSearchParams(window.location.search);
    let page = params.get(pageParam);
    if (page != null) {
        page = page.replace("javascript:", ""); // Security to stop url scripts
        mainFrame.src = page;
    }
}

//Updates the browser history with the current page, causing the URL bar to update.
async function updateHistory() {
    let title = titlePrefix + mainFrame.contentDocument.title;

    // Stops the page getting into an infinate loop reloading itself.
    if (firstLoad) {
        firstLoad = false;
        if (updateTitle) {
            document.title = title;
        }
        if (hitCounterFunction != undefined) {
            hitCounterFunction();
        }
        return;
    }

    history.replaceState({}, title, "?" + pageParam + "=" + mainFrame.contentWindow.location.pathname);

    if (updateTitle) {
        document.title = title;
    }

    //Save a hit - Optionally run this if a hit counter has been defined.
    if (hitCounterFunction != undefined) {
        hitCounterFunction();
    }
}
