<html>
    <head>
        <title></title>

    </head>
    <body>
    <p id="test1"><span class="status">OK</span> - Test1 <span class="result">Passed!</span></p>
    <p id="test2"><span class="status">OK</span> - Test2 <span class="result">Passed!</span></p>
    <p id="test3"><span class="status">Error</span> - Test3 <span class="result">Failed</span></p>

    Some More Text...
        <script type="text/javascript">
            var test1Status = document.getElementById('test1').firstChild;
            var test1Result = document.getElementById('test1').lastChild;
            var test3Result = document.getElementById('test3').lastChild;

             test3Result.style.color = 'red';
            //  test3Result.innerHTML = "Passsssed";

        </script>
    </body>
</html>