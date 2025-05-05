<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/School.php";

class User extends School
{
    protected $database;
    protected $fname;
    protected $lname;
    protected $mname;
    protected $address;
    protected $dob;
    protected $email;
    private $phone;
    protected $password;
    protected $gender;
    private $role;
    protected $profile_img;
    protected $unique_id;
    private $userIP;
    private $user_browser;
    private $platform;
    private $device_type;
    private $login_time;
    private $login_status;

    public function __construct(Database $database)
    {
        $this->database = $database->getConnection();
    }
    public function set_unique_id($unique_id)
    {
        $this->unique_id = $unique_id;
    }
    public function get_unique_id()
    {
        return $this->unique_id;
    }
    public function set_fname($fname)
    {
        $this->fname = $fname;
    }
    public function set_lname($lname)
    {
        $this->lname = $lname;
    }
    public function set_mname($mname)
    {
        $this->mname = $mname;
    }
    public function set_address($address)
    {
        $this->address = $address;
    }
    public function set_dob($dob)
    {
        $this->dob = $dob;
    }
    public function set_gender($gender)
    {
        $this->gender = $gender;
    }
    public function get_fname()
    {
        return $this->fname;
    }
    public function get_mname()
    {
        return $this->mname;
    }
    public function get_lname()
    {
        return $this->lname;
    }
    public function get_address()
    {
        return $this->address;
    }
    public function get_dob()
    {
        return $this->dob;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function get_email()
    {
        return $this->email;
    }

    public function set_phone($phone)
    {
        $this->phone = $phone;
    }
    public function get_phone()
    {
        return $this->phone;
    }
    public function set_password($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function get_gender()
    {
        return $this->gender;
    }

    public function get_password()
    {
        return $this->password;
    }
    public function set_role($role)
    {
        $this->role = $role;
    }
    public function get_role()
    {
        return $this->role;
    }
    public function set_profile($profile_img)
    {
        $this->profile_img = $profile_img;
    }
    public function get_profile()
    {
        return $this->profile_img;
    }
    public function set_userIP($userIP)
    {
        $this->userIP = $userIP;
    }
    public function get_userIP()
    {
        return $this->userIP;
    }
    public function set_user_browser($user_browser)
    {
        $this->user_browser = $user_browser;
    }
    public function get_user_browser()
    {
        return $this->user_browser;
    }
    public function set_platform($platform)
    {
        $this->platform = $platform;
    }
    public function get_platform()
    {
        return $this->platform;
    }
    public function set_device_type($device_type)
    {
        $this->device_type = $device_type;
    }
    public function get_device_type()
    {
        return $this->device_type;
    }
    public function set_login_time($login_time)
    {
        $this->login_time = $login_time;
    }
    public function get_login_time()
    {
        return $this->login_time;
    }
    public function set_login_status($login_status)
    {
        $this->login_status = $login_status;
    }
    public function get_login_status()
    {
        return $this->login_status;
    }
    public function is_user_present($email)
    {
        $sql = "SELECT * FROM users WHERE email_address = ?";
        return $this->database->execute_query(query: $sql, params: [$email])->num_rows > 0;
    }

    public function get_user_by_id($user_id)
    {
        $sql = "SELECT * FROM users WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$user_id])->fetch_assoc();
    }
    public function get_all_users()
    {
        $sql = "SELECT * FROM users WHERE role != ? AND school_id = ?";
        return $this->database->execute_query(query: $sql, params: ['deleted', $this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }
    public function updade_password($password, $email)
    {
        $sql = "UPDATE users SET password = ? WHERE email_address = ?";
        return $this->database->execute_query(query: $sql, params: [$password, $email]);
    }
    public function add_user($unique_id, $fname, $lname, $email, $gender, $password, $profile, $role, $subject_tought, $school_id)
    {
        $sql = "INSERT INTO users(unique_id, first_name, last_name, email_address, gender, password, profile_image, role, subject_tought, school_id)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query($sql, [$unique_id, $fname, $lname, $email, $gender, $password, $profile, $role, $subject_tought, $school_id]);
    }
    public function updade_user($fname, $lname, $email, $gender, $user_id)
    {
        $sql = "UPDATE users SET first_name  = ?, last_name = ?, email_address= ?, gender = ? WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$fname, $lname, $email, $gender, $user_id]);
    }
    public function user_role($email)
    {
        $sql = "SELECT role FROM users WHERE email_address = ?";
        return $this->database->execute_query($sql, [$email])->fetch_assoc();
    }
    public function get_admins()
    {
        $sql = "SELECT * FROM users WHERE role = ? AND school_id = ?";
        return $this->database->execute_query($sql, ['admin', $this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_teachers()
    {
        $sql = "SELECT * FROM users WHERE (role = 'teacher' OR role = 'admin') AND school_id = ? ";
        return $this->database->execute_query($sql, [$this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }
    // public function get_teachers_exept_current($user_id)
    // {
    //     $sql = "SELECT * FROM users WHERE (role = 'teacher' OR role = 'admin') AND role != ? AND school_id = ?";
    //     return $this->database->execute_query($sql, ['deleted', $this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    // }
    public function get_parents($school_id)
    {
        $sql = "SELECT * FROM users WHERE role = 'parent' AND school_id = ?";
        return $this->database->execute_query($sql, [$school_id])->fetch_all(MYSQLI_ASSOC);
    }
    public function get_user_by_email($email)
    {
        $sql = "SELECT * FROM users WHERE email_address = ?";
        return $this->database->execute_query(query: $sql, params: [$email])->fetch_assoc();
    }

    public function update_user_role($user_id, $role)
    {
        $sql = "UPDATE users SET role = ? WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$role, $user_id]);
    }
    public function get_all_users_except_current($user_id)
    {
        $sql = "SELECT * FROM users WHERE unique_id != ? AND role != ? AND school_id = ?";
        return $this->database->execute_query(query: $sql, params: [$user_id, 'deleted', $this->getSchoolId()])->fetch_all(MYSQLI_ASSOC);
    }
    public function update_pass_change_attempt($count, $user_id)
    {
        $sql = "UPDATE users SET change_password_attemts = ? WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$count, $user_id]);
    }

    public function upload_profile_image($user_id, $profile_img)
    {
        $sql = "UPDATE users SET profile_image = ? WHERE unique_id = ?";
        return $this->database->execute_query(query: $sql, params: [$profile_img, $user_id]);
    }
    public function add_login_history()
    {
        $sql = "INSERT INTO login_history(user_id, ip_address, browser,	platform, device_type, login_time, login_status) VALUES(?, ?, ?, ?, ?, ?, ?)";
        return $this->database->execute_query(query: $sql, params: [$this->get_unique_id(), $this->get_userIP(), $this->get_user_browser(), $this->get_platform(), $this->get_device_type(), $this->get_login_time(), $this->get_login_status()]);
    }
    public function get_login_history($user_id)
    {
        $sql = "SELECT * FROM login_history WHERE user_id = ? ORDER BY login_time DESC";
        return $this->database->execute_query(query: $sql, params: [$user_id])->fetch_all(MYSQLI_ASSOC);
    }
    public function clear_login_history($user_id)
    {
        $sql = "DELETE FROM login_history WHERE user_id = ?";
        return $this->database->execute_query(query: $sql, params: [$user_id]);
    }
}
