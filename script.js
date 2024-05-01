function teacherRegister() {

    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var mobile = document.getElementById("m");
    var username = document.getElementById("u");
    var grade = document.getElementById("g");
    var subject = document.getElementById("s");

    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("s", subject.value);
    f.append("g", grade.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                password.value = "";
                username.value = "";
                subject.value = "";
                grade.value = "";
                document.getElementById("msg").innerHTML = "";
                var dm = document.getElementById("success");
                var k = new bootstrap.Modal(dm);
                k.show();


            } else {
                var msg1 = document.getElementById("msg");
                msg1.className = "text-danger text-center fw-bolder mt-3";
                msg1.innerHTML = text;
            }

        }

    };

    r.open("POST", "teacherRegisterProcess.php", true);
    r.send(f);

}

function officerRegiser() {

    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var mobile = document.getElementById("m");
    var username = document.getElementById("u");


    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("m", mobile.value);
    f.append("u", username.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                password.value = "";
                username.value = "";
                document.getElementById("msg").innerHTML = "";
                var dm = document.getElementById("success");
                var k = new bootstrap.Modal(dm);
                k.show();


            } else {
                var msg1 = document.getElementById("msg");
                msg1.className = "text-danger text-center fw-bolder mt-3";
                msg1.innerHTML = text;
            }

        }

    };

    r.open("POST", "officerRegisterProcess.php", true);
    r.send(f);

}

function studentRegiser() {


    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var nic = document.getElementById("n");
    var username = document.getElementById("u");
    var grade = document.getElementById("g");


    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("n", nic.value);
    f.append("u", username.value);
    f.append("g", grade.value);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                nic.value = "";
                password.value = "";
                username.value = "";
                grade.value = "";
                document.getElementById("msg").innerHTML = "";
                var dm = document.getElementById("success");
                var k = new bootstrap.Modal(dm);
                k.show();



            } else {
                var msg1 = document.getElementById("msg");
                msg1.className = "text-danger text-center fw-bolder mt-3";
                msg1.innerHTML = text;
            }

        }

    };

    r.open("POST", "studentRegisterProcess.php", true);
    r.send(f);

}


function admin() {
    window.location = "adminSignin.php";
}

function GotoIndex() {
    var dm = document.getElementById("alert");
    var k = new bootstrap.Modal(dm);
    k.show();
}

function signOutAdmin() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                window.location = "adminsignIn.php";
            }
        }
    }

    r.open("GET", "signOutAdmin.php", true);
    r.send();

}

function verify() {

    var e = document.getElementById("e").value;
    var v = document.getElementById("vc").value;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                k.hide();
                window.location = "adminPanel.php";
            } else {
                var msg = document.getElementById("msg").innerHTML = text;
            }

        }
    };
    r.open("GET", "verifyProcess.php?v=" + v + "&e=" + e, true);
    r.send();

}

function adminVerification() {

    var e = document.getElementById("e").value;

    var form = new FormData();
    form.append("e", e);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var verificationModal = document.getElementById("verificationModal");
                k = new bootstrap.Modal(verificationModal);

                k.show();

            } else {
                var msg = document.getElementById("msg2").innerHTML = text;
            }

        }
    }
    r.open("POST", "adminVerificationProcess.php", true);
    r.send(form);

}

function sendInvite(x) {

    var verificationModal = document.getElementById("sendInvite" + x);
    k = new bootstrap.Modal(verificationModal);

    k.show();

}

function adminUpdate() {

    var first = document.getElementById("fn");
    var last = document.getElementById("ln");
    var email = document.getElementById("e");

    var f = new FormData();

    f.append("fn", first.value);
    f.append("ln", last.value);
    f.append("e", email.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("success");
                var k = new bootstrap.Modal(dm);
                k.show();

            } else {
                var msg = document.getElementById("msg").innerHTML = text;
            }

        }
    };
    r.open("POST", "adminUpdateProcess.php", true);
    r.send(f);

}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                window.location = "index.php";
            }
        }
    }

    r.open("GET", "signOut.php", true);
    r.send();

}

function signOutStudent() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                window.location = "index.php";
            }
        }
    }

    r.open("GET", "signOutStudent.php", true);
    r.send();

}

function signOutOfficer() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                window.location = "index.php";
            }
        }
    }

    r.open("GET", "signOutOfficer.php", true);
    r.send();

}

function teacherSignIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var remember = document.getElementById("remember");

    var formData = new FormData();

    formData.append("un", un.value);
    formData.append("pw", pw.value);
    formData.append("remember", remember.checked);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == 1) {
                var dm = document.getElementById("verificationModal");
                var k = new bootstrap.Modal(dm);
                k.show();

            } else if (text == 2) {

                window.location = "teacherPanel.php";

            } else {
                var msg2 = document.getElementById("msg2");
                msg2.innerHTML = text;

            }

        }

    };

    r.open("POST", "teacherSignInProcess.php", true);
    r.send(formData);

}

