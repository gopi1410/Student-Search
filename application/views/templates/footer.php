                            <?php
                            if(isset($table_end) && $table_end) {
                            ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
                <?php
                if(isset($total) && $total!=0) {
                    ?>
                    <div id="other_data" align="center">
                        <div id="total">
                            <b><?=$total?></b> student(s) found corresponding to your search.
                        </div>
                        <div id="mailing_list">
                            Click here to show/hide the mailing list of above searched students.
                        </div>
                    </div>
                    <div id="mail_display" align="center">
                        <p><?=$emails?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <div id="footer">
        <div class="indent">
            <div class="fleft">Copyright 2012 | &copy; <a href="http://home.iitk.ac.in/~gopi" target="_blank">GOPI RAMENA</a></div>
            <div class="fright"><b>Disclaimer:</b> All data taken from Office Automation &amp; relevant details displayed after taking permission from Computer Center.</div>
        </div>
    </div>
</body>
</html>