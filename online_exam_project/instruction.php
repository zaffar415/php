<!doctype HTML>
<?php 
include("header1.php");
if(isset($_SESSION["uid"]))
{
    ?>
    <header>
        <style>
            button {
                background:#82c91e;
                padding:10px;
                border-radius:10px;
                opacity:0.5;
            }
        </style>

        <script>
            function load() {
                $("#check").css("display","block");
                $("#btn1").css("display","block");
            }

            function chk()
            {
                var input=$("input");
                if(input.prop("checked")==true)
                {
                    $("button").css("opacity","1");
                }
                else
                {   
                    $("button").css("opacity","0.5");
                    $("button").off("click");
                }
            }

            function btn()
            {
                var input=$("input");
                if(input.prop("checked")==true)
                {
                    document.cookie=60;
                    window.location.href="login.php?l=1";
                }
                else
                {   
                    alert("Please accept the terms and condition");    
                }
            }
        </script>
    </header>

    <? 
}
?>

<body onload="load()">
        <div style="background:#82c91e; padding:10px;">
        <h2>CANDIDATE INSTRUCTIONS</h2>
        </div>
        <div style="margin:0px 100px">
        <h1><u>Exam Instruction:</u></h1>
        <br>
        <p><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp READ VERY VERY CAREFULLY, DO NOT IGNORE ANY INFORMATION- <span style="color:blue">(We observed that- Many students are not serious with their course, exams, 
        assignments and instructions etc.)</span>.</b></p>
        <br>
        <h3><u>General Instruction:</u></h3>
        <br>
        <p><b style="color:green">PLEASE SPEND SUFFICIENT TIME TO READ ALL THESE BELOW MENTIONED DETAILS, TO AVOID ANY KIND OF LOSS, CONFUSION OR MISUNDERSTANDINGS...</b></p>
        <br>
        <ol style="list-style-type:decimal; margin:0px 50px;">
        <li>Total Duration of Exam is depend on the Number of Sections</li>
        <br>
        <li>Do not appear for exam before or after exam time. Login is for single use only. It will be deactivated automatically after first use.</li>
        <br>
        <li>Each section of Part A holds 5 minutes of time duration. And Part B holds 10 minutes of time duration for each section.</li>
        <br>
        <li>All our exam servers and backup server will be active for exam period, if any problem persists: It means there is problem in your computer, setting, Internet. If any student lack in sufficient 
            computer knowledge please consult with your friend or family member who knows about computer and internet..</li>
        <br>
        <li>The Clock will be set at the server. You need to complete the examination before the time duration is end.</li>
        <br>
        <li>Examination will end by itself or you can submit your examination by clicking the submit or Result button</li>
        <br>
        <li>To answer the PART A question do the following:</li>
        <br>
        <ul style="list-style-type:lower-alpha; margin:0px 50px;">
        <li>Select the section which you wish to answer from the list. (Note: using this option doesn't save your answer to the current question)</li>
        <br>
        <li>Select the correct Answer for each question from the given options.</li>
        <br>
        <li>Click on the Result or Submit button to save your answer result and go to the next section.</li>
        </ul>
        <br>
        <li>To answer the PART B question do the following:</li>
        <br>
        <ul style="list-style-type:lower-alpha; margin:0px 50px;">
        <li>Select the section which you wish to answer from the list. (Note: using this option doesn't save your answer to the current question)</li>
        <br>
        <li>Select the Question to be Answered and Type the Answer in the TextBox.</li>
        <br>
        <li>Click on the Result or Submit button to save your answer result and go to the next section.</li>
        </ul>
        <br>
        <li>Candidates can attempt any set of questions from the given sections at any point of time within the given time duration.</li>
        <br>
        <li>No extra time, for any reason, would be allowed to answer the question after the stipulated time is over.
        Chosen answer will be submitted for result after the time of the present section is over if the "Submit" or "Result" button is NOT clicked due to exceeding the time limit.
        </li>
        <br>
        <li>Do NOT use the "Back" or "Refresh" botton on your browser once you egun taking the assessment and do NOT clase the window of the assessment for any reason. </li>
        <br>
        <li>Do raise your hand and wait for an invigilator if you have a query, feel unwell, need to use the toilet or face any cencerns with the compute system.</li>
        <br>
        <li>Each question of PART A carries one mark. A correct answer will be awarded one mark, a wrong answer or unanswered question will NOT be awarded any marks</li>
        <br>
        <li>Each question of PART B carries two mark. A correct answer will be awarded two mark, a wrong answer or unanswered question will NOT be awarded any marks</li>
        <br>
        <li>In behavioral Competencies section, all questions are mandatory. Answer questions without skipping in that section, where users will be allowed to review older question before submitting for Result.</li>
        <br>
        <li>A set of question of a particular section will be displayed on the screen at a time.</li>
        </ol>
        <br>
        <br>
        <div id="check" style="display:none">
        If you read all the instructions very careful, then you will not face any issue during your exam. <span style="color:darkgreen"> Good Luck.</span> <br><br>
        <input type="checkbox" onchange="chk()" >I accept the terms and conditions
        </div>
        </div>
        <div>
        <br>
            <div id="btn1" style="display:none"><center><button onclick="btn()" click=disabled>Click here to start the exam</button>
            </center></div>
        <br>
        <br>
        </div>    
    </body>