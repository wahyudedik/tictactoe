<!DOCTYPE html>
<html>
<head>
    <title>Tic Tac Toe</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tic Tac Toe</h1>
        <div id="board">
            <div class="row">
                <div class="cell" onclick="play(0)"></div>
                <div class="cell" onclick="play(1)"></div>
                <div class="cell" onclick="play(2)"></div>
            </div>
            <div class="row">
                <div class="cell" onclick="play(3)"></div>
                <div class="cell" onclick="play(4)"></div>
                <div class="cell" onclick="play(5)"></div>
            </div>
            <div class="row">
                <div class="cell" onclick="play(6)"></div>
                <div class="cell" onclick="play(7)"></div>
                <div class="cell" onclick="play(8)"></div>
            </div>
        </div>
        <button onclick="reset()">Reset</button>
        <div id="status"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
