<!-- Units of work: 3 -->

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    </head>
    <style>
        body {
            background: #333;
            color: #fff;
        }

        h2 {
            margin-left: auto;
            margin-right: auto;
        }

        h3 {
            margin-left: auto;
            margin-right: auto;
        }

        h4 {
            margin-left: auto;
            margin-right: auto;
        }

        h5 {
            margin-left: auto;
            margin-right: auto;
        }

        h6 {
            margin-left: auto;
            margin-right: auto;

        }
        div.centered-block {
            margin-left: auto;
            margin-right: auto;
        }

        .cell-container {
        	position: relative;
        	width: 240px;
        	height: 240px;
        	margin: 18px auto;
            margin:
        }
        .cell-container>.cell {
        	width: 80px;
        	height: 80px;
        	float: left;
        }
    </style>

    <body>
        <div class="container" style="text-align:center;">


            <div class="row">
                <h2>XML eXternal Entities (XXE)</h2>
            </div>
            <div class="row">
                <div class="centered-block">
    				<div class="cell-container">
    					<div class="cell" id="r1c1"></div>
    					<div class="cell" id="r1c2"></div>
    					<div class="cell" id="r1c3"></div>
    					<div class="cell" id="r2c1"></div>
    					<div class="cell" id="r2c2"></div>
    					<div class="cell" id="r2c3"></div>
    					<div class="cell" id="r3c1"></div>
    					<div class="cell" id="r3c2"></div>
    					<div class="cell" id="r3c3"></div>
    				</div>
                </div>
            </div>

            <div class="row">
                <h4>
                    Mission: Find flag.txt
                </h4>
            </div>

            <div class="row">
                <h5>XEEXXE Status</h5>
            </div>
            <p>
                <?php
                libxml_disable_entity_loader(false);

                $myXMLData =
                '<?xml version="1.0" encoding="UTF-8"?>
                    <!DOCTYPE character [
                    <!ELEMENT character ANY >
                    <!ELEMENT health ANY >
                    <!ELEMENT mana ANY >
                    <!ELEMENT class ANY >';

                if (isset($_GET['param'])) {
                    $myXMLData = $myXMLData . '<!ENTITY param SYSTEM "' . base64_decode($_GET['param']) .  '" > ]>';
                } else {
                    $myXMLData = $myXMLData . '<!ENTITY param SYSTEM "file:///app/boss/all" > ]>';
                }

                $myXMLData = $myXMLData . '<character>&param;</character>';

                $xmlDoc = new DOMDocument();
                $xmlDoc->loadXML($myXMLData, LIBXML_NOENT | LIBXML_DTDLOAD);

                $x = $xmlDoc->documentElement;

                foreach ($x->childNodes AS $item) {
                  print $item->nodeName . " = " . $item->nodeValue . "<br>";
                }

                ?>
            </p>

            <div class="row">
                <h6>Eat <a href="#">source</a>.
            </div>
        </div>
    </body>

    <!-- Runs the four states of the glider banner. -->
    <script>
        function got_state4() {
        // Set the state
        document.getElementById("r1c1").style.background = "#ffffff";
        document.getElementById("r1c2").style.background = "none";
        document.getElementById("r1c3").style.background = "none";

        document.getElementById("r2c1").style.background = "none";
        document.getElementById("r2c2").style.background = "#ffffff";

        document.getElementById("r3c1").style.background = "#ffffff";
        document.getElementById("r3c2").style.background = "#ffffff";
        document.getElementById("r3c3").style.background = "none";

        setTimeout(function() { got_state1(); }, 1000);
        }

        function got_state3() {
        // Set the state
        document.getElementById("r1c1").style.background = "none";

        document.getElementById("r2c1").style.background = "#ffffff";
        document.getElementById("r2c2").style.background = "none";

        document.getElementById("r3c3").style.background = "#ffffff";

        setTimeout(function() { got_state4(); }, 1000);
        }

        function got_state2() {
        // Set the state
        document.getElementById("r1c1").style.background = "#ffffff";
        document.getElementById("r1c2").style.background = "none";
        document.getElementById("r1c3").style.background = "#ffffff";

        document.getElementById("r2c2").style.background = "#ffffff";

        document.getElementById("r3c1").style.background = "none";
        document.getElementById("r3c2").style.background = "#ffffff";
        document.getElementById("r3c3").style.background = "none";

        setTimeout(function() { got_state3(); }, 1000);
        }

        function got_state1() {
        // Set the state
        document.getElementById("r1c1").style.background = "none";
        document.getElementById("r1c2").style.background = "#ffffff";

        document.getElementById("r2c2").style.background = "none";
        document.getElementById("r2c3").style.background = "#ffffff";

        document.getElementById("r3c1").style.background = "#ffffff";
        document.getElementById("r3c2").style.background = "#ffffff";
        document.getElementById("r3c3").style.background = "#ffffff";

        setTimeout(function() { got_state2(); }, 1000);
        }

        got_state1();
    </script>
</html>