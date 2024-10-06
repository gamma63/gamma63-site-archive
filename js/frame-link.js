// Melo-tech Frame Link Management System 3.2.1 (Downgraded for IE 5 compatibility)

// Get the main frame element
var mainFrame = null;
var firstLoad = true;
var updateTitle = true;
var pageParam = "z";
var titlePrefix = "";
var hitCounterFunction = null;

// Event to handle first page load - Also sets up the mainFrame
window.onload = function() {
    mainFrame = document.getElementById("mainframe");
    console.log("mainFrame:", mainFrame);
    if (mainFrame.attachEvent) {
        mainFrame.attachEvent("onload", updateHistory);
    } else {
        mainFrame.onload = updateHistory;
    }
    setMainFrame();
}

// Event to handle back button presses
window.attachEvent("onhashchange", function() {
    setMainFrame();
});

// Checks to see if a page parameter exists and sets the mainframe src to that page.
function setMainFrame() {
    console.log("setMainFrame called");
    var url = window.location.href;
    var params = url.split("?");
    if (params.length > 1) {
        var page = params[1].split("=")[1];
        if (page != null) {
            page = page.replace("javascript:", ""); // Security to stop url scripts
            mainFrame.src = page;
            console.log("mainFrame.src:", mainFrame.src);
        }
    }
}

// Updates the browser history with the current page, causing the URL bar to update.
function updateHistory() {
    console.log("updateHistory called");
    var title = titlePrefix + mainFrame.contentDocument.title;

    // Stops the page getting into an infinate loop reloading itself.
    if (firstLoad) {
        firstLoad = false;
        if (updateTitle) {
            document.title = title;
        }
        if (hitCounterFunction != null) {
            hitCounterFunction();
        }
        return;
    }

    // IE 5 does not support history.replaceState, so we use a workaround
    var newUrl = window.location.href.split("?")[0] + "?" + pageParam + "=" + mainFrame.contentWindow.location.pathname;
    window.location.href = newUrl;

    if (updateTitle) {
        document.title = title;
    }

    // Save a hit - Optionally run this if a hit counter has been defined.
    if (hitCounterFunction != null) {
        hitCounterFunction();
    }
}
