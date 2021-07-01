<?php

    //เชื่อมต่อ Database
    //localhost
    $conn = new mysqli('localhost','root','','villagefund');

    //FTP apps.cpru.ac.th
    // $conn = new mysqli('localhost','root','EhVDcXUwUHND','stock-arit');

       // ตั้งค่าภาษา ให้รองรับภาษาไทย
       $conn->set_charset('utf8'); 
       if ($conn->connect_errno) {// เช็คว่ามีค่า error code หรือเปล่า
           echo "Connect Error :".$conn->connect_error; // แสดงผล error message
           exit(); // จบการทำงานทุกอย่าง (โปรแกรมปิดตัวลง)
       }
       // ถ้าไม่มี error ให้ปล่อยผ่านไม่ต้องแสดงอะไร แต่เอาแค่ค่าไปใช้งาน
    //    $base_path_blog = 'assets/images/blog/';
       // ตั้งค่า timezone
       date_default_timezone_set('Asia/Bangkok');
   ?>
   
