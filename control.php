	<?php


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


  class churchMr
  {

    function __construct()
    {
      if (isset($_POST['LoginUser'])) {
        $this->LoginUser();
      } elseif (array_key_exists('SubmitReport', $_POST)) {
        // $this->SubmitReport();
      } else if (isset($_GET['pid']) && isset($_GET['did'])) {
        echo $this->fetchReport($_GET['pid'], $_GET['did']);
      }
    }


    function LoginUser()
    {
      global $db;
      $username = $_POST['username'];
      $pass = $_POST['password'];


      $ck = $db->query("SELECT * FROM mdata WHERE phone='$username' ") or die('Server error');
      $num = mysqli_num_rows($ck);
      if ($num > 0) {
        $row = mysqli_fetch_array($ck);
        if ($pass == $row['pass']) {
          $mid = $row['sn'];
          $did = $row['did'];
          $gid = $row['gid'];
          $rid = $row['rid'];
          $sid = $row['sid'];
          setcookie('mid', $mid, time() + 86400 * 730, "/");
          setcookie('did', $did, time() + 86400 * 730, "/");
          setcookie('gid', $gid, time() + 86400 * 730, "/");
          setcookie('rid', $rid, time() + 86400 * 730, "/");
          setcookie('sid', $sid, time() + 86400 * 730, "/");
          setcookie('user', $username, time() + 86400 * 730, "/");
          $data = [
            'message' => 'Login Successful',
            'success' => true
          ];
        } else {
          $data = [
            'message' => 'Invalid password',
            'success' => false
          ];
        }
      } else {
        $data = [
          'message' => 'Phone number does not exist',
          'success' => false
        ];
      }

      echo json_encode($data);
    }

    function Mid()
    {
      return $_COOKIE['mid'] ?? header('location:logout.php');
    }
    function Did()
    {
      return $_COOKIE['did'] ?? header('location:logout.php');
    }
    function Gid()
    {
      return $_COOKIE['gid'] ?? header('location:logout.php');
    }
    function Rid()
    {
      return $_COOKIE['rid'] ?? header(' location:logout.php');
    }
    function Sid()
    {
      return $_COOKIE['sid'] ?? header('location:logout.php');
    }


    function submitReport($pid, $a1, $a2, $y1, $y2, $c1, $c2, $vis, $conv, $off, $soff, $rem, $prog, $pdate)
    {
      $mid = $this->Mid();
      $did = $this->Did();
      $gid = $this->Gid();
      $rid = $this->Rid();
      $sid = $this->Sid();
      $ymd = sqLx('progs', 'sn', $pid, 'ymd');
      $dd = sqLx('progs', 'sn', $pid, 'dd');
      $mm = sqLx('progs', 'sn', $pid, 'mm');
      $yy = sqLx('progs', 'sn', $pid, 'yy');

      if (sqL2('report', 'pid', $pid, 'did', $did) == 0) {
        global $db;
        if (empty($a1)) {
          $a1 = 0;
        } else {
          $a1 = $a1;
        }

        if (empty($a2)) {
          $a2 = 0;
        } else {
          $a2 = $a2;
        }

        if (empty($y1)) {
          $y1 = 0;
        } else {
          $y1 = $y1;
        }

        if (empty($y2)) {
          $y2 = 0;
        } else {
          $y2 = $y2;
        }

        if (empty($c1)) {
          $c1 = 0;
        } else {
          $c1 = $c1;
        }

        if (empty($c2)) {
          $c2 = 0;
        } else {
          $c2 = $c2;
        }
        $total = $a1 + $a2 + $y1 + $y2 + $c1 + $c2;
        $sql = $db->query("INSERT INTO report (dd,mm,yy,prog,pdate,total,mid,pid,a1,a2,y1,y2,c1,c2,vis,conv,off,soff,rem,did,gid,rid,sid,ymd)
        VALUES('$dd','$mm','$yy','$prog','$pdate','$total','$mid','$pid', '$a1', '$a2', '$y1', '$y2', '$c1', '$c2', '$vis', '$conv', '$off', '$soff', '$rem' ,'$did', '$gid', '$rid', '$sid', '$ymd')");
      }
      return $this->fetchReport($pid, $did);
    }

    function districMonthlyHistory($did, $mm)
    {
      global $db;
      $table = '';
      $sql = $db->query("SELECT * FROM report WHERE did='$did' AND mm='$mm' ORDER BY dd ");
      while ($row = mysqli_fetch_assoc($sql)) {
        $table .= '<tr><td>' . substr($row['prog'], 0, 3) . ' ' . $row['dd'] . '</td><td>' . ($row['a1'] + $row['a2']) . '</td><td>' . ($row['y1'] + $row['y2']) . '</td><td>' . ($row['c1'] + $row['c2']) . '</td><td>' . $row['total'] . '</td><td>' . $row['off'] . '</td></tr>';
      }
      return  $table;
    }

    function updateReport($sn, $a1, $a2, $y1, $y2, $c1, $c2, $vis, $conv, $off, $soff, $rem)
    {
      global $db;
      if (empty($a1)) {
        $a1 = 0;
      } else {
        $a1 = $a1;
      }

      if (empty($a2)) {
        $a2 = 0;
      } else {
        $a2 = $a2;
      }

      if (empty($y1)) {
        $y1 = 0;
      } else {
        $y1 = $y1;
      }

      if (empty($y2)) {
        $y2 = 0;
      } else {
        $y2 = $y2;
      }

      if (empty($c1)) {
        $c1 = 0;
      } else {
        $c1 = $c1;
      }

      if (empty($c2)) {
        $c2 = 0;
      } else {
        $c2 = $c2;
      }
      $total = $a1 + $a2 + $y1 + $y2 + $c1 + $c2;
      $sql = $db->query("UPDATE report SET a1='$a1', a2='$a2', y1='$y1', y2='$y2', c1='$c1', c2='$c2', vis='$vis', conv='$conv', off='$off', soff='$soff', rem='$rem', total='$total' WHERE sn='$sn'");
      $report = ($sql) ? 'Data successfully updated' : 'Data not updated';
      return $report;
    }


    function
    updateMember($sn, $section, $surname, $firstname, $othername, $sex, $marital, $birthday, $phone, $phone2, $address, $addressarea, $occupation, $email, $office, $academic, $professional, $campus, $faculty, $dept, $level, $school, $class, $student, $vocation, $worker, $designation, $aow, $leader)
    {
      global $db;
      if (empty($marital)) {
        $marital = '';
      } else {
        $marital = $marital;
      }
      if (empty($phone)) {
        $phone = '';
      } else {
        $phone = $phone;
      }
      if (empty($phone2)) {
        $phone2 = '';
      } else {
        $phone2 = $phone2;
      }
      if (empty($occupation)) {
        $occupation = '';
      } else {
        $occupation = $occupation;
      }
      if (empty($email)) {
        $email = '';
      } else {
        $email = $email;
      }
      if (empty($office)) {
        $office = '';
      } else {
        $office = $office;
      }
      if (empty($academic)) {
        $academic = '';
      } else {
        $academic = $academic;
      }
      if (empty($professional)) {
        $professional = '';
      } else {
        $professional = $professional;
      }
      if (empty($campus)) {
        $campus = '';
      } else {
        $campus = $campus;
      }
      if (empty($faculty)) {
        $faculty = '';
      } else {
        $faculty = $faculty;
      }
      if (empty($dept)) {
        $dept = '';
      } else {
        $dept = $dept;
      }
      if (empty($level)) {
        $level = '';
      } else {
        $level = $level;
      }
      if (empty($school)) {
        $school = '';
      } else {
        $school = $school;
      }
      if (empty($class)) {
        $class = '';
      } else {
        $class = $class;
      }
      if (empty($student)) {
        $student = '';
      } else {
        $student = $student;
      }
      if (empty($vocation)) {
        $vocation = '';
      } else {
        $vocation = $vocation;
      }
      if (empty($worker)) {
        $worker = '';
      } else {
        $worker = $worker;
      }
      if (empty($designation)) {
        $designation = '';
      } else {
        $designation = $designation;
      }
      if (empty($aow)) {
        $aow = '';
      } else {
        $aow = $aow;
      }
      if (empty($leader)) {
        $leader = '';
      } else {
        $leader = $leader;
      }
      $sql = $db->query("UPDATE mdata SET section='$section', surname='$surname', firstname='$firstname', othername='$othername', sex='$sex', marital='$marital',
      birthday='$birthday', phone='$phone', phone2='$phone2', address='$address', addressarea='$addressarea', occupation='$occupation', email='$email', office='$office', academic='$academic', professional='$professional', campus='$campus', faculty='$faculty', dept='$dept', level='$level',
       school='$school', class='$class', student='$student', vocation='$vocation', worker='$worker', designation='$designation', aow='$aow', leader='$leader' WHERE sn='$sn'");
      $report = ($sql) ? 'Data successfully updated' : 'Data not updated';
      return $report;
    }



    function
    updateInvitee($sn, $surname, $firstname, $othername, $sex,  $phone, $address, $ref, $age)
    {
      global $db;
      if (empty($phone)) {
        $phone = '';
      } else {
        $phone = $phone;
      }
      if (empty($surname)) {
        $surname = '';
      } else {
        $surname = $surname;
      }
      if (empty($firstname)) {
        $firstname = '';
      } else {
        $firstname = $firstname;
      }
      if (empty($othername)) {
        $othername = '';
      } else {
        $othername = $othername;
      }
      if (empty($ref)) {
        $ref = '';
      } else {
        $ref = $ref;
      }
      if (empty($sex)) {
        $sex = '';
      } else {
        $sex = $sex;
      }
      if (empty($age)) {
        $age = '';
      } else {
        $age = $age;
      }
      if (empty($address)) {
        $address = '';
      } else {
        $address = $address;
      }
      $sql = $db->query("UPDATE idata SET  surname='$surname', firstname='$firstname', othername='$othername', sex='$sex', age='$age', address='$address', phone='$phone', ref='$ref' WHERE sn='$sn'");
      $report = ($sql) ? 'Data successfully updated' : 'Data not updated';
      return $report;
    }
    function
    updateConvert($sn, $surname, $firstname, $othername, $sex,  $phone, $address, $age)
    {
      global $db;
      if (empty($phone)) {
        $phone = '';
      } else {
        $phone = $phone;
      }
      if (empty($surname)) {
        $surname = '';
      } else {
        $surname = $surname;
      }
      if (empty($firstname)) {
        $firstname = '';
      } else {
        $firstname = $firstname;
      }
      if (empty($othername)) {
        $othername = '';
      } else {
        $othername = $othername;
      }
      if (empty($sex)) {
        $sex = '';
      } else {
        $sex = $sex;
      }
      if (empty($age)) {
        $age = '';
      } else {
        $age = $age;
      }
      if (empty($address)) {
        $address = '';
      } else {
        $address = $address;
      }
      $sql = $db->query("UPDATE cdata SET  surname='$surname', firstname='$firstname', othername='$othername', sex='$sex', age='$age', address='$address', phone='$phone' WHERE sn='$sn'");
      $report = ($sql) ? 'Data successfully updated' : 'Data not updated';
      return $report;
    }


    function fetchReportHistory($did)
    {
      global $db;
      $array = [];
      $sql = $db->query("SELECT pid,a1,a2,y1,y2,c1,c2,vis,conv,off,soff,rem FROM report WHERE did = '$did' ORDER BY sn DESC LIMIT 10");
      while ($row = mysqli_fetch_assoc($sql)) {
        $array[] = $row;
      }

      $data = array('data' => $array);
      return json_encode($data);
    }

    function addAdult($section, $surname, $firstname, $othername, $sex, $marital, $birthday, $phone, $phone2, $address, $addressarea, $occupation, $email, $office, $academic, $professional, $campus, $faculty, $dept, $level, $school, $class, $student, $vocation, $worker, $designation, $aow, $leader)
    {
      global $db;
      if (empty($marital)) {
        $marital = '';
      } else {
        $marital = $marital;
      }
      if (empty($phone)) {
        $phone = '';
      } else {
        $phone = $phone;
      }
      if (empty($phone2)) {
        $phone2 = '';
      } else {
        $phone2 = $phone2;
      }
      if (empty($occupation)) {
        $occupation = '';
      } else {
        $occupation = $occupation;
      }
      if (empty($email)) {
        $email = '';
      } else {
        $email = $email;
      }
      if (empty($office)) {
        $office = '';
      } else {
        $office = $office;
      }
      if (empty($academic)) {
        $academic = '';
      } else {
        $academic = $academic;
      }
      if (empty($professional)) {
        $professional = '';
      } else {
        $professional = $professional;
      }
      if (empty($campus)) {
        $campus = '';
      } else {
        $campus = $campus;
      }
      if (empty($faculty)) {
        $faculty = '';
      } else {
        $faculty = $faculty;
      }
      if (empty($dept)) {
        $dept = '';
      } else {
        $dept = $dept;
      }
      if (empty($level)) {
        $level = '';
      } else {
        $level = $level;
      }
      if (empty($school)) {
        $school = '';
      } else {
        $school = $school;
      }
      if (empty($class)) {
        $class = '';
      } else {
        $class = $class;
      }
      if (empty($student)) {
        $student = '';
      } else {
        $student = $student;
      }
      if (empty($vocation)) {
        $vocation = '';
      } else {
        $vocation = $vocation;
      }
      if (empty($worker)) {
        $worker = '';
      } else {
        $worker = $worker;
      }
      if (empty($designation)) {
        $designation = '';
      } else {
        $designation = $designation;
      }
      if (empty($aow)) {
        $aow = '';
      } else {
        $aow = $aow;
      }
      if (empty($leader)) {
        $leader = '';
      } else {
        $leader = $leader;
      }
      $did = $this->Did();
      $gid = $this->Gid();
      $rid = $this->Rid();
      $sid = $this->Sid();

      $sql = $db->query("INSERT INTO mdata(sid, rid, gid, did, section, surname,firstname,othername,sex, marital, birthday, phone, phone2, address, addressarea, occupation, email, office, academic,professional, campus, faculty, dept, level, school, class, student, vocation, worker, designation,aow, leader)
      VALUES('$sid', '$rid', '$gid', '$did','$section','$surname','$firstname', '$othername', '$sex', '$marital', '$birthday','$phone', '$phone2', '$address', '$addressarea', '$occupation', '$email', '$office','$academic', '$professional','$campus', '$faculty', '$dept', '$level', '$school', '$class', '$student', '$vocation', '$worker','$designation', '$aow', '$leader' )");
    }


    function addInvitee($surname, $firstname, $othername, $sex, $age, $phone, $address, $ref)
    {
      global $db;
      if (empty($surname)) {
        $surname = '';
      } else {
        $surname = $surname;
      }
      if (empty($firstname)) {
        $firstname = '';
      } else {
        $firstname = $firstname;
      }
      if (empty($othername)) {
        $othername = '';
      } else {
        $othername = $othername;
      }
      if (empty($sex)) {
        $sex = '';
      } else {
        $sex = $sex;
      }
      if (empty($age)) {
        $age = '';
      } else {
        $email = $age;
      }
      if (empty($phone)) {
        $phone = '';
      } else {
        $phone = $phone;
      }
      if (empty($address)) {
        $address = '';
      } else {
        $address = $address;
      }
      if (empty($ref)) {
        $ref = '';
      } else {
        $ref = $ref;
      }
      $did = $this->Did();
      $gid = $this->Gid();
      $rid = $this->Rid();
      $sid = $this->Sid();

      $sql = $db->query("INSERT INTO idata(sid, rid, gid, did, surname,firstname,othername,sex, age, phone, address, ref)
      VALUES('$sid', '$rid', '$gid', '$did','$surname','$firstname', '$othername', '$sex', '$age', '$phone','$address', '$ref' )");
    }



    function addConvert($surname, $firstname, $othername, $sex, $age, $phone, $address, $ref)
    {
      global $db;
      if (empty($surname)) {
        $surname = '';
      } else {
        $surname = $surname;
      }
      if (empty($firstname)) {
        $firstname = '';
      } else {
        $firstname = $firstname;
      }
      if (empty($othername)) {
        $othername = '';
      } else {
        $othername = $othername;
      }
      if (empty($sex)) {
        $sex = '';
      } else {
        $sex = $sex;
      }
      if (empty($age)) {
        $age = '';
      } else {
        $email = $age;
      }
      if (empty($phone)) {
        $phone = '';
      } else {
        $phone = $phone;
      }
      if (empty($address)) {
        $address = '';
      } else {
        $address = $address;
      }
      if (empty($ref)) {
        $ref = '';
      } else {
        $ref = $ref;
      }
      $did = $this->Did();
      $gid = $this->Gid();
      $rid = $this->Rid();
      $sid = $this->Sid();

      $sql = $db->query("INSERT INTO cdata(sid, rid, gid, did, surname,firstname,othername,sex, age, phone, address)
      VALUES('$sid', '$rid', '$gid', '$did','$surname','$firstname', '$othername', '$sex', '$age', '$phone','$address' )");
    }



    function fetchReportHistoryPid($pid)
    {
      global $db;
      $array = [];
      $sql = $db->query("SELECT did,a1,a2,y1,y2,c1,c2,vis,conv,off,soff,rem FROM report WHERE pid = '$pid' ORDER BY sn DESC LIMIT 10");
      while ($row = mysqli_fetch_assoc($sql)) {
        $array[] = $row;
      }

      $data = array('data' => $array);
      $res = json_encode($data);
      return json_decode($res, true);
    }


    function fetchMigrate($sn)
    {
      global $db;
      $sql = $db->query("SELECT * FROM mdata WHERE sn = '$sn'");
      $row = mysqli_fetch_assoc($sql);
      if (mysqli_num_rows($sql) > 0) {
  ?>
	      <div class="modal-body">
	        <div class="form-group basic">
	          <div class="input-wrapper">
	            <b>
	              <center>Migrate <?= $row['surname'] ?></center>
	            </b><br>
	            <label class="label" for="section">To:</label>
	            <select id="migrateTo" class="form-control custom-select">
	              <option selected disabled>Select Destination</option>
	              <?php
                $sql = $db->query("SELECT * FROM district ORDER BY district");
                while ($row = mysqli_fetch_assoc($sql)) :
                ?>
	                <option value="<?= $row['sn'] ?>"><?= $row['district'] ?></option>
	              <?php endwhile ?>
	            </select>
	            <div class="col-12">
	              <div class="form-group basic animated">
	                <div class="input-wrapper">
	                  <label class="label" for="address1">Reason<span> *</span></label>
	                  <textarea name="migrateReason" type="text" class="address1 form-control" id="migrateReason" placeholder="Reason for migration" required></textarea>
	                  <em class="clear-input">
	                    <ion-icon name="close-circle"></ion-icon>
	                  </em>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <div class="btn-inline">
	          <a href="javascript:;" class="btn" data-dismiss="modal">CLOSE</a>
	          <a href="javascript:;" onclick="migrateUser(<?= $sn ?>)" class="btn">MIGRATE</a>
	        </div>
	      </div>
	<?php }
    }


    function fetchngid($ndid)
    {
      global $db;
      $sqlstr = "SELECT * FROM district WHERE sn = '$ndid'";
      $stmt = $db->prepare($sqlstr);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      $data = array('data' => $row);
      return json_encode($data);
    }


    function migrate($sn, $ndid, $reason, $ngid, $ndis, $ngroup)
    {
      global $db;
      $did = $this->Did();
      $gid = $this->Gid();
      $rid = $this->Rid();
      $sid = $this->Sid();
      $sql = $db->query("SELECT * FROM district WHERE sn = '$did'");
      $row = mysqli_fetch_assoc($sql);
      $ogroup = $row['zone'];
      $odis = $row['district'];
      $ymd = date('ymd');
      $sql = $db->query("UPDATE mdata SET did='$ndid' WHERE sn='$sn'");
      $report = ($sql) ? 'Data successfully updated' : 'Data not updated';

      $name = userName($sn);
      $sql = $db->query("INSERT INTO migrate(ymd,ndis,ngroup,ogroup,odis,ngid,sid, rid, name, regno,odid, ndid, ogid,reason) VALUES('$ymd','$ndis','$ngroup','$ogroup','$odis','$ngid','$sid', '$rid', '$name', '$sn','$did','$ndid','$gid', '$reason' )");
      return $report;
    }





    function fetchReport($pid, $did)
    {
      global $db;
      $sql = $db->query("SELECT pid,a1,a2,y1,y2,c1,c2,vis,conv,off,soff,rem,prog,pdate FROM report WHERE pid = '$pid' && did = '$did'");
      $row = mysqli_fetch_assoc($sql);

      $data = array('data' => $row);
      $res = json_encode($data);
      return $res;
    }


    function viewImage($sn, $type = 1)
    {
      global $db;
      $sql = $db->query("SELECT image FROM mdata WHERE sn = '$sn'");
      $row = mysqli_fetch_assoc($sql);
      return $type == 1 ? 'userImages/xs' . $row['image'] : 'userImages/' . $row['image'];
    }





    function fileExt($name)
    {
      $ext = pathinfo($name, PATHINFO_EXTENSION);
      if ($ext == '.jpg' or $ext == '.JPG' or '.JPEG' or $ext == '.jpeg' or $ext == '.png' or $ext == '.PNG') {
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
        // $sourceImage = imagecreatefromjpeg($sourceImagePath);
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




    // function UpdateImage($sn, $image)
    // {
    //   global $db, $report, $count;
    //   // $sn = $_POST['sn'];
    //   $name = $image; //$_FILES['file']['name'];
    //   $img_tmp = $_FILES['file']['tmp_name'];
    //   $name2 = win_hashs(12) . '.' . pathinfo($name, PATHINFO_EXTENSION);
    //   define('upload', '/userImages/');
    //   if ($this->fileExt($name) == TRUE) {

    //     $this->createThumbnail($img_tmp, upload . $name2, 400);
    //     $this->createThumbnail($img_tmp, upload . 'xs' . $name2, 80);
    //     $sql = $db->query("UPDATE mdata SET image='$name2' WHERE sn='$sn' ");
    //     $report = 'Profile Photo Successfully Submitted!';
    //   } else {
    //     $report = 'Operation failed, could not upload Photograph. Invalid file format';
    //     $count = 1;
    //   }

    //   return;
    // }










    function UpdateImage($sn, $image)
    {
      global $db;
      $sql = $db->query("UPDATE mdata SET image='$image' WHERE sn='$sn' ");
    }





    // function fetchReport($pid, $did)
    // {
    //   global $db;
    //   $sql = $db->query("SELECT pid,a1,a2,y1,y2,c1,c2,vis,conv,off,soff,rem FROM report WHERE pid = '$pid' && did = '$did'");
    //   $tb = "";
    //   while ($row = mysqli_fetch_assoc($sql)) {
    //     $a1 = $row['a1'];
    //     $a2 = $row['a2'];
    //     $y1 = $row['y1'];
    //     $y2 = $row['y2'];
    //     $c1 = $row['c1'];
    //     $c2 = $row['c2'];
    //     $tb .= "<tr>";
    //     $tb .= "<td>$a1</td>";
    //     $tb .= "<td>$a2</td>";
    //     $tb .= "<td>$y1</td>";
    //     $tb .= "<td>$y2</td>";
    //     $tb .= "<td>$c1</td>";
    //     $tb .= "<td>$c2</td>";
    //     $tb .= "</tr>";
    //   }
    //   return $tb;
    // }
  }






  $pro = new churchMr;

  if (isset($_COOKIE['mid'])) {
    $mid = $pro->Mid();
    $did = $pro->Did();
    $gid = $pro->Gid();
    $rid = $pro->Rid();
    $sid = $pro->Gid();
    $sid = $pro->Gid();
  }


  //echo '<h1>' . $mid . '</h1>';
  // echo $pro->submitUpdateReport(1, 2, 3, 4, 5, 6, 7, 8, 9, 12, 122, 1233);
  // echo $pro->fetchReport(1, 2);




  ?>