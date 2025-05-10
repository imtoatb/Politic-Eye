let htmfail = "<p>No result found.</p>";
document.getElementById("trigger").addEventListener("click", function() { //VERY IMPORTANT : always define anonymous function in second parameter else will just execute once the function and not add the event listener
    var $String = $("#searchbox").val(); //Fetches content of search box
    console.log($String); 
    if ($String !== "") {
        $.ajax({
            type: "POST",
            url: "feedback.php",
            data: {"Keywords":$String},
            success: function(data) {
                console.log(data);
            }
        });
    } else { //Eliminates excessive server requests by detecting if string is empty.
        document.getElementsByClassName("search-box")[0].insertAdjacentHTML("afterend",htmfail);
    }
}); //Binds function to search button on the main page
console.log("parsed");
