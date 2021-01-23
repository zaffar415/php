function num(number) {
    if ($("#result").val() == "") {
        if ($("#operator").val() == "") {
            $("#val1").val(function() {
                return this.value + number;
            });
        } else {
            $("#val2").val(function() {
                return this.value + number;
            });
        }

        $("#display").html(function() {
            return this.innerHTML + number;
        });
    } else {
        $("#val1").val(function() {
            return $("#result").val() + number;
        });
        $("#display").html($("#val1").val());
        $("#result").val("");
    }

}

function opp(operator) {
    $("#operator").val(operator);
    $("#val2").val("");
    $("#display").html("");
    if ($("#result").val() != "") {
        $("#val1").val($("#result").val());
        $("#result").val("");
    }
}

function allclr() {
    $("#val1").val("");
    $("#val2").val("");
    $("#operator").val("");
    $("#result").val("");
    $("#display").html("");
}

function clr() {
    var len = $("#display").html().length;
    var val = $("#display").html();

    $("#display").html(val.substring(0, len - 1));
    if ($("#operator").val() == "") {
        $("#val1").val(val.substring(0, len - 1));
    } else {
        $("#val2").val(val.substring(0, len - 1));
    }


}

function result() {
    var val1 = parseFloat($("#val1").val());
    var val2 = parseFloat($("#val2").val());
    var operator = $("#operator").val();
    switch (operator) {
        case '+':
            $("#result").val(val1 + val2);
            break;
        case '-':
            $("#result").val(val1 - val2);
            break;
        case 'x':
            $("#result").val(val1 * val2);
            break;
        case '/':
            $("#result").val(val1 / val2);
            break;
        case '%':
            $("#result").val(val1 % val2);
            break;
        default:
            $("#result").val("Invalid");
    }
    var result = $("#result").val();
    $("#display").html(result);

    $.ajax({
        type: 'post',
        url: 'process.php',
        data: {
            val1,
            val2,
            operator,
            result
        },
        success: function(result) {
            $("#list_table").DataTable().destroy();
            Dtable();
        }
    })

}

$("a").click(function() {
    $("html,body").animate({ scrollTop: $(document).height() }, 1000);
    $("#scroll-btn").css("display", "none");
    $("body").css("overflow-y", "scroll");
});

$(document).scroll(function() {
    if ($(window).scrollTop() <= 50) {
        $("#scroll-btn").css("display", "block");
    } else {
        $("#scroll-btn").css("display", "none");
    }
});


function Dtable() {
    $("#list_table").DataTable({
        "bProcessing": true,
        "serverSide": true,
        "ajax": {
            url: "process.php?index=1",
            type: "POST",
            error: function() {
                $("table").css("display", "none");
            }
        }
    });
}

Dtable();