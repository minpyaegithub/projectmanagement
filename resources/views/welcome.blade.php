@extends('layout.master')

@section('title','Home')
@section('content')
    <style>
        .fullscreen{
            /*background-color: white;*/
            height:calc(100vh - 30vh);
            display: flex;
            align-items: center;
            justify-content: center;/*Left-right adjust*/
        }
</style>
<body>
        <div class="fullscreen">
                <h1>
                    <b>
                    <script type="text/javascript" language="javascript">
                        var message = "MBC Co,Ltd. Work Flow"
                        var neonbasecolor = "#bbb"
                        var neontextcolor = "#0065ff"
                        var flashspeed = 150  //in milliseconds

                        ///No need to edit below this line/////

                        var n = 0
                        if (document.all || document.getElementById) {
                            document.write('<font color="' + neonbasecolor + '">')
                            for (m = 0; m < message.length; m++)
                                document.write('<span id="neonlight' + m + '">' + message.charAt(m) + '</span>')
                            document.write('</font>')
                        }
                        else
                            document.write(message)

                        function crossref(number) {
                            var crossobj = document.all ? eval("document.all.neonlight" + number) : document.getElementById("neonlight" + number)
                            return crossobj
                        }

                        function neon() {

                            //Change all letters to base color
                            if (n == 0) {
                                for (m = 0; m < message.length; m++)
                                    //eval("document.all.neonlight"+m).style.color=neonbasecolor
                                    crossref(m).style.color = neonbasecolor
                            }

                            //cycle through and change individual letters to neon color
                            crossref(n).style.color = neontextcolor

                            if (n < message.length - 1)
                                n++
                            else {
                                n = 0
                                clearInterval(flashing)
                                setTimeout("beginneon()", 500)
                                return
                            }
                        }

                        function beginneon() {
                            if (document.all || document.getElementById)
                                flashing = setInterval("neon()", flashspeed)
                        }

                        beginneon()
                    </script>
                    </b>
                </h1>
        </div>
</body>
@endsection


