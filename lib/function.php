<?php

function user($col= '')
{
    $data = $_SESSION['user_info'];
    $val = ($col == '') ? $data['lastname']. ' '. $data['firstname'] : $data[$col];
    return $val;
}

function getCourse($id){
    global $db;

    $sql = $db->query("SELECT * FROM courses WHERE sn = '$id' OR slug = '$id'") or die("Cannot COnnect");

    $row = mysqli_fetch_array($sql);

    return $row;

}

function getUser($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM user WHERE sn = '$id' OR live_id = '$id'") or die("Cannot COnnect");
    $row = mysqli_fetch_array($sql);
    return $row;

}



function slug($string)
{
    $string = strtolower($string);
    $string = preg_replace('/\s+/', ' ', $string);
    $string = trim($string);
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

    return rand(11111, 999999) . '-' . $slug;
}



function userName($id, $col = '')
{
    global $db;

    $query = $db->query("SELECT * FROM mdata WHERE sn='$id' ") or die(mysql_error());
    $row = mysqli_fetch_array($query);
    $res = empty($col) ? $row['surname'] . ' ' . $row['firstname'] . ' ' . $row['othername'] : $row[$col];
    return $res;
}


function inviteeName($id, $col = '')
{
    global $db;

    $query = $db->query("SELECT * FROM idata WHERE sn='$id' ") or die(mysql_error());
    $row = mysqli_fetch_array($query);
    $res = empty($col) ? $row['surname'] . ' ' . $row['firstname'] . ' ' . $row['othername'] : $row[$col];
    return $res;
}
function convertName($id, $col = '')
{
    global $db;

    $query = $db->query("SELECT * FROM cdata WHERE sn='$id' ") or die(mysql_error());
    $row = mysqli_fetch_array($query);
    $res = empty($col) ? $row['surname'] . ' ' . $row['firstname'] . ' ' . $row['othername'] : $row[$col];
    return $res;
}

function win_hashs($length)
{
    return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
}
function win_hash($length)
{
    return substr(str_shuffle(str_repeat('123456789', $length)), 0, $length);
}

function sanitize($str)
{
    global $db;
    $res = mysqli_real_escape_string($db, $str);
    return ucwords(strtolower(trim($res)));
}



function sqLx($table, $col, $val, $item)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table WHERE $col='$val' ") or die(mysqli_error());
    $row = mysqli_fetch_assoc($sql);
    return $row[$item];
}
function sqLx2($table, $col, $val, $col2, $val2, $item)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' ") or die(mysqli_error());
    $row = mysqli_fetch_assoc($sql);
    return $row[$item];
}
function sqLx3($table, $col, $val, $col2, $val2, $col3, $val3, $item)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' AND $col3='$val3' ") or die(mysqli_error());
    $row = mysqli_fetch_assoc($sql);
    return $row[$item];
}
function sqLx4($table, $col1, $val1, $col2, $val2, $col3, $val3, $col4, $val4, $item)
{
    global $db;
    $sql = $db->query("SELECT * from $table where $col1='$val1' and $col2='$val2' and $col3='$val3' and $col4='$val4' ");
    $row = mysqli_fetch_assoc($sql);
    return $row[$item];
}

function sqL($table)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table ") or die(mysqli_error());
    return mysqli_num_rows($sql);
}
function sqL1($table, $col, $val)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table WHERE $col='$val' ") or die(mysqli_error());
    return mysqli_num_rows($sql);
}


function sqL2($table, $col, $val, $col2, $val2)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' ") or die(mysqli_error());
    return mysqli_num_rows($sql);
}


function sqL3($table, $col, $val, $col2, $val2, $col3, $val3)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' AND $col3='$val3' ") or die(mysqli_error());
    return mysqli_num_rows($sql);
}

function sqL4($table, $col, $val, $col2, $val2, $col3, $val3, $col4, $val4)
{
    global $db;
    $sql = $db->query("SELECT * FROM $table WHERE $col='$val' AND $col2='$val2' AND $col3='$val3'  AND $col4='$val4' ") or die(mysqli_error());
    return mysqli_num_rows($sql);
}


function sqL5($value, $table, $col, $val)
{
    global $db;
    $sql = $db->query("SELECT $value FROM $table WHERE $col='$val'");
    $row = mysqli_fetch_assoc($sql);
    return $row[$value];
}


