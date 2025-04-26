{{--  <meta name="csrf-token" content="{{ csrf_token() }}">  --}}

    <script>
    function showHint(str) {

            if (str.length == 0) {
                
                document.getElementById("txtHint").innerHTML = "";
                return;
            }

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var results = JSON.parse(this.responseText);
                    
                    let output = '';
                   
                    results.courses.forEach(function(course) {
                        
                        output += '<p>' + course.title + '</p>';
                    });
                    
                    document.getElementById("txtHint").innerHTML = output;
                }
            };

            xhttp.open("GET", "/gethint?q=" + encodeURIComponent(str), true);
            xhttp.send();
        }
    </script>

    <p><b>Start typing a name in the input field below:</b></p>
    <form action="">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
    </form>

    <p>Suggestions: <span id="txtHint"></span></p>




