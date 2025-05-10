let htmfail = "<p>No result found.</p>";
document.getElementById("trigger").addEventListener("click", function() { //VERY IMPORTANT : always define anonymous function in second parameter else will just execute once the function and not add the event listener
    var $String = $("#searchbox").val(); //Fetches content of search box
    console.log($String); 
    if ($String !== "") {
        $.ajax({ //Asynchronous AJAX request that sends the keywords to search_back.php
            type: "POST",
            url: "search_back.php",
            datatype: "json",
            data: {"Keywords":$String},
            success: function(data) {
                console.log(data);
                const $parsed = JSON.parse(data);
                console.log($parsed);
                console.log("type =>", Object.prototype.toString.call($parsed[0]));
                console.log("Data =>" + $parsed[0][0] + ", " + $parsed[0][1]);
                console.log("Data =>" + Object.prototype.toString.call($parsed[0][0]) + ", " + Object.prototype.toString.call($parsed[0][0]));
                Object.keys($parsed[0][1]).forEach(function(key) {

                    console.log(key, $parsed[0][1][key]);
                  
                });
                if (Object.keys($parsed).length === 0) { //If empty, display accurate message
                    document.getElementsByClassName("search-box")[0].insertAdjacentHTML("afterend",htmfail); //If no results, prints no results on the page
                } else { //Else, put links with first names and last names on display
                    let htmsuccess = "<ul>";
                    for (let i = 0; i < $parsed[0].length; i++) {
                        console.log("Iterating : "+i);
                        htmsuccess += "<li><a href='fiche.php?Person="+ $parsed[0][i]["Last_Name"] + "'>" + $parsed[0][i]["Last_Name"] + " " + $parsed[0][i]["First_Name"] + "</a></li>";
                    }
                    htmsuccess += "</ul>";
                    document.getElementsByClassName("search-box")[0].insertAdjacentHTML("afterend",htmsuccess); //Edits it into the HTML document
                }
            }
        });
    } else { //Eliminates excessive server requests by detecting if string is empty.
        document.getElementsByClassName("search-box")[0].insertAdjacentHTML("afterend",htmfail);
    }
}); //Binds function to search button on the main page
console.log("parsed");
