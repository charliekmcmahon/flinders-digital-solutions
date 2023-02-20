var bool = true;

function countdown() {
    var seconds = 60;
    function tick() {
      var counter = document.getElementById("counter");
      seconds--;
      counter.innerHTML =
        "" + (seconds < 10 ? "0" : "") + String(seconds);
      if (seconds > 0 && bool == true) {
        if (seconds == 1) {
            document.getElementById("counterLabel").innerHTML = " second remaining";
        }
        else if (seconds < 10) {
            document.getElementById("counterLabel").innerHTML = " seconds remaining";
            document.getElementById("counterLabel").classList.remove("text-indigo-500");
            document.getElementById("counterLabel").classList.add("text-red-500");
            document.getElementById("counter").classList.remove("text-indigo-500");
            document.getElementById("counter").classList.add("text-red-700");
        }
        else {
            document.getElementById("counterLabel").innerHTML = " seconds remaining";
        }
        setTimeout(tick, 1000);
      } else if (seconds == 0 && bool == true) {
            document.getElementById("counterLabel").innerHTML = " seconds remaining - Waiting for results...";
            document.getElementById("counter").innerHTML = "0";
            document.getElementById("upButton").disabled = true;
            document.getElementById("downButton").disabled = true;
            document.getElementById("leftButton").disabled = true;
            document.getElementById("rightButton").disabled = true;
            document.getElementById("dropButton").disabled = true;

            // wait 10 seconds, and then redirect to the next page
            setTimeout(function() {
                window.location.href = "../redirect/";
            }, 10000);
            
      } else {
            document.getElementById("counterLabel").innerHTML = " seconds remaining - Waiting for results...";
            document.getElementById("counter").innerHTML = "0";
            document.getElementById("upButton").disabled = true;
            document.getElementById("downButton").disabled = true;
            document.getElementById("leftButton").disabled = true;
            document.getElementById("rightButton").disabled = true;
            document.getElementById("dropButton").disabled = true;
      }
    }
    tick();
  }
  countdown();


  // Add event listener for the dropButton
document.getElementById("dropButton").addEventListener("click", function() {
    // MAKE request -- TODO

    //-- 

    bool = false;

    document.getElementById("counterLabel").innerHTML = " seconds remaining";
    document.getElementById("counter").innerHTML = "0";
    document.getElementById("upButton").disabled = true;
    document.getElementById("downButton").disabled = true;
    document.getElementById("leftButton").disabled = true;
    document.getElementById("rightButton").disabled = true;
    document.getElementById("dropButton").disabled = true;

    // wait 10 seconds, and then redirect to the next page
    setTimeout(function() {
        window.location.href = "../redirect/";
    }, 10000);
    
});