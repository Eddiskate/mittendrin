<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="refresh" content="90" >
            <style type="text/css">
                body {
                    font-family: "Trebuchet MS", sans-serif;
                    font-size: 12px;
                }
            </style>    
    </head>
    <div>
        <?php
        $simple = file_get_contents('../XMLSongs.xml');

        $p = xml_parser_create();
        xml_parse_into_struct($p, $simple, $vals, $index);
        xml_parser_free($p);

        echo $vals['7']['attributes']['NAME'] . ' - ' . $vals['4']['attributes']['TITLE'];
        ?>
    </div>
</body>
</html>