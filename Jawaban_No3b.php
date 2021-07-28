<?php

interface BangunRuang
{
    public function hitungBangunRuang($satuan);
}

class RumusLuasPersegiPanjang implements BangunRuang{

    public $rumus;
    public $panjang;
    public $lebar;
        
    public function hitungBangunRuang($satuan)
      {   
        $this->panjang = $satuan['panjang'];
        $this->lebar = $satuan['lebar'];
        $rumus = $this->panjang * $this->lebar;   
       
        return (
            '<br>'.
            'Bangun Ruang     :  Persegi Panjang'.'<br>'.
            'Panjang          : '.$satuan['panjang'].'<br>'.
            'Lebar            : '.$satuan['lebar'].' <br>'.
            'Volume Persegi Panjang : '.$rumus.' m2');
    }
}

class RumusVolumeBola implements BangunRuang{

    public $radius;
    public $rumus;
    protected $satuan;
        
    public function hitungBangunRuang($satuan)
      {  
        $this->radius = $satuan['jejari'];
        $rumus = 4/3 * pi() * pow($this->radius, 3);    

        return (
            '<br>'.
            'Bangun Ruang     : Volume Bola'.' <br>'.
            'Jari-Jari bola   : '.$satuan['jejari'].'<br>'.
            'Volume Bola      : '.$rumus.' m2'
        );
   }
}

class RumusVolumeKerucut implements BangunRuang{

    public $radius;
    public $tinggi;
    public $rumus;
        
    public function hitungBangunRuang($satuan)
      {   
        $this->radius = $satuan['jejari'];
        $this->tinggi = $satuan['tinggi'];
        $rumus = 1/3 * pi() * pow($this->radius, 2) * $this->tinggi;                  

        return (
            '<br>'.
            'Bangun Ruang      : Volume Kerucut'.'<br>'.
            'Jari-Jari kerucut : '. $satuan['jejari'].'<br>'.
            'Tinggi kerucut    : '. $satuan['tinggi'].'<br>'.
            'Volume kerucut    :'. $rumus.' m2'  
        );
    }
}

class RumusVolumeKubus implements BangunRuang{

    public $rusuk;
    public $rumus;

    public function hitungBangunRuang($satuan)
    {   
        
        $this->rusuk = $satuan['rusuk'];
        $rumus = pow($this->rusuk, 3); 
          
        return (
            '<br>'.
            'Bangun Ruang  : Volume Kubus'.' <br>'.
            'Panjang Rusuk : '.$satuan['rusuk'].'<br>'.
            'Volume Kubus  : '.$rumus.' m2'    
        );
    }
}

class RumusKelilingLingkaran implements BangunRuang{

    public $radius;
    public $rumus;

    public function hitungBangunRuang($satuan)
    {   
        $this->radius = $satuan['jejari'];
        $rumus = pi() * $this->radius * 2;  
            
        return (
            '<br>'.
            'Bangun Ruang          : Keliling Lingkaran <br>'.
            'Jari-Jari lingkaran   : '.$satuan['jejari'].' <br>'.
            'Keliling lingkaran    : '.$rumus.' m2'       
        );
    }
}

class KalkulatorBangunRuangFactory
{
    public function initializeKalkulatorBangunRuang($hitung){

        if ($hitung === 'LuasPersegiPanjang') {
            return new RumusLuasPersegiPanjang();
        }
        if ($hitung === 'volumeBola') {
            return new RumusVolumeBola();
        }
        if ($hitung === 'volumeKerucut') {
            return new RumusVolumeKerucut();
        }
        if ($hitung === 'volumeKubus') {
            return new RumusVolumeKubus();
        }
        if ($hitung === 'KelilingLingkaran') {
            return new RumusKelilingLingkaran();
        }

        throw new Exception("Unsupported payment method");
    }
}

$satuan = ['rusuk' => 12, 'panjang'=>5, 'lebar'=>3, 'jejari'=>9, 'tinggi'=>8];

$pilihanKalkulatorBangunRuang = 'volumeKubus';
$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory ->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang ->hitungBangunRuang($satuan);
print_r($hasilKalkulatorBangunRuang);