function colSum($table, $col)
{
    global $db;
    $sql = $db->query("SELECT SUM($col) AS value_sum FROM $table where sid = SID ");
    $row = mysqli_fetch_assoc($sql);
    return $row['value_sum'];
}



function colSum1($table, $col, $cola, $vala)
{
    global $db;
    $sql = $db->query("SELECT SUM($col) AS value_sum FROM $table WHERE $cola = '$vala' ");
    $row = mysqli_fetch_assoc($sql);
    return $row['value_sum'];
}


function colSum2($table, $col, $cola, $vala, $colb, $valb)
{
    global $db;
    $sql = $db->query("SELECT SUM($col) AS value_sum FROM $table WHERE $cola = '$vala' AND $colb = '$valb' ");
    $row = mysqli_fetch_assoc($sql);
    return $row['value_sum'];
}


function colSum3($table, $col, $cola, $vala, $colb, $valb, $colc, $valc)
{
    global $db;
    $sql = $db->query("SELECT SUM($col) AS value_sum FROM $table WHERE $cola = '$vala' AND $colb = '$valb' AND $colc = '$valc' ");
    $row = mysqli_fetch_assoc($sql);
    return $row['value_sum'];
}

function dTable($body, $sql)
{
    //$body: array of table row elements
    //$sql: database query

    $m = count($body);

    $table = '';
    while ($row = mysqli_fetch_assoc($sql)) {

        $table .= ' <tr>';
        $x = 0;
        while ($x < $m) {
            $y = $x++;
            $b = $row[$body[$y]];
            $table .= '<td>' . $b . '</td>';
        }

        $table .= '</tr>';
    }

    return $table;
}



function Alert()
{
    global $report, $count;

    echo '<script>
        setTimeout(function() {
            $("#refresh").fadeOut(3000);
        }, 3000);
    </script>';
    if ($count > 0) {
        echo '
            <div id="refresh"  class="alert bg-danger" style="position:fixed; top:10px; right:10px; z-index:10000; width: auto;">
			<i class="icon fa fa-ban text-white"> &nbsp;' . $report . '</i></div>';
    } else {
        echo '<div id="refresh"  class="alert bg-success" style="position:fixed; top:10px; right:10px; z-index:10000; width: auto;">
			<i class="icon fa fa-check text-white"> &nbsp;' . $report . '</i></div>';
    }
    return;
}

function valEmpty($field, $fname, $ct)
{
    global $report, $count;
    $field = trim($field);
    if ($field == '') {
        $report .= "<br>" . $fname . " field is required! ";
        $count = 1;
        return;
    } elseif (strlen($field) < $ct) {
        $report .= "<br>" . $fname . " must be at least " . $ct . " characters! ";
        $count = 1;
        return;
    } else {
        return $field;
    }
}

function getCategory($slug)
{
    global $db;

    $sql = $db->query("SELECT * FROM course_categories WHERE slug = '$slug'");
    $row = mysqli_fetch_array($sql);

    return $row;
}




function fileExt($ext)
{
    if ($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png') {
        $res = TRUE;
    } else {
        $res = FALSE;
    }
    return $res;
}


function createThumbnail($sourceImagePath, $destImagePath, $thumbWidth = 50)
{
    $type = exif_imagetype($sourceImagePath);
    if (!$type || !IMAGETYPE_JPEG || !IMAGETYPE_PNG) {
        return null;
    }
    if ($type == IMAGETYPE_PNG) {
        $sourceImage = imagecreatefrompng($sourceImagePath);
        $orgWidth = imagesx($sourceImage);
        $orgHeight = imagesy($sourceImage);
        $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
        $thumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
        // make image transparent
        imagecolortransparent(
            $thumbnail,
            imagecolorallocate(
                $thumbnail,
                0,
                0,
                0
            )
        );
        imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);

        imagepng($thumbnail, $destImagePath);
    } elseif ($type  == IMAGETYPE_JPEG) {
        $sourceImage = imagecreatefromjpeg($sourceImagePath);
        $orgWidth = imagesx($sourceImage);
        $orgHeight = imagesy($sourceImage);
        $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
        $thumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);
        imagejpeg($thumbnail, $destImagePath);
    }
    imagedestroy($sourceImage);
    imagedestroy($thumbnail);
}


function money($money)
{
    return '₦' . number_format($money);
}
