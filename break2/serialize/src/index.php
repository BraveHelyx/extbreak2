<?php
    class print_flag {
        public function __tostring() {
            return "c3RiAl_kIlLeR";
        }
    }

    class echo_obj {
        public function __wakeup() {
            echo "hello";
        }

        public function greetings() {
            echo "We meet again, ";
        }
    }

    if (!isset ($_COOKIE['level0'])) {
        $cookie = serialize("friend");
        setcookie('level0', $cookie, time() + (86400 * 30));
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    </head>

    <style>
        body {
            background: #333;
            color: #fff;
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
                <h3>
                    <?php
                    $echo = new echo_obj();
                    $echo->greetings();

                    if (isset ($_COOKIE['level0'])) {
                        $flagObj = unserialize($_COOKIE['level0']);

                        if ($flagObj == "c3RiAl_kIlLeR") {
                            echo '<span class="alert-info">' . $flagObj  . '</span>';
                            echo '</h3></div><div class="row"><h3><span class="alert-success">' . 'EXTBREAK3{A_c3RiAl_kIlLeR}' . '</span>';
                        } else {
                            echo '<span class="alert-danger">' . $flagObj  . '</span>';
                        }
                    }
                    ?>
                </h3>
            </div>


            <div class="row">
                <h4>
                    Welcome to Level0
                </h4>
            </div>

            <div class="row">
                <h5>
                    We missed you
                </h5>
            </div>

            <div class="row">
                <h6>
                    Eat <a href="https://pastebin.com/FEv7c4tA">source</a>.
                </h6>
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