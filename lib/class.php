<?php

class Lentoria
{
    function __construct()
    {
        if (array_key_exists('addCategory', $_POST)) {
            $this->addCategory();
        } elseif (array_key_exists('addSubCategory', $_POST)) {
            $this->addSubCategory();
        } elseif (array_key_exists('editSubCategory', $_POST)) {
            $this->editSubCategory();
        } elseif (array_key_exists('editCategory', $_POST)) {
            $this->editCategory();
        } elseif (array_key_exists('editModule', $_POST)) {
            $this->editModule();
        } elseif (array_key_exists('editIntro', $_POST)) {
            $this->editCourseIntro();
        } elseif (array_key_exists('editPrice', $_POST)) {
            $this->editPrice();
        } elseif (array_key_exists('editMedia', $_POST)) {
            $this->editMedia();
        } elseif (array_key_exists('addCourse', $_POST)) {
            $this->addCourse();
        } elseif (array_key_exists('addContent', $_POST)) {
            $this->addContent();
        } elseif (array_key_exists('addModule', $_POST)) {
            $this->addModule();
        } elseif (array_key_exists('addTopic', $_POST)) {
            $this->addTopic();
        } elseif (array_key_exists('addFaq', $_POST)) {
            $this->addFaq();
        } elseif (array_key_exists('editContent', $_POST)) {
            $this->editContent();
        } elseif (array_key_exists('loginUser', $_POST)) {
            $this->login();
        } elseif (array_key_exists('signupDetails', $_POST)) {
            $this->signupDetails();
        } elseif (isset($_GET['getCategoryTopics'])) {
            echo json_encode($this->getCategoryTopics($_GET['getCategoryTopics']));
        } elseif (isset($_GET['getTopicInfo'])) {
            echo json_encode($this->getTopicInfo($_GET['getTopicInfo']));
        }
    }


