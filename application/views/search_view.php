<?php

if(!isset($student) || $student===0) {
    print_r($query);
}
else {
    ?>
        <tr>
            <td class="gopi-left" align="center">
                <a class="pic-links" target="_blank" href="http://home.iitk.ac.in/~<?=$student->email?>/">
                    <img src="http://oa1.cc.iitk.ac.in:8181/Oa/Jsp/Photo/<?=$student->roll?>_0.jpg" alt="Oops, Screw CC!" />
                </a>
                <br/><br/>
                <a target="_blank" href="https://www.facebook.com/search/results.php?q=<?=$student->name?>&type=users"><abbr title="facebook search by name"><img src="<?=$base_url?>icons/facebook.png" height="32" width="32" /></abbr></a>
                <a target="_blank" href="https://www.facebook.com/search/results.php?q=<?=$student->email?>@iitk.ac.in&type=users"><abbr title="facebook search by email"><img src="<?=$base_url?>icons/facebook.png" height="32" width="32" /></abbr></a>
                <a target="_blank" href="https://plus.google.com/s/<?=$student->name?>"><abbr title="google plus search"><img src="<?=$base_url?>icons/gplus.jpg" height="32" width="32" /></abbr></a>
                <a target="_blank" href="https://twitter.com/#!/search/users/<?=$student->name?>"><abbr title="twitter search"><img src="<?=$base_url?>icons/twitter.png" height="32" width="32" /></abbr></a>
                <a target="_blank" href="http://www.linkedin.com/search/fpsearch?type=people&keywords=<?=$student->name?>"><abbr title="linked in search"><img src="<?=$base_url?>icons/linkedin.png" height="32" width="32" /></abbr></a>
                <a target="_blank" href="http://172.26.142.68/examscheduler/personal_schedule.php?rollno=<?=$student->roll?>"><abbr title="exam scheduler"><img src="<?=$base_url?>icons/exam.jpg" height="32" width="32" /></abbr></a>
            </td>
            <td class="gopi-right" align="center">
                <p><b>Name: </b><?=$student->name?></p>
                <p><b>Roll No.: </b><?=$student->roll?></p>
                <p><b>Programme: </b><?=$student->prog?></p>
                <p><b>Department: </b><?=$student->dep?></p>
                <p><b>IITK Address: </b><?=$student->hall?>, <?=$student->room?></p>
                <p><b>E-Mail id: </b><a href="mailto:<?=$student->email?>@iitk.ac.in"><?=$student->email?>@iitk.ac.in</a></p>
                <p><b>Blood Group: </b><?=$student->blood?></p>
                <p><b>Gender: </b><?=$student->gender?></p>
                <p><b>Guardian's name: </b><?=$student->guardian?></p>
                <p><b>Address: </b><?=$student->address?></p>
                <p><b>Mobile: </b><?=$student->mobile?></p>
                <p><b>Phone no: </b><?=$student->phone?></p>
            </td>
        </tr>
    <?
}

?>