function teacherverify() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var vc = document.getElementById("vc");

    var formData = new FormData();

    formData.append("un", un.value);
    formData.append("pw", pw.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                window.location = "teacherPanel.php";
            } else {
                var msg = document.getElementById("msg3").innerHTML = text;
            }

        }
    };
    r.open("POST", "teacherVerifyProcess.php", true);
    r.send(formData);

}

function teacherUpdate() {

    var first = document.getElementById("fn");
    var last = document.getElementById("ln");
    // var email = document.getElementById("e");
    var mobile = document.getElementById("m");
    var username = document.getElementById("un");
    var password = document.getElementById("pw");

    var f = new FormData();

    f.append("fn", first.value);
    f.append("ln", last.value);
    // f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("un", username.value);
    f.append("pw", password.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("success");
                var k = new bootstrap.Modal(dm);
                k.show();

            } else {
                var msg = document.getElementById("msg").innerHTML = text;

            }

        }
    };
    r.open("POST", "teacherUpdateProcess.php", true);
    r.send(f);

}

function officerSignIn() {


    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var remember = document.getElementById("remember");

    var formData = new FormData();

    formData.append("un", un.value);
    formData.append("pw", pw.value);
    formData.append("remember", remember.checked);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == 1) {
                var dm = document.getElementById("verificationModal");
                var k = new bootstrap.Modal(dm);
                k.show();

            } else if (text == 2) {

                window.location = "officerPanel.php";

            } else {
                var msg2 = document.getElementById("msg2");
                msg2.innerHTML = text;

            }

        }

    };

    r.open("POST", "officerSignInProcess.php", true);
    r.send(formData);

}

function officerVerify() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var vc = document.getElementById("vc");

    var formData = new FormData();

    formData.append("un", un.value);
    formData.append("pw", pw.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                window.location = "officerPanel.php";
            } else {
                var msg = document.getElementById("msg3").innerHTML = text;
            }

        }
    };
    r.open("POST", "officerVerifyProcess.php", true);
    r.send(formData);

}

function officerUpdate() {

    var first = document.getElementById("fn");
    var last = document.getElementById("ln");
    // var email = document.getElementById("e");
    var mobile = document.getElementById("m");
    var username = document.getElementById("un");
    var password = document.getElementById("pw");

    var f = new FormData();

    f.append("fn", first.value);
    f.append("ln", last.value);
    // f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("un", username.value);
    f.append("pw", password.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("success");
                var k = new bootstrap.Modal(dm);
                k.show();


            } else {
                var msg = document.getElementById("msg").innerHTML = text;

            }

        }
    };
    r.open("POST", "officerUpdateProcess.php", true);
    r.send(f);

}

function studentSignIn() {


    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var remember = document.getElementById("remember");

    var formData = new FormData();

    formData.append("un", un.value);
    formData.append("pw", pw.value);
    formData.append("remember", remember.checked);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == 1) {
                var dm = document.getElementById("verificationModal");
                var k = new bootstrap.Modal(dm);
                k.show();

            } else if (text == 2) {

                window.location = "studentPanel.php";

            } else {
                var msg2 = document.getElementById("msg2");
                msg2.innerHTML = text;

            }

        }

    };

    r.open("POST", "studentSignInProcess.php", true);
    r.send(formData);

}

function studentVerify() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var vc = document.getElementById("vc");

    var formData = new FormData();

    formData.append("un", un.value);
    formData.append("pw", pw.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                window.location = "studentPanel.php";
            } else {
                var msg = document.getElementById("msg3").innerHTML = text;
            }

        }
    };
    r.open("POST", "studentVerifyProcess.php", true);
    r.send(formData);

}

function studentUpdate() {

    var first = document.getElementById("fn");
    var last = document.getElementById("ln");
    // var nic = document.getElementById("e");
    var nic = document.getElementById("m");
    var username = document.getElementById("un");
    var password = document.getElementById("pw");

    var f = new FormData();

    f.append("fn", first.value);
    f.append("ln", last.value);
    // f.append("e", email.value);
    f.append("m", nic.value);
    f.append("un", username.value);
    f.append("pw", password.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("success");
                var k = new bootstrap.Modal(dm);
                k.show();


            } else {
                var msg = document.getElementById("msg").innerHTML = text;

            }

        }
    };
    r.open("POST", "studentUpdateProcess.php", true);
    r.send(f);

}

function updateGrade(x) {
    var verificationModal = document.getElementById("updateGrade" + x);
    k = new bootstrap.Modal(verificationModal);

    k.show();

}

function StudentGradeUpdate(x) {

    var grade = document.getElementById("stuGrade");
    var email = x;
    // var nic = document.getElementById("e");

    var f = new FormData();

    f.append("grade", grade.value);
    f.append("e", email);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                window.location = "manageStudents.php";


            } else {
                var msg = document.getElementById("msg").innerHTML = text;

            }

        }
    };
    r.open("POST", "updateGradeProcess.php", true);
    r.send(f);
}

//goToFunctions

function goToAdmin() {
    window.location = "adminSignin.php";

}

function goToOfficer() {
    window.location = "officerSignIn.php";

}

