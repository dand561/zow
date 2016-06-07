<?php
/**
 * sql2xml prints structured XML
 *
 * @param string  $sql       - SQL statement
 * @param string  $structure - XML hierarchy
 */
function sql2xml($sql, $structure = 0) {
    // initializarea variabilelor pt procesarea  randurilor din DB
    $row_current = $row_previous = null;
    // credentialele MySQL
    $db_cn = mysql_pconnect('localhost', 'drgmrsc', 'zowTW2016');
    mysql_select_db('zowdatabase', $db_cn);
    $result = mysql_query($sql, $db_cn);
    // get number of columns in result
    $ncols = mysql_num_fields($result);
    // avem cumva o structura ierarhica? nu, dar asa a mers exemplul.
    if ($structure == 0) {
        $deep = -1;
        $pos = 0;
    }
    else {
        // setarea ierarhiilor si numarul de ierarhii
        $hierarchy = explode(',', $structure);
        $deep = count($hierarchy);
        // set flags for opened tags
        for ($i = 0; $i <= $deep; $i++) {
            $tagOpened[$i] = false;
        }
        // set initial row
        for ($i = 0; $i < $ncols; $i++) {
            $rowPrev[$i] = microtime();
        }
    }
    // loop prin rezultat
    while ($row = mysql_fetch_row($result)) {
        // loop prin nivelul de ierarhie
        for ($level = 0, $pos = 0; $level < $deep; $level++) {
            // prepare row segments to compare
            for ($i = $pos; $i < $pos+$hierarchy[$level]; $i++) {
                $row_current .= trim($row[$i]);
                $row_previous .= trim($rowPrev[$i]);
            }
            // test row segments between row_current and row_previous
            // it should be "!==" and not "!="
            if ($row_current !== $row_previous) {
                // close current tag and all tags below
                for ($i = $deep; $i >= $level; $i--) {
                    if ($tagOpened[$i]) {
                        print "</ROW$i>\n";
                    }
                    $tagOpened[$i] = false;
                }
                // reset the rest of rowPrev
                for ($i = $pos; $i < $ncols; $i++) {
                    $rowPrev[$i] = microtime();
                }
                // set flag to open
                $tagOpened[$level] = true;
                print "<ROW$level>\n";
                // loop through hierarchy levels
                for ($i = $pos; $i < $pos + $hierarchy[$level]; $i++) {
                    $name = strtoupper(mysql_field_name($result, $i));
                    print "<$name>";
                    print trim(htmlspecialchars($row[$i],$i));
                    print "</$name>\n";
                }
            }
            // increment row position
            $pos += $hierarchy[$level];
            // reset row segments (part of columns)
            $row_current = $row_previous = '';
        }
        // print rest
        print "<ROW$level>\n";
        for ($i = $pos; $i < $ncols; $i++) {
            $name = strtoupper(mysql_field_name($result, $i));
            print "<$name>";
            print trim(htmlspecialchars($row[$i],$i));
            print "</$name>\n";
        }
        print "</ROW$level>\n";
        // remember previous row
        $rowPrev = $row;
    }
    // close opened tags
    for ($level = $deep; $level >= 0; $level--) {
        if ($tagOpened[$level]) {
            print "</ROW$level>\n";
        }
    }
}
?>