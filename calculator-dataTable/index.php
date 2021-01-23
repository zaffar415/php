<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
        body {
            overflow: hidden; /* Hide scrollbars */
        }
        .calc_table>tbody>tr> td {
            cursor:pointer;
            width:50px;
            height:50px;
            
        }
        td:hover {
            background:black;
        }
        td:active {
            background:white;
        }

    </style>    
    
</head>
<body>
    <div id="screen1" style="background:black; height:100vh; text-align:center; color:white; margin:auto;">
      <h1 style="padding-top:100px;">CALCULATOR</h1>
      <a id="scroll-btn" class="h1 rounded-circle" style="position: fixed; bottom: 20px; right: 20px;"><i class="fas fa-arrow-down bg-dark text-white rounded-circle p-3"></i></a>
        <div style="background:#333333; width:250px; margin:0 auto; padding:20px 0px; ">
            <table class="calc_table" style="color:white; margin:0 auto; border-collapse:collapse;">
                <tr>
                    <td colspan=4>
                        <div id="display" style="width:200px; height:50px; font-size:30px; background:white; overflow:hidden; color:black; text-align:right;"></div>
                    </td>
                </tr>
                <tr>
                    <td onclick="allclr(1)">AC</td>
                    <td onclick="clr()">CLR</td>
                    <td onclick="opp('%')">%</td>
                    <td onclick="opp('/')">/</td>
                </tr>
                <tr>
                    <td onclick="num(1)">1</td>
                    <td onclick="num(2)">2</td>
                    <td onclick="num(3)">3</td>
                    <td onclick="opp('x')">x</td>
                </tr>
                <tr>
                    <td onclick="num(4)">4</td>
                    <td onclick="num(5)">5</td>
                    <td onclick="num(6)">6</td>
                    <td onclick="opp('-')">-</td>
                </tr>
                <tr>
                    <td onclick="num(7)">7</td>
                    <td onclick="num(8)">8</td>
                    <td onclick="num(9)">9</td>
                    <td onclick="opp('+')">+</td>
                </tr>
                <tr>
                    <td onclick="num(0)" colspan="2">0</td>
                    <td onclick="num('.')">.</td>
                    <td onclick="result()" style="background:white; color:black;">=</td>
                </tr>
            </table>
        </div>  
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Value 1</label>
                <input type="text" id="val1"> 
            </div>
            <div class="col-lg-3">
                <label for="">Operator</label>
                <input type="text" id="operator">
            </div>
            <div class="col-lg-3">
                <label for="">Value 2</label>
                <input type="text" id="val2">&emsp;=
            </div>
            <div class="col-lg-3">
            <label for="">Result</label>
                <input type="text" id="result">
            </div>
        </div>
    </div>
    
    <div id="screen2" style="height:100vh; width:80%; text-align:center; margin:auto;"> 
        <div>
            <table id="list_table" class="display responsive" style="margin-top:50px; width:100%;">
                <thead style="background:#333333; color:white;">
                    <tr>
                        <th>value1</th>
                        <th>value2</th>
                        <th>Operator</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
        
         
        



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/c5b0d4ad62.js" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>
</html>