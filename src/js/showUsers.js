const showSuggestion = () => {
    /*
    if(str.length == 0){
        document.getElementById('output').innerHTML = '';
    } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('output').innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "?q="+str, true);
        xmlhttp.send();
*/

        $.ajax({
            url: "../services/subscribers.php",
            data:{input: $("#txtInput").val()},
            type: "GET",
            async:true,
            success: function (data) {
                console.log(data);
                $("#output").text(data);
            },
            error: function (data)
            {
                console.log(data);
            }
        });
}