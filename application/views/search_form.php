<div id="main-input" align="center">
    <?php
    echo form_open('search/multiSearch');
    if(isset($prevVal)) {
        $formInpData=array('value'=>$prevVal, 'onkeyup'=>'gopiSearch()', 'name'=>'search', 'required'=>'required', 'placeholder'=>'Enter multiple parameters separated by a space.');
    }
    else {
        $formInpData=array('name'=>'search', 'onkeyup'=>'gopiSearch()', 'required'=>'required', 'placeholder'=>'Enter multiple parameters separated by a space.');
    }
    echo form_input($formInpData);
    //echo "<br>";
    //echo form_submit('submit', 'SEARCH!!');
    echo form_close();
    ?>
</div>