    function signupDetails()
    {
        global $db;
        $fname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $id = $_POST['id'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];


        $db->query(" INSERT INTO user(live_id)
             VALUES('$id') ") or die('cannot connect to serve');
        $_SESSION['user_id'] = getUser($id)['sn'];


        $data = [
            'id' => $_SESSION['user_id'],
            'live_id' => $id,
            'firstname' => $fname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'password' => $_POST['password'],
        ];

        $_SESSION['user_info'] = $data;

        echo json_encode([
            'message' => 'Sucessfully Registered',
            'success' => true
        ]);
    }
    function login()
    {
        global $db;
        $fname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $id = $_POST['id'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $sql = $db->query("SELECT * FROM user WHERE live_id = '$id' ");
        if (mysqli_num_rows($sql) > 0) {
            $_SESSION['user_id'] = getUser($id)['sn'];
        } else {
            $db->query(" INSERT INTO user(live_id)
             VALUES('$id') ") or die('cannot connect to serve');
            $_SESSION['user_id'] = getUser($id)['sn'];
        }

        $data = [
            'id' => $_SESSION['user_id'],
            'live_id' => $id,
            'firstname' => $fname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'img' => $_POST['img'],
        ];

        $_SESSION['user_info'] = $data;

        echo json_encode([
            'message' => 'Sucessfully Logged in',
            'success' => true
        ]);
    }



    function editModule()
    {
        global $db, $report, $count;
        $module_title = addslashes(valEmpty($_POST['module_title'], 'Title', 3));
        $description = addslashes(valEmpty($_POST['description'], 'Description', 5));
        $sn = $_POST['sn'];

        if (!isset($count)) {
            $sql = $db->query("UPDATE course_modules SET title='$module_title',  description='$description'
            WHERE sn=$sn ") or die('cannot connect');
            $report = ($sql) ? 'Module has been Updated' : 'Error Updating Module';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }


    function editContent()
    {
        global $db, $report, $count;

        $video_url = addslashes(valEmpty($_POST['video_url'], 'Topic', 3));
        $content_title = addslashes(valEmpty($_POST['content_title'], 'Title', 3));
        $notes = addslashes(valEmpty($_POST['notes'], 'Notes', 10));
        $slug = slug($content_title);
        $sn = $_POST['sn'];
        $resources = $_POST['resources'];


        if (!isset($count)) {
            $sql = $db->query("UPDATE course_topics SET title='$content_title', slug='$slug',  video_url='$video_url', notes='$notes',
             resources='$resources' WHERE sn=$sn ") or die('cannot connect');
            $report = ($sql) ? 'Topic has been Updated' : 'Error Updating Topic';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }



    function addContent()
    {
        global $db, $report, $count;

        $video_url = addslashes(valEmpty($_POST['vimeo_embed_url'], 'Topic', 3));
        $content_title = addslashes(valEmpty($_POST['content_title'], 'Title', 3));
        $notes = addslashes(valEmpty($_POST['notes'], 'Notes', 10));
        $slug = slug($content_title);

        $resources = $_POST['resources'];
        $module_id = $_POST['module_id'];

        if (!isset($count)) {
            $sql = $db->query("INSERT INTO course_topics (title, slug, module_id,  video_url, notes, resources, created_at)
             VALUE('$content_title', '$slug', '$module_id','$video_url', '$notes', '$resources', now()) ") or die('cannot connect');
            $report = ($sql) ? 'Content has been added' : 'Error adding Content';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }




    function editMedia()
    {
        global $db, $report, $count;

        $image = $_FILES['image'];
        $video_url = $_POST['video_url'];
        $sn = $_POST['sn'];



        if ($image['name']) {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $name = 'cover_image' . time() . rand(11111, 999999) . '.' . $ext;
            $dest_path = '../assets/images/course/' . $name;
            move_uploaded_file($image['tmp_name'], $dest_path);
        } else {
            $name = $_POST['former_image'];
        }




        if (!isset($count)) {
            $sql = $db->query("UPDATE course_introductions SET image_url = '$name', video_url = '$video_url'
                    WHERE sn = '$sn'
                    ");

            $report = ($sql) ? 'Media has been updated' : 'Error updating Media';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }


    function editPrice()
    {
        global $db, $report, $count;

        $price = valEmpty($_POST['price'], 'Price', 2);
        $false_price = valEmpty($_POST['false_price'], 'False Price', 2);

        $sn = $_POST['sn'];





        if (!isset($count)) {
            $sql = $db->query("UPDATE courses SET price = '$price', false_price = '$false_price'
                    WHERE sn = '$sn'
                    ");

            $report = ($sql) ? 'Price has been updated' : 'Error updating Price';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }

    function editCourseIntro()
    {
        global $db, $report, $count;

        $intro = valEmpty($_POST['intro'], 'Intro', 3);

        $sn = $_POST['sn'];





        if (!isset($count)) {
            $sql = $db->query("UPDATE course_introductions SET body= '$intro'
                    WHERE sn = '$sn'
                    ");

            $report = ($sql) ? 'Content has been updated' : 'Error updating Content';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }

    function addFaq()
    {
        global $db, $report, $count;

        $questions = valEmpty($_POST['question'], 'FAQ', 3);
        $answers = valEmpty($_POST['answer'], 'Answers', 3);

        $courseId = $_POST['courseId'];
        $slug = slug($courseId);



        if (!isset($count)) {
            $sql = $db->query("INSERT INTO course_faq (course_id, slug, questions, answers, created_at)
             VALUE('$courseId', '$slug', '$questions', '$answers', now()) ") or die('cannot connect');

            $report = ($sql) ? 'FAQ has been added' : 'Error adding FAQ';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }



    function addTopic()
    {
        global $db, $report, $count;

        $title = valEmpty($_POST['title'], 'Topic', 3);
        $slug = slug($title);
        $description = valEmpty($_POST['description'], 'Description', 3);
        $moduleId = $_POST['moduleId'];


        if (!isset($count)) {
            $sql = $db->query("INSERT INTO course_topics (title, slug, description, module_id, created_at)
             VALUE('$title', '$slug', '$description', '$moduleId', now()) ") or die('cannot connect');

            $report = ($sql) ? 'Topic has been added' : 'Error adding Topic';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }


    function addModule()
    {
        global $db, $report, $count;

        $title = valEmpty($_POST['title'], 'Module', 3);
        $slug = slug($title);
        $description = addslashes(valEmpty($_POST['description'], 'Description', 3));
        $courseId = $_POST['courseId'];




        if (!isset($count)) {
            $sql = $db->query("INSERT INTO course_modules (title, slug, description, course_id, created_at)
             VALUE('$title', '$slug', '$description', '$courseId', now()) ") or die('cannot connect');

            $report = ($sql) ? 'Module has been added' : 'Error adding Module';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }



    function getTopicInfo($topic_id)
    {
        global $db;
        $sql = $db->query("SELECT sn,title,description FROM category_topics WHERE sn = $topic_id  ");
        $cat_info = mysqli_fetch_array($sql);
        $data["info"] = $cat_info;
        return $data;
    }

    function getCategoryTopics($category_id)
    {
        global $db;
        $sql = $db->query("SELECT * FROM category_topics WHERE category_id = $category_id  ");
        $sql2 = $db->query("SELECT sn,title,description FROM course_categories WHERE sn = $category_id  ");
        $cat_info = mysqli_fetch_array($sql2);
        $dat = [];
        while ($row = mysqli_fetch_array($sql)) {
            $dat[] = $row;
        }

        $data["topics"] = $dat;
        $data["info"] = $cat_info;
        return $data;
    }

    function addCategory()
    {
        global $db, $report, $count;

        $title = valEmpty($_POST['title'], 'Category', 3);
        $slug = slug($title);
        $description = valEmpty($_POST['description'], 'Description', 3);
        $status = $_POST['status'];

        $ck = $db->query("SELECT * FROM course_categories WHERE title='$title' ");
        $co = mysqli_num_rows($ck);

        if ($co > 0) {
            $report = 'Category Already exist';
            $count = 1;
        }

        if (!isset($count)) {
            $sql = $db->query("INSERT INTO course_categories (title, slug, description, status, created_at)
             VALUE('$title', '$slug', '$description', '$status', now()) ") or die('cannot connect');

            $report = ($sql) ? 'Category has been added' : 'Error adding Category';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }

    function addCourse()
    {
        global $db, $report, $count, $uid;

        $title = valEmpty($_POST['title'], 'Course Title', 3);
        $slug = slug($title);
        $description = addslashes(valEmpty($_POST['courseDescription'], 'Description', 3));
        $level = valEmpty($_POST['courseLevel'], 'Level', 2);
        $courseCategory = valEmpty($_POST['courseCategory'], 'Category', 1);
        $courseSubCategory = valEmpty($_POST['courseSubCategory'], 'Sub Category', 1);
        $price = valEmpty($_POST['price'], 'Price', 2);
        $false_price = valEmpty($_POST['false_price'], 'False Price', 2);

        $video = addslashes(valEmpty($_POST['videoUrl'], 'Video Url', 2));
        $img = $_FILES['coverimg'];
        $introduction = addslashes($_POST['introduction']);
        $ext = pathinfo($img['name'], PATHINFO_EXTENSION);

        if (!isset($count)) {
            if (fileExt($ext)) {
                $newImageName = 'course_cover_image' . time() . $this->uid() . rand(1111, 99999) . '.' . $ext;
                move_uploaded_file($img['tmp_name'], '../assets/images/course/' . $newImageName);

                $sql = $db->query(" INSERT INTO courses (title,slug,description, false_price, price,
                difficulty,user_id,category_id,category_topic_id, image , created_at) 
                VALUES ('$title', '$slug', '$description', '$false_price', '$price', '$level', '$uid', '$courseCategory', '$courseSubCategory', '$newImageName', now() ) ") or die('first insert');

                $flic = $db->query("SELECT * FROM courses WHERE slug='$slug' ") or die('first select');
                $data = mysqli_fetch_object($flic);

                $sql = $db->query("INSERT INTO course_introductions (body,course_id,user_id,video_url,image_url,created_at)
                VALUES('$introduction', '$data->sn', '$uid', '$video', '$newImageName', now() ) ") or die('second insert');

                $report = ($sql) ? 'Course has been Created' : 'Error creating course';
                $count = ($sql) ?  0 : 1;
            } else {
                $report = 'Please upload an image file';
                $count = 1;
                print_r('bad extension');
            }
        }

        return;
    }


    function addSubCategory()
    {
        global $db, $report, $count;

        $title = valEmpty($_POST['title'], 'Category', 3);
        $slug = slug($title);
        $description = addslashes(valEmpty($_POST['description'], 'Description', 3));

        $category = $_POST['category_id'];

        $ck = $db->query("SELECT * FROM category_topics WHERE title='$title' ");
        $co = mysqli_num_rows($ck);

        if ($co > 0) {
            $report = 'Sub-Category Already exist';
            $count = 1;
        }

        if (!isset($count)) {
            $sql = $db->query("INSERT INTO category_topics (title, slug, description, category_id, created_at)
             VALUE('$title', '$slug', '$description', '$category', now()) ") or die('cannot connect');

            $report = ($sql) ? 'Sub-Category has been added' : 'Error adding Sub-Category';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }

    function editCategory()
    {
        global $db, $report, $count;

        $title = valEmpty($_POST['title'], 'Category', 3);

        $slug = slug($title);
        $sn = $_POST['sn'];

        $description = valEmpty($_POST['description'], 'Description', 3);


        $ck = $db->query("SELECT * FROM course_categories WHERE title='$title' ");
        $co = mysqli_num_rows($ck);

        if ($co > 1) {
            $report = 'Category Already exist';
            $count = 1;
        }

        if (!isset($count)) {
            $sql = $db->query("UPDATE course_categories SET title= '$title', slug= '$slug', description= '$description'
                    WHERE sn= '$sn'
                    ");

            $report = ($sql) ? 'Category has been updated' : 'Error updating Category';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }

    function editSubCategory()
    {
        global $db, $report, $count;

        $title = valEmpty($_POST['title'], 'Sub Category', 3);

        $slug = slug($title);
        $sn = $_POST['sn'];

        $description = valEmpty($_POST['description'], 'Description', 3);


        $ck = $db->query("SELECT * FROM category_topics WHERE title='$title' ");
        $co = mysqli_num_rows($ck);

        if ($co > 1) {
            $report = 'Sub-Category Already exist';
            $count = 1;
        }

        if (!isset($count)) {
            $sql = $db->query("UPDATE category_topics SET title= '$title', slug= '$slug', description= '$description'
                    WHERE sn= '$sn'
                    ");

            $report = ($sql) ? 'Sub-Category has been updated' : 'Error updating Sub-Category';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }



    function editCourse()
    {
        global $db, $report, $count;

        $title = valEmpty($_POST['title'], 'Sub Category', 3);

        $slug = slug($title);
        $sn = $_POST['sn'];

        $description = valEmpty($_POST['description'], 'Description', 3);


        $ck = $db->query("SELECT * FROM category_topics WHERE title='$title' ");
        $co = mysqli_num_rows($ck);

        if ($co > 1) {
            $report = 'Sub-Category Already exist';
            $count = 1;
        }

        if (!isset($count)) {
            $sql = $db->query("UPDATE category_topics SET title= '$title', slug= '$slug', description= '$description'
                    WHERE sn= '$sn'
                    ");

            $report = ($sql) ? 'Sub-Category has been updated' : 'Error updating Sub-Category';
            $count = ($sql) ?  0 : 1;
        }

        return;
    }




    function uid()
    {
        return $_SESSION['user_id'] ?? 0;
    }


    function checkLogin()
    {
        if ($this->uid() == 0) {
            header('location: ../login.php');
        } else {
        }
    }
}


$ltr = new Lentoria;

$uid = $ltr->uid();