function goToTeacher() {
    window.location = "teacherSignIn.php";

}

function goToStudent() {
    window.location = "studentSignIn.php";

}

//goToFunctions

//invitation

function sendInviteTeacher(x) {

    var email = x;
    // var nic = document.getElementById("e");

    var f = new FormData();


    f.append("e", email);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("openModel1" + x);
                var k = new bootstrap.Modal(dm);
                k.show();


            }

        }
    };
    r.open("POST", "sendInviteTeacherProcess.php", true);
    r.send(f);

}

function updateDetailsTeacher(x) {
    var email = x;
    var g = document.getElementById("g");
    var s = document.getElementById("s");
    // var nic = document.getElementById("e");

    var f = new FormData();


    f.append("e", email);
    f.append("g", g.value);
    f.append("s", s.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("openModel2" + x);
                var k = new bootstrap.Modal(dm);
                k.show();


            }

        }
    };
    r.open("POST", "updateDetailsTeacherProcess.php", true);
    r.send(f);

}

function sendInviteOfficer(x) {

    var email = x;
    // var nic = document.getElementById("e");

    var f = new FormData();


    f.append("e", email);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("openModel2" + x);
                var k = new bootstrap.Modal(dm);
                k.show();

            }

        }
    };
    r.open("POST", "sendInviteOfficerProcess.php", true);
    r.send(f);
}

//invitation

function selectAssignment() {


    var a = document.getElementById("a");

    var f = new FormData();


    f.append("a", a.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;




            document.getElementById("loadAnswers").innerHTML = text;




        }
    };
    r.open("POST", "selectAssignmentProcess.php", true);
    r.send(f);
}

function selectSubjectAssignment() {

    var s = document.getElementById("s");
    var g = document.getElementById("g");

    var f = new FormData();


    f.append("s", s.value);
    f.append("g", g.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;




            document.getElementById("loadAssignments").innerHTML = text;




        }
    };
    r.open("POST", "selectSubjectAssignmentProcess.php", true);
    r.send(f);
}

function openAnswer(sid, aid) {

    var dm = document.getElementById("openUpload");
    var k = new bootstrap.Modal(dm);
    k.show();

}

function sumbitAnswer(sid, aid) {

    var s = sid;
    var a = aid;

    var btn = document.getElementById("btn" + sid + "or" + aid);

    var aFile = document.getElementById("answerFile");

    var form = new FormData();

    form.append("s", s);
    form.append("a", a);

    form.append("f", aFile.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success1") {

                $("#openUpload").modal("hide");

                btn.className = "btn btn-danger rounded";
                btn.innerHTML = "Reupload";


            } else {

                document.getElementById("msg").innerHTML = text;
            }



        }


    };

    r.open("POST", "sumbitAnswerProcess.php", true);
    r.send(form);


}

function selectSubjectLesson() {

    var s = document.getElementById("s");
    var g = document.getElementById("g");

    var f = new FormData();


    f.append("s", s.value);
    f.append("g", g.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;




            document.getElementById("loadNotes").innerHTML = text;




        }
    };
    r.open("POST", "selectSubjectLessonProcess.php", true);
    r.send(f);
}

function openAddMark(sid, aid) {

    var dm = document.getElementById("marksAdd" + sid + "or" + aid);
    var k = new bootstrap.Modal(dm);
    k.show();
}

function addMarks(sid, aid) {

    var s = sid;
    var a = aid;
    var m = document.getElementById("mark");


    var form = new FormData();

    form.append("s", s);
    form.append("a", a);
    form.append("m", m.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {

                window.location = "viewAnswers.php";
            } else {

                document.getElementById("warning").innerHTML = text;
            }



        }


    };

    r.open("POST", "addMarksProcess.php", true);
    r.send(form);

}

function selectSubjectOfficer() {

    var s = document.getElementById("s");
    var g = document.getElementById("g");

    var f = new FormData();


    f.append("s", s.value);
    f.append("g", g.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;




            document.getElementById("loadAssignments").innerHTML = text;




        }
    };
    r.open("POST", "selectSubjectOfficerProcess.php", true);
    r.send(f);
}

function markReleaseOfficer(aid) {

    var a = aid;
    var blockbtn = document.getElementById("release" + a);

    var form = new FormData();

    form.append("a", a);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success2") {
                // window.location = "manageUsers.php";
                blockbtn.className = "btn btn-success rounded fw-bold";
                blockbtn.innerHTML = "Release Marks";
            } else if (text == "success1") {
                blockbtn.className = "btn btn-danger rounded fw-bold";
                blockbtn.innerHTML = "Don't Release Marks";
            }



        }


    };

    r.open("POST", "markReleaseOfficerProcess.php", true);
    r.send(form);
}

function sendInviteStudents(x) {

    var email = x;

    var f = new FormData();


    f.append("e", email);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "success") {

                var dm = document.getElementById("openModel1" + x);
                var k = new bootstrap.Modal(dm);
                k.show();


            }

        }
    };
    r.open("POST", "sendInviteStudentsProcess.php", true);
    r.send(f);
}