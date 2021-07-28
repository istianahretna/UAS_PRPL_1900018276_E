<?php 

class Json{
    public static function from($data){
        return json_encode($data);
    }
}

class UserRequest{
    protected static $rules = [
        'name' => 'string',
        'email' => 'string',
        'dob' => 'string',
    ];

    public static function validate($data){

        foreach(static::$rules as $property => $type){
            if(gettype($data[$property])!== $type)
                throw new \Exception( "User Property {$property} Must Be Of Type {$type}");
        }
    }
}
class User{
    public $name;
    public $email;
    public $dob;

    public function __construct($data){
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->dob = $data['dob'];
    }
    
    
}
$data = [
    'name' => 'Istianah Retna Ningtyas H', 
    'email' => 'istianah1900018276@webmail.uad.ac.id',
    'dob' => '04.10.2000'
];

class Usia{
    public static function birth_date($data){ 
        $dob = new DateTime($data['dob']);
        $sekarang = new DateTime(date('y.m.d'));
        $dif = $sekarang->diff($dob);
        return ' usia: '.$dif->y.' tahun '.$dif->m.' bulan'.$dif->d.' hari';
    }
}

    UserRequest::validate($data);
    
    $user = new User ($data);
    print(Json::from($user) );
    echo"<br>";
    print (Usia::birth_date($data));
    
    // });
    // $data = request()->query();
    // return $data;

?>

