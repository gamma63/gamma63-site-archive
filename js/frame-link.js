var mainFrame;
var firstLoad = true;
var updateTitle = true;
var pageParam = "z";
var titlePrefix = "";
var hitCounterFunction = undefined;

// Event to handle first page load - Also sets up the mainFrame
if (window.addEventListener) {
    window.addEventListener("DOMContentLoaded", function (e) {
        mainFrame = document.getElementById("mainframe");
        if (mainFrame.addEventListener) {
            mainFrame.addEventListener("load", updateHistory, false);
        } else {
            mainFrame.attachEvent("onload", updateHistory);
        }
        setMainFrame();
    });
} else {
    document.attachEvent("onreadystatechange", function () {
        if (document.readyState === "complete") {
            mainFrame = document.getElementById("mainframe");
            if (mainFrame.attachEvent) {
                mainFrame.attachEvent("onload", updateHistory);
            }
            setMainFrame();
        }
    });
}

// Event to handle back button presses
if (window.addEventListener) {
    window.addEventListener("popstate", function (e) {
        if (e.state !== null) {
            setMainFrame();
        }
    });
} else {
    window.attachEvent("onpopstate", function (e) {
        if (e.state !== null) {
            setMainFrame();
        }
    });
}

// Checks to see if a page parameter exists and sets the mainframe src to that page.
function setMainFrame() {
    var params = getURLParams();
    var page = params[pageParam];
    if (page != null) {
        page = page.replace("javascript:", ""); // Security to stop url scripts
        mainFrame.src = page;
    }
}

// Updates the browser history with the current page, causing the URL bar to update.
function updateHistory() {
    var title = titlePrefix + mainFrame.contentDocument.title;

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

    if (window.history && window.history.replaceState) {
        window.history.replaceState({}, title, "?" + pageParam + "=" + mainFrame.contentWindow.location.pathname);
    } else {
        // IE 5 не поддерживает history.replaceState, поэтому мы должны использовать другую реализацию
        // Например, мы можем использовать location.hash для хранения истории
        location.hash = "?" + pageParam + "=" + mainFrame.contentWindow.location.pathname;
    }

    if (updateTitle) {
        document.title = title;
    }

    // Save a hit - Optionally run this if a hit counter has been defined.
    if (hitCounterFunction != undefined) {
        hitCounterFunction();
    }
}

// Функция для получения параметров URL
function getURLParams() {
    var params = {};
    var url = window.location.href;
    var paramStart = url.indexOf("?");
    if (paramStart != -1) {
        var paramStr = url.substring(paramStart + 1);
        var paramArr = paramStr.split("&");
        for (var i = 0; i < paramArr.length; i++) {
            var param = paramArr[i].split("=");
            params[param[0]] = param[1];
        }
    }
    return params;
